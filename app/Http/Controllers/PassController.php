<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PassController extends Controller
{
    public function show()
    {
        return view('auth.change');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = Auth::user();

        // Verificar que la contraseña actual sea correcta
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()
            ->back()
            ->withInput()
            ->with('feedback.message', 'La contraseña es incorrecta');
        }

        // Cambiar la contraseña
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()
                ->intended(route('blog.index'))
                ->with('feedback.message', 'Contraseña cambiada correctamente');
    }
}
