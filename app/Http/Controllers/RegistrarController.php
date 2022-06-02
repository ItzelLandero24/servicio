<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegistrarController extends Controller
{
    private const administrativo = 3;

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255|email',
            'password' => 'required',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $usuario = User::create($validated);
        $usuario->role_id = self::administrativo;
        $usuario->save();
        return redirect('login')->with(['message' => "Se registro con exito"]);
    }


}
