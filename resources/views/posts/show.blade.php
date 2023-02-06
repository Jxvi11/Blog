
@extends('plantilla')

@section('titulo', 'Ficha de post')

@section('contenido')

    <div class="container">

        <form method="POST" action="{{ route('posts.destroy', $posts->id) }}" enctype="multipart/form-data">
            @csrf
            @method('DELETE')

            <div class="card" >
                <div class="card-body">
                    <h2 class="card-title">{{ $posts->titulo }}</h2>
                    <h6 class="card-subtitle mb-2 text-muted">Escrito por {{ $posts->usuario->login }} el {{ Carbon\Carbon::parse($posts->created_at)->format('d/m/Y') }}</h6>
                    <p class="card-text">{{ $posts->contenido }}</p>

                    <div>
                        <h3>Comentarios</h3>

                        @foreach($comentarios as $comentario)
                            <div class="card-header">
                                <blockquote class="blockquote mb-0">
                                <p>{{ $comentario->contenido }}</p>

                                    <footer class="blockquote-footer">Usuario: {{ $comentario->usuario->login }}</cite></footer>
                                </blockquote>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <br>
                            <a href="{{ route('posts.index') }}" class="btn btn-danger">Atrás</a>
                            <button type="submit" class="btn btn-danger">Eliminar</button>

                        </div>
                    </div>
                </div>

            </div>
    </div>


@endsection
