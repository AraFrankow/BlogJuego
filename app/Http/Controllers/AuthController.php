<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()
                ->intended(route('blog.index'))
                ->with('feedback.message', 'Sesión inciada correctamente, Bienvenido');
        }

        return redirect()
            ->back()
            ->withInput()
            ->with('feedback.message', 'Credenciales incorrectas');
            
    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.login')
            ->with('feedback.message', 'Sesión cerrada correctamente');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function authenticateRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect()
            ->intended(route('blog.index'))
            ->with('feedback.message', 'Registro exitoso, Bienvenido');
    }
}
