<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Blog;


class RequiereAgeOver16
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
     public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id');
        $blog = Blog::with('tags')->findOrFail($id);

        $hasRestrictedTag = $blog->tags->contains('tag_id', 23); // ← esto busca si el post tiene el tag "demo"

        if ($hasRestrictedTag && !$request->session()->has('age_verified')) {
            return to_route('blog.age-verification.show', ['id' => $id]);
        }

        return $next($request);
    }

}
