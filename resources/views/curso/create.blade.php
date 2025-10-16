@extends('layouts.app')
@section('title','Cadastrar Cursos')
@section('content')
    <h1>Cadastro Cursos</h1>
    <form action="{{ route('curso.store') }}" method="post">
        @csrf 
        <input  type="text" name="nome" id="nome" placeholder="Nome do curso" ><br><br>
        <button type="submit" class="btn btn-outline-primary">Enviar</button>
    </form>
@endsection