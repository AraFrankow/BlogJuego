<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
   ->name('home');
Route::get('contactanos', [\App\Http\Controllers\ContactController::class, 'contact'])
    ->name('contact');
Route::get('blog/listado', [\App\Http\Controllers\BlogController::class, 'index'])
    ->name('blog.index');
    Route::get('blog/{id}', [\App\Http\Controllers\BlogController::class, 'view'])
    ->name('blog.view')
    ->whereNumber('id');
Route::get('blog/publicar', [\App\Http\Controllers\BlogController::class, 'create'])
    ->name('blog.create')
    ->middleware('auth');

Route::post('blog/publicar', [\App\Http\Controllers\BlogController::class, 'store'])
    ->name('blog.store')
    ->middleware('auth');

Route::get('blog/{id}/eliminar', [\App\Http\Controllers\BlogController::class, 'delete'])
    ->name('blog.delete')
    ->middleware('auth');

//Route::post('blog/{id}/eliminar', [\App\Http\Controllers\BlogController::class, 'destroy'])
//    ->name('blog.destroy');
Route::delete('blog/{id}/eliminar', [\App\Http\Controllers\BlogController::class, 'destroy'])
    ->name('blog.destroy')
    ->middleware('auth');

//Route::post('blog/editar/{id}', [\App\Http\Controllers\BlogController::class, 'edit'])
//    ->name('blog.edit');
Route::get('blog/editar/{id}', [\App\Http\Controllers\BlogController::class, 'edit'])
    ->name('blog.edit')
    ->middleware('auth');

Route::put('blog/editar/{id}', [\App\Http\Controllers\BlogController::class, 'update'])
    ->name('blog.update')
    ->middleware('auth');

Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'login'])
    ->name('auth.login');
Route::post('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'authenticate'])
    ->name('auth.authenticate');

Route::post('cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('auth.logout');