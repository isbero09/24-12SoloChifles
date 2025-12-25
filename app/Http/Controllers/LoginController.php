<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("login");
    }

    public function logout(Request $request){
        Auth::logout(); // Cierra la sesión

        $request->session()->invalidate(); // Invalida la sesión actual
        $request->session()->regenerateToken(); // Regenera el token CSRF por seguridad

        return redirect('/'); // Te manda al login
    }

    public function authenticate(Request $request){
        // 1. Validamos que lleguen los datos
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Auth::attempt hace la magia: Verifica en la BD y crea la sesión
        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate(); // Seguridad
    
            return redirect()->route('inicio');
        }
 
        // 3. Si falla
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ]);
    }
}
