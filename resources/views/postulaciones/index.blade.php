@extends('adminlte::page')
@section('content')
    @foreach($postulaciones as $post)
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <img src="{{$post->user->icon ?? "https://ui-avatars.com/api/?size=32&name={$post->user->name}&rounded=true"}}" class="img rounded">
                     {{$post->titulo}}
                </div>
                <div class="float-right text-muted">
                <i class="fas fa-history"></i> {{$post->created_at->diffForHumans()}}
                </div>
            </div>
            <div class="card-body">
                {{$post->descripcion}}
            </div>
            <div class="card-footer">
                <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">Ver detalles  <i class="fas fa-clipboard-list"></i></a>
            </div>
        </div>
    @endforeach
@endsection