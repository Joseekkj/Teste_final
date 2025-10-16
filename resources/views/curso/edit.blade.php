@extends('layouts.app')
@section('title','Editar Cursos')
@section('content')
    <h1>Editar Curso</h1>
    <form action="{{ route('curso.update',$curso->id) }}" method="post">
        @csrf 
        @method('PUT')
        <input type="text" name="nome" id="nome" value="{{$curso->nome}}" placeholder="Nome do Curso" ><br><br>
        <button type="submit">Salvar</button>
    </form>
@endsection