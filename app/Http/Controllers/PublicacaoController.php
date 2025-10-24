<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacao;
use Illuminate\Support\Facades\Auth;

class PublicacaoController extends Controller
{
    public function index()
    {
        $publicacoes = Publicacao::all();
        return view('home', compact('publicacoes'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'senha');

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['senha']])) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Email ou senha incorretos']);
    }
}