@extends('layouts.app')
@section('title','Cadastrar Alunos')
@section('content')
    <h1>Cadastro Aluno</h1>
    <form action="{{ route('aluno.store') }}" method="post" enctype="multipart/form-data">
        @csrf 
        <input  type="text" name="matricula" id="matricula" placeholder="N° de Matrícula" ><br><br>
        <input type="text" name="nome" id="nome" placeholder="Nome Completo" ><br><br>
        <input type="text" name="email" id="email" placeholder="E-mail" ><br><br>
        <label for="" class="form-label">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" placeholder="Data de Nascimento" ><br><br>
        <label for="" class="form-label">Turma:</label>
        <select name="turma_id" id="turma_id">
                <option value="">Selecione</option>
                @foreach ($turmas as $turma)
                <option value="{{$turma->id}}">{{$turma->descricao}}</option>
                @endforeach
            </select><br><br>
            <input type="text" name="telefone" id="telefone" placeholder="Telefone"><br><br>
        <input type="file" name="foto" id="foto" placeholder="Foto"><br><br>
        <button type="submit" class="btn btn-outline-primary">Enviar</button>
    </form>
@endsection