@extends('plantilla')

@section('titulo', 'Añadir posts')

@section('contenido')

<div class="container">

    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}"><br>

            <!--Comprueba la validación del PostRequest-->
            @if ($errors->has('titulo'))
                <div class="text-danger">
                    {{ $errors->first('titulo') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="contenido">Contenido:</label>
            <textarea class="form-control" id="contenido" name="contenido" >{{ old('contenido') }}</textarea><br>

            <!--Comprueba la validación del PostRequest-->
            @if ($errors->has('contenido'))
                <div class="text-danger">
                    {{ $errors->first('contenido') }}
                </div>
            @endif
        </div>
        <input type="hidden" name="usuario" value="{{ \App\Models\Usuario::get()->first()->id }}">
        <button type="submit" class="btn btn-primary">Añadir</button>
    </form>

</div>

@endsection

