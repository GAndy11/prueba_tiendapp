@extends('layouts.app')

@section('content')
    <div class="container boxed">
        <div class="row justify-content-center">
            <h1>Editar Producto</h1>
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
            <form action="/producto/{{ $producto->id }}" method="POST">
                @csrf
                @method('put')
                @if($producto)   
                    <div class="form-group">
                        <label for="nombre">Nombre Producto</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $producto->nombre }}">
                    </div>

                    <div class="form-group">
                        <label for="talla">Talla</label>
                        <input type="text" class="form-control" name="talla" id="talla" value="{{ $producto->talla }}">
                    </div>

                    <div class="form-group">
                        <label for="observaciones">Observaciones</label>
                        <textarea class="form-control" name="observaciones" id="observaciones" rows="3">{{ $producto->observaciones }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="marca">Marca</label>
                        
                        <select class="form-control" id="marca" name="marca">
                            @foreach ($marcas as $marca)
                            <option value="{{ $marca->id }}" {{ $producto->id_marca == $marca->id ? 'selected' : '' }}>{{ $marca->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cantidad">Cantidad de inventario</label>
                        <input type="number" class="form-control" name="cantidad" id="cantidad" value="{{ $producto->cantidad_inventario }}">
                    </div>

                    <div class="form-group">
                        <label for="fecha_embarque">Fecha de embarque</label>
                        <input type="date" class="form-control" name="fecha_embarque" id="fecha_embarque" value="{{ $producto->fecha_embarque }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <br>
                    <br>
                @else
                    <h3>Este producto no existe</h3>
                @endif
            </form>
            <a href="{{ url('/producto') }}">Ir Atrás</a>   
        </div>
    </div>
@endsection 