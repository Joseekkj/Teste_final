@extends('layouts.app')
@section('title','Dados do professor')
@section('content')
    <h1>Editar aluno</h1>
    <form action="{{route('professor.update', $professor->id) }}" method="post"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="">Nome</label>
        <input type="text" name="nome" id="nome" value="{{$professor->nome}}">
        <label for="">Disciplina</label>
        <input type="text" name="disciplina" id="disciplina" value="{{$professor->disciplina}}">
         <input type="file" name="foto" id="foto">
          <img src="{{asset($professor->foto)}}" alt="" style="max-width:400px">
        <button type="submit">Salvar</button>
    </form>
@endsection