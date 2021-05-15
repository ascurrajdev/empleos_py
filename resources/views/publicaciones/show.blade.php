@extends('adminlte::page')
@section('content')
    @if(session('postulacionSuccess'))
        <div class="alert alert-success"><i class="fas fa-user-check"></i> {{session('postulacionSuccess')}}</div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="float-left">
                <img src="{{$post->user->icon ?? "https://ui-avatars.com/api/?size=32&name={$post->user->name}&rounded=true"}}" class="img rounded" />
                {{$post->user->name}}
            </div>
            <div class="float-right text-muted">
                <i class="fas fa-history"></i> {{$post->created_at->diffForHumans()}}
            </div>
        </div>
        <div class="card-body">
            <p class="text-uppercase">{{$post->titulo}}</p>
            <p class="h5">Descripcion:</p>
            <p class="font-weight-light">{{$post->descripcion}}</p>
            <p class="h5">Requisitos:</p>
            <p class="font-italic">{{$post->requisitos->requisito}}</p>
            <p class="h5">Beneficios:</p>
            <p class="font-italic">{{$post->beneficios->beneficio}}</p>
        </div>
        <div class="card-footer">
            @if($post->postulado)
                <form action="{{route('posts.postular',$post->id)}}" class="float-left mr-3" method="POST">
                    @csrf
                    <button class="btn btn-success">Postular <i class="fas fa-user-check"></i></button>
                </form>
            @endif
            <a href="{{route('posts.index')}}" class="float-left btn btn-info">Volver <i class="fas fa-undo"></i></a>
        </div>
    </div>
@endsection