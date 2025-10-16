@extends('layouts.app')
@section('title','Dados do professor')
@section('content')
    <h1>Cadastro de professor</h1>
    <form action="{{route('professor.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="">Nome</label>
    <input type="text" name="nome" id="nome">
    <label for="">Disciplina</label>
    <input type="text" name="disciplina" id="disciplina">

    
    <div class="row mb-3">
        <label for="foto" class="form-label">Foto</label>
       <input type="file" name="foto" id="foto">
    </div>

    <button type=submit>salvar</button>
</form>
@endsection