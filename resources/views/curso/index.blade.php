@extends('layouts.app')
@section('title','Lista de Cursos')
@section('content')
    <h1>Lista de Cursos</h1>

    <h2>Cursos cujo nome é diferente de "Informática"</h2>
    @if(isset($cursos_diferentes) && $cursos_diferentes->isNotEmpty())
        <ul>
            @foreach($cursos_diferentes as $curso)
                <li>{{ $curso->nome }}</li>
            @endforeach
        </ul>
    @else
        <p>Nenhum curso encontrado diferente de "Informática".</p>
    @endif
            @foreach($cursos as $curso)
            <tr>
            <td>{{$curso->nome}}</td>
            <td><a href="{{route('curso.edit',$curso->id)}}" class="btn btn-success">Editar</a>
               <a href="{{route('curso.show',$curso->id)}}" class="btn btn-primary">Visualizar</a>       
               <form action="{{route('curso.destroy',$curso->id)}}" method="post">
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
               </form> 
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection