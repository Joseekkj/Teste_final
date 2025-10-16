@extends('layouts.app')
@section('title', 'Listar alunos')
@section('content')
    <h1>Lista de alunos</h1>

    <h2>alunos com data de nascimento igual a 2005-05-10</h2>
    @foreach ($alunos_niver_2005 as $aluno)
        <p>{{ $aluno->nome }} - {{ $aluno->data_nascimento }}</p>
    @endforeach

    @if(isset($alunos_antes_2006) && $alunos_antes_2006->isNotEmpty())
            <ul>
                @foreach ($alunos_antes_2006 as $aluno)
                    <li>{{ $aluno->nome }} — {{ $aluno->data_nascimento }}</li>
                @endforeach
            </ul>
        @else
            <p>Nenhum aluno encontrado.</p>
        @endif

    <h2>alunos que tem "Silva" no nome</h2>
    @foreach ($alunos_silva as $aluno)
        <p>{{ $aluno->nome }}</p>
    @endforeach



    <hr>
    <a class="btn btn-primary" href="{{ route('aluno.create') }}">Cadastrar</a>
    <table class="table table-sm table-bordered table-hover">
        <thead class="thead-light">
            <th>Matrícula</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de nascimento</th>
            <th>Opções</th>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
            <tr class="table-warning">
                <td>{{ $aluno->matricula }}</td>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->email }}</td>
                <td>{{ $aluno->data_nascimento }}</td>
                <td>
                    <div class="d-flex">
                        <div class="m-1">
                            <a class="btn btn-success" href="{{ route('aluno.edit',$aluno->id) }}">Editar</a>
                        </div>
                        <div class="m-1">
                            <a class="btn btn-primary" href="{{ route('aluno.show',$aluno->id) }}">Visualizar</a>
                        </div>
                        <div class="m-1">
                            <form action="{{ route('aluno.destroy',$aluno->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Excluir</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection