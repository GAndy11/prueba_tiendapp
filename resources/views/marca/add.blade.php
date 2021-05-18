@extends('layouts.app')

@section('content')
    <div class="container boxed">
        <div class="row justify-content-center">
            <h1>Agregar Marca</h1>
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
            <form action="/marca" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre Marca</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre de la marca">
                </div>

                <div class="form-group">
                    <label for="referencia">Referencia</label>
                    <input type="text" class="form-control" name="referencia" id="referencia" placeholder="Ingrese la referencia del producto">
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
                <br>
                <br>
                <a href="{{ url('/marca') }}">Ir Atrás</a>   
            </form>
        </div>
    </div>
    @endsection