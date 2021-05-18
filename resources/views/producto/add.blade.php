@extends('layouts.app')

@section('content')
    <div class="container boxed">
        <div class="row justify-content-center">
            <h1>Agregar Producto</h1>
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
            <form action="/producto" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre Producto</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre de la marca">
                </div>

                <div class="form-group">
                    <label for="talla">Talla</label>
                    <input type="text" class="form-control" name="talla" id="talla" placeholder="Ingrese S, M o L">
                </div>

                <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                    <textarea class="form-control" name="observaciones" id="observaciones" rows="3" placeholder="Observaciones"></textarea>
                </div>

                <div class="form-group">
                    <label for="marca">Marca</label>
                    
                    <select class="form-control" id="marca" name="marca">
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad de inventario</label>
                    <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Ingrese la cantidad de inventario">
                </div>

                <div class="form-group">
                    <label for="fecha_embarque">Fecha de embarque</label>
                    <input type="date" class="form-control" name="fecha_embarque" id="fecha_embarque" placeholder="Ingrese la cantidad de inventario">
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
                <br>
                <br>
                <a href="{{ url('/marca') }}">Ir Atrás</a>   
            </form>
        </div>
    </div>
    @endsection