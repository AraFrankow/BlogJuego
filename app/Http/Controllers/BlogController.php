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
}
