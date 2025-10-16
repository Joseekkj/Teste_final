@extends('layouts.app')
@section('title','Editar Alunos')
@section('content')
    <h1>Editar Aluno</h1>
    <form action="{{ route('aluno.update',$aluno->id) }}" method="post" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
        <input type="text" name="matricula" id="matricula" value="{{$aluno->matricula}}" placeholder="N° de Matrícula" ><br><br>
        <input type="text" name="nome" id="nome" value="{{$aluno->nome}}" placeholder="Nome Completo" ><br><br>
        <input type="text" name="email" id="email" value="{{$aluno->email}}" placeholder="E-mail" ><br><br>
        <input type="date" name="data_nascimento" id="data_nascimento" value="{{$aluno->data_nascimento}}" placeholder="Data de Nascimento" ><br><br>
        <select name="turma_id" id="turma_id">
                <option value="">Selecione</option>
                @foreach ($turmas as $turma)
                <option value="{{$turma->id}}">{{$turma->descricao}}</option>
                @endforeach
            </select><br><br>
        <input type="file" name="foto" id="foto" placeholder="Foto"><br><br>
          <img src="{{asset($aluno->foto)}}" alt="foto" style="max-width:400px">
        <button type="submit">Salvar</button>
    </form>
@endsection