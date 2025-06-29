<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class AdminVerificationController extends Controller
{
    public function show(int $id)
    {
        return view('blog.admin-verification', [
            'blog' => Blog::findOrFail($id),
        ]);
    }

    public function save(Request $request, int $id)
    {
        $request->session()->put('admin_verified', true);
        return to_route('blog.view', ['id' => $id]);
    }
}