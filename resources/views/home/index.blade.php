@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Administrador Articulos y Usuarios</h1>
            <p class="lead">Seccion del sistema que se accede al iniciar sessión.</p>
            <a class="btn btn-lg btn-primary" href="#" role="button">Gestiona los articulos &raquo;</a>

            <h1>ARTICULOS RECIENTES</h1>
            <p class="lead">Se visualiza la lista de articulos.</p>
            <div class="row">
                @foreach($data as $article)
                    <div class="col-12 px-5">
                        <h4>{{$article->title}}</h4>
                        <p class="lead">{{$article->description}}</p>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {!! $data->links() !!}
                </div>
            </div>
        @endauth

        @guest
            <h1>ARTICULOS RECIENTES</h1>
            <p class="lead">Se visualiza la lista de articulos.</p>
            <div class="row">
                @foreach($data as $article)
                    <div class="col-12 px-5">
                        <h4>{{$article->title}}</h4>
                        <p class="lead px-3">{{$article->description}}</p>
                    </div>
                @endforeach
                    <div class="d-flex justify-content-center">
                        {!! $data->links() !!}
                    </div>
            </div>
        @endguest
    </div>
@endsection
