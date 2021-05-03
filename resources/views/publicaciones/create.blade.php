@extends('adminlte::page')
@section('content')
    <div class="card">
        <div class="card-header">Publicar una oferta:</div>
        <div class="card-body">
            <form action="{{route('')}}" method="POST">
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
                    <label for="categoria">Categoria:</label>
                    <select name="categoria_id" class="form-control" id="categoria">
                        <option value="1">Categoria 1</option>
                    </select>
                </div>
                <button class="btn btn-lg btn-success btn-block"><i class="far fa-save"></i> PUBLICAR</button>
            </form>
        </div>
    </div>
@endsection