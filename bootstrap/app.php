<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(function (Illuminate\Http\Request $request) {
            session()->flash('feedback.message', 'Debes iniciar sesión para acceder a esta sección');
            session()->flash('feedback.type', 'danger');
            return route('auth.login');
        });
        $middleware->alias([
            'require-age' => App\Http\Middleware\RequiereAgeOver16::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
