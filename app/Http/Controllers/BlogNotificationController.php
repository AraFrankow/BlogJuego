<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BlogNotification;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogNotificationController extends Controller
{
    public function notify(Request $request, int $id)
    {   
        $blog = Blog::findOrFail($id);
        Mail::to(Auth::user())->send(new BlogNotification($blog));

        return to_route('blog.index')
            ->with('feedback.message', 'Gracias por contactarnos. Tu mensaje fue enviado correctamente.');
    }
}
