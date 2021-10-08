@extends('adminlte::page')
@section('content')
    <div class="card">
        <div class="card-header">Publicar una oferta:</div>
        <div class="card-body">
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="titulo">Titulo:</label>
                    <input type="text" value="{{old('titulo')}}" id="titulo" name="titulo" class="form-control @error("titulo") is-invalid @enderror" />
                    @error('titulo')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <textarea name="descripcion" value="{{old('descripcion')}}" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror"></textarea>
                    @error('descripcion')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="requisitos">Requisitos:</label>
                    <textarea name="requisito" id="requisitos" value="{{old('requisito')}}" class="form-control @error('requisitos') is-invalid @enderror"></textarea>
                    @error('requisito')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="beneficios">Beneficios:</label>
                    <textarea name="beneficio" id="beneficios" value="{{old('beneficio')}}" class="form-control @error('beneficio') is-invalid @enderror"></textarea>
                    @error('beneficio')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror" id="categoria">
                        <option value="" disabled>Seleccione una categoria</option>
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
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
        })
    </script>
@endsection
