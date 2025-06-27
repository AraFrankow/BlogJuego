<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $allBlogs = Blog::with(['categoria', 'tags'])->get();

        return view('blog.index', [
            'blogs' => $allBlogs
        ]);
    }

    public function view(int $id){
        return view('blog.view', [
            'blog' => Blog::findOrFail($id)
        ]);
    }

    public function create(){
        return view('blog.create',[
            'tags'=> Tag::orderBy('name')->get(),
            'categorias'=> Categoria::all(),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'min:2'],
            'excerpt' => ['required', 'min:10'],
            'body' => 'required',
            'published_at' => ['required', 'date']
        ],[
            'title.required' => 'El título es obligatorio',
            'title.min' => 'El título debe tener al menos :min caracteres',
            'excerpt.required' => 'La introducción es obligatorio',
            'excerpt.min' => 'La introducción debe tener al menos :min caracteres',
            'body.required' => 'El cuerpo es obligatorio',
            'published_at.required' => 'La fecha de publicación es obligatoria',
            'published_at.date' => 'La fecha de publicación no es válida'
        ]);
        
        $input = $request->all();

        if($request->hasFile('cover')){
            $input['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $blog = Blog::create($input);
        $blog->tags()->attach($input['tag_id'] ?? []);

        return redirect()
        ->route('blog.index')
        ->with('feedback.message', 'El post <b>'.e($blog->title).'</b> se publicó');
    }

    public function destroy(int $id){
        $blog = Blog::findOrFail($id);
        $blog->tags()->detach();
        $blog->delete($id);

        if($blog->cover && Storage::has($blog->cover)){
            Storage::delete($blog->cover);
        }
        
        return redirect()
            ->route('blog.index')
            ->with('feedback.message', 'El post <b>'.e($blog->title).'</b> se eliminó');
    }

    public function delete(int $id){
        return view('blog.delete', [
            'blog' => Blog::findOrFail($id)
        ]);
    }

    public function edit(int $id){
        return view('blog.edit', [
            'blog' => Blog::findOrFail($id),
            'categorias' => Categoria::all(),
            'tags' => Tag::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, int $id){
        $request->validate([
            'title' => ['required', 'min:2'],
            'excerpt' => ['required', 'min:10'],
            'body' => 'required',
            'published_at' => ['required', 'date']
        ],[
            'title.required' => 'El título es obligatorio',
            'title.min' => 'El título debe tener al menos :min caracteres',
            'excerpt.required' => 'La introducción es obligatorio',
            'excerpt.min' => 'La introducción debe tener al menos :min caracteres',
            'body.required' => 'El cuerpo es obligatorio',
            'published_at.required' => 'La fecha de publicación es obligatoria',
            'published_at.date' => 'La fecha de publicación no es válida'
        ]);
        
        $blog = Blog::findOrFail($id);
        $blog->update($request->all());
        $blog->tags()->sync($request->input('tag_id'));

        $input = $request->except(['_token', '_method']);
        $oldCover = $blog->cover;

        if($request->hasFile('cover')){
            $input['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $blog->update($input);
        $blog->tags()->sync($request->input('tag_id', []));

        if(
            request()->hasFile('cover') &&
            $oldCover &&
            Storage::has($oldCover)
        ){
            Storage::delete($oldCover);
        }

        return redirect()
        ->route('blog.index')
        ->with('feedback.message', 'El post <b>'.e($blog->title).'</b> se actualizó');
    }
}
