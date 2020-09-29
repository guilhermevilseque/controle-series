<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrarController extends Controller
{
    public function create()
    {
        return view('registrar.create');
    }

    public function store(Request $request)
    {
        $usuario = $request->except('_token');
        $usuario['password'] = Hash::make($usuario['password']);
        $user = User::create($usuario);
        Auth::login($user);
        return redirect()->route('series');
    }
}
