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
    ->middleware('require-age')
    ->whereNumber('id');
    
Route::get('blog/{id}/verificar-admin', [\App\Http\Controllers\AdminVerificationController::class, 'show'])
    ->name('blog.admin-verification.show')
    ->whereNumber('id');

Route::post('blog/{id}/verificar-admin', [\App\Http\Controllers\AdminVerificationController::class, 'save'])
    ->name('blog.admin-verification.save')      
    ->whereNumber('id');

Route::get('blog/{id}/verificar-edad', [\App\Http\Controllers\AgeVerificationController::class, 'show'])
    ->name('blog.age-verification.show')
    ->whereNumber('id');

Route::post('blog/{id}/verificar-edad', [\App\Http\Controllers\AgeVerificationController::class, 'save'])
    ->name('blog.age-verification.save')
    ->whereNumber('id');

Route::get('blog/publicar', [\App\Http\Controllers\BlogController::class, 'create'])
    ->name('blog.create')
    ->middleware(['auth', \App\Http\Middleware\CheckAdmin::class]);

Route::post('blog/publicar', [\App\Http\Controllers\BlogController::class, 'store'])
    ->name('blog.store')
    ->middleware(['auth', \App\Http\Middleware\CheckAdmin::class]);

Route::get('blog/{id}/eliminar', [\App\Http\Controllers\BlogController::class, 'delete'])
    ->name('blog.delete')
    ->middleware(['auth', \App\Http\Middleware\CheckAdmin::class]);

//Route::post('blog/{id}/eliminar', [\App\Http\Controllers\BlogController::class, 'destroy'])
//    ->name('blog.destroy');
Route::delete('blog/{id}/eliminar', [\App\Http\Controllers\BlogController::class, 'destroy'])
    ->name('blog.destroy')
    ->middleware(['auth', \App\Http\Middleware\CheckAdmin::class]);

//Route::post('blog/editar/{id}', [\App\Http\Controllers\BlogController::class, 'edit'])
//    ->name('blog.edit');
Route::get('blog/editar/{id}', [\App\Http\Controllers\BlogController::class, 'edit'])
    ->name('blog.edit')
    ->middleware(['auth', \App\Http\Middleware\CheckAdmin::class]);

Route::put('blog/editar/{id}', [\App\Http\Controllers\BlogController::class, 'update'])
    ->name('blog.update')
    ->middleware(['auth', \App\Http\Middleware\CheckAdmin::class]);

Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'login'])
    ->name('auth.login');
Route::post('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'authenticate'])
    ->name('auth.authenticate');

Route::get('register', [\App\Http\Controllers\AuthController::class, 'register'])
    ->name('auth.register');
Route::post('register', [\App\Http\Controllers\AuthController::class, 'authenticateRegister'])
    ->name('auth.authenticateRegister');

Route::post('cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('auth.logout');

Route::post('blog/{id}/notificar', [\App\Http\Controllers\BlogNotificationController::class, 'notify'])
    ->name('blog.notify')
    ->middleware('auth');

Route::get('productos', [\App\Http\Controllers\ProductoController::class, 'index'])
    ->name('productos.index');

Route::post('productos', [\App\Http\Controllers\ProductoController::class, 'store'])
    ->name('productos.store');

Route::get('productos/create', [\App\Http\Controllers\ProductoController::class, 'create'])
    ->name('productos.create')
    ->middleware(['auth', \App\Http\Middleware\CheckAdmin::class]);

Route::get('productos/editar/{producto}', [\App\Http\Controllers\ProductoController::class, 'edit'])
    ->name('productos.edit')
    ->whereNumber('producto')
    ->middleware(['auth', \App\Http\Middleware\CheckAdmin::class]);

Route::put('productos/editar/{producto}', [\App\Http\Controllers\ProductoController::class, 'update'])
    ->name('productos.update')
    ->whereNumber('producto')
    ->middleware(['auth', \App\Http\Middleware\CheckAdmin::class]);

Route::delete('productos/eliminar/{producto}', [\App\Http\Controllers\ProductoController::class, 'destroy'])
    ->name('productos.destroy')
    ->whereNumber('producto')
    ->middleware(['auth', \App\Http\Middleware\CheckAdmin::class]);

Route::get('productos/eliminar/{producto}', [\App\Http\Controllers\ProductoController::class, 'delete'])
    ->name('productos.delete')
    ->whereNumber('producto')
    ->middleware(['auth', \App\Http\Middleware\CheckAdmin::class]);

Route::get('usuarios', [\App\Http\Controllers\UserController::class, 'index'])
    ->name('usuarios.index')
    ->middleware(['auth', \App\Http\Middleware\CheckAdmin::class]);

Route::get('usuarios/{user}', [\App\Http\Controllers\UserController::class, 'show'])
    ->name('usuarios.show')
    ->middleware(['auth', \App\Http\Middleware\CheckAdmin::class]);