@extends('adminlte::page')
@section('title','Dashboard')
@section('content')
<div class="row mt-2">
    <div class="col-lg-4">
        <x-adminlte-small-box title="{{$user->publicaciones_count}}" text="Mis Publicaciones" icon="far fa-newspaper"
            theme="primary" url="{{route('users.posts.index')}}" url-text="Ver detalles"/>
    </div>
    <div class="col-lg-4">
        <x-adminlte-small-box title="{{$user->postulaciones_count}}" text="Mis Postulaciones" icon="far fa-fw fa-paper-plane"
            theme="purple" url="{{route('users.postulaciones.index')}}" url-text="Ver detalles"/>
    </div>
</div>
@endsection
@section('js')
    <script src="{{mix('js/app.js')}}"></script>
@endsection
