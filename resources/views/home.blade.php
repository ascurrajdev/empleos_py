@extends('adminlte::page')
@section('title','Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-4">
        <x-adminlte-small-box title="424" text="Mis Publicaciones" icon="far fa-fw fa-paper-plane"
            theme="primary" url="#" url-text="View details"/>
    </div>
    <div class="col-lg-4">
        <x-adminlte-small-box title="424" text="Mis Postulaciones" icon="far fa-fw fa-paper-plane"
            theme="purple" url="#" url-text="View details"/>
    </div>
    <div class="col-lg-4">
        <x-adminlte-small-box title="424" text="Mis Postulaciones" icon="far fa-fw fa-paper-plane"
            theme="purple" url="#" url-text="View details"/>
    </div>
</div>
@endsection
@section('js')
    <script src="{{mix('js/app.js')}}"></script>
@endsection