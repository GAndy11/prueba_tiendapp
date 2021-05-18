@extends('layouts.app')

@section('content')
    <div class="container boxed">
        <div class="row justify-content-center">
            <h1>Editar Marca</h1>
        </div>
        <div class="col-md-12">
            @if($errors->any())
                <div>
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <form action="/marca/{{ $marca->id }}" method="POST">
                @csrf
                @method('put')
                @if($marca)   
                    <div class="form-group">
                        <label for="nombre">Nombre marca</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $marca->nombre }}" >
                    </div>
                    <div class="form-group">
                        <label for="referencia">Referencia</label>
                        <input type="referencia" class="form-control" id="referencia" name="referencia"value="{{ $marca->referencia }}" >
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <br>
                    <br>
                @else
                    <h3>Este marca no existe</h3>
                @endif
            </form>
            <a href="{{ url('/marca') }}">Ir Atrás</a>   
        </div>
    </div>
@endsection 