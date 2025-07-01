<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate(3);
        return view('usuarios.index', compact('usuarios'));
    }

    public function show(User $user)
    {
        return view('usuarios.show', compact('user'));
    }
}

