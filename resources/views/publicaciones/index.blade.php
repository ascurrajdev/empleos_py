@extends('adminlte::page')
@section('content')
    @foreach($posts as $post)
        <li>{{$post->titulo}}</li>
    @endforeach
@endsection