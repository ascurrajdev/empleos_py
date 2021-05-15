@extends('adminlte::page')
@section('content')
    <div class="card">
        <div class="card-header">Publicar una oferta:</div>
        <div class="card-body">
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="titulo">Titulo:</label>
                    <input type="text" id="titulo" name="titulo" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="requisitos">Requisitos:</label>
                    <textarea name="requisito" id="requisitos" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="beneficios">Beneficios:</label>
                    <textarea name="beneficio" id="beneficios" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select name="categoria_id" class="form-control" id="categoria">
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-lg btn-success btn-block"><i class="fas fa-check"></i> PUBLICAR</button>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#descripcion').summernote()
            $('#beneficios').summernote()
            $('#requisitos').summernote()
        })
    </script>
@endsection