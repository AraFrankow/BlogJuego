<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $allBlogs = Blog::all();

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
        return view('blog.create');
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

        Blog::create($input);
        $input=[
            'title' => 'Ejemplo de título',
            'excerpt' => 'Inicio de un post',
            'body' => 'Este es el cuerpo del post',
            'published_at' => '2023-10-01'
        ];

        $blog = new Blog();
        $blog->fill($input);

        return redirect()
        ->route('blog.index')
        ->with('feedback.message', 'El post <b>'.e($input['title']).'</b> se publicó');
    }

    public function destroy(int $id){
        $blog = Blog::findOrFail($id);
        $blog->delete($id);

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
            'blog' => Blog::findOrFail($id)
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

        return redirect()
        ->route('blog.index')
        ->with('feedback.message', 'El post <b>'.e($blog->title).'</b> se actualizó');
    }
}
