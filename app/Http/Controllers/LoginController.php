<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index(){
        return view("login");
    }

    public function authenticate(Request $request){
        // Definir credenciales válidas
        $valid_email = "admin@hotmail.com";
        $valid_password = "1234";

        $email = $request->input('email');
        $password = $request->input('password');

        if ($email === $valid_email && $password === $valid_password) {
            // Redirige si las credenciales son correctas
            return redirect()->route('inicio');
        } else {
            // Mensaje de error y redirige de vuelta al login
            return redirect()->route('login')->with('error', 'Credenciales incorrectas');
        }
    }
}
