@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>CREAR ARTICULOS</h1>
        <form method="post" action="{{ route('admin.article.store') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-floating mb-3">
                <input type="text" name="title" class="form-control" id="floatingInput" placeholder="Titulo del articulo" value="{{ old('title') }}">
                <label for="floatingInput">Titulo del articulo</label>
                @if ($errors->has('title'))
                    <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-floating">
                <input type="text" name="description" class="form-control" id="floatingPassword" placeholder="Descripción del articulo" value="{{ old('description') }}">
                <label for="floatingPassword">Descripción del articulo</label>
                @if ($errors->has('description'))
                    <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <div class="form-floating py-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{route('article.index')}}" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
