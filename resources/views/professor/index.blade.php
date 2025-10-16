@extends('layouts.app')
@section('title','Dados do professor')
@section('content')
    <h1>Lista de professor</h1>

    <h2>Professores com nome começando por "João" e terminando com "Silva"</h2>
    @if(isset($professores_joao_silva) && $professores_joao_silva->isNotEmpty())
        <ul>
            @foreach($professores_joao_silva as $professor)
                <li>{{ $professor->nome }} — {{ $professor->disciplina }}</li>
            @endforeach
        </ul>
    @else
        <p>Nenhum professor encontrado com esse padrão.</p>
    @endif
    
    <a href="{{route('professor.create')}}">Cadastrar</a>
    <table>
        <thead>
            <th>Nome</th>
            <th>Disciplina</th>
            <th>Opções</th>
        </thead>
        <tbody>
            @foreach($professores as $professor)
            <tr>
            <td>{{$professor->nome}}</td>
            <td>{{$professor->disciplina}}</td>
            <td>
                <a href="{{route('professor.create', $professor->id)}}">Editar</a>
                <a href="{{route('professor.show', $professor->id)}}">Vizualizar</a>
                <form action="{{route('professor.destroy', $professor->id)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit">Excluir</button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection