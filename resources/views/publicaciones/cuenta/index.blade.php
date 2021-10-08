@extends('adminlte::page')
@section('content')
    @if($posts->count() < 1)
        <x-adminlte-alert theme="info" class="mt-3" title="Info">
            Usted no ha realizado publicaciones.
        </x-adminlte-alert>
    @endif
    @foreach($posts as $post)
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
                {!!  $post->descripcion !!}
            </div>
            <div class="card-footer">
                <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">Ver detalles  <i class="fas fa-clipboard-list"></i></a>
            </div>
        </div>
    @endforeach
@endsection
