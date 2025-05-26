<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

   public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

   if (Auth::attempt($credentials)) {
    $request->session()->regenerate();

    // Mensaje flash corregido
    $request->session()->flash('mensaje_correo', 'Se ha enviado un correo a tu dirección: ' . Auth::user()->email);

    return redirect()->intended('/usuarios');
}


    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
 
        return redirect('/login');
    }

    public function validateAccount($token)
    {
        $user = User::where('remember_token', $token)->first();
        if ($user && $user->remember_token == $token)
        {
            $user->remember_token = null;
            $user->save();
            return redirect('/login')->with('message', 'Cuenta activada correctamente. Por favor, inicia sesión.');
        } else {
            return redirect('/login')->with('error', 'Token de activación inválido o ya utilizado.');
        }
    }
}
