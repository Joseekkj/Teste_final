@extends('layouts.app')
@section('title','Dados do professor')
@section('content')
    <h1>Dados do Professor</h1>
    <p>Matrícula:{{$professor->nome}}</p>
    <p>Nome:{{$professor->disciplina}}</p>
    <img src="{{asset($professor->foto)}}" alt="" style="max-width:400px">
    @endsection