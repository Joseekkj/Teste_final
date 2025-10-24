<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Publicacao;

class HomeController extends Controller
{
    
    public function index()
    {
        $publicacoes = Publicacao::all();
        return view('home',compact('publicacoes'));
    }
     public function login(Request $request)
    {
        $credentials = $request->only('email', 'senha');

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['senha']])) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'email ou senha incorretos']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}

