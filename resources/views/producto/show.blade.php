@extends('layouts.app')

@section('content')
    <div class="container boxed">
        <div class="row justify-content-center">
            <h1>Visualizar Producto</h1>
        </div>
        <div class="col-md-12">
            @if($producto)   
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}" readonly>
                </div>
                <div class="form-group">
                    <label for="talla">talla</label>
                    <input type="talla" class="form-control" id="talla" name="talla"value="{{ $producto->talla }}" readonly>
                </div>
                <div class="form-group">
                    <label for="observaciones">observaciones</label>
                    <input type="textarea" class="form-control" id="observaciones" name="observaciones"value="{{ $producto->observaciones }}" readonly>
                </div>
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca"value="{{ $marca->nombre }}" readonly>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad Inventario</label>
                    <input type="text" class="form-control" id="cantidad" name="cantidad"value="{{ $producto->cantidad_inventario }}" readonly>
                </div>
                <div class="form-group">
                    <label for="fecha_embarque">Fecha Embarque</label>
                    <input type="text" class="form-control" id="fecha_embarque" name="fecha_embarque"value="{{ $producto->fecha_embarque }}" readonly>
                </div>

            @else
                <h3>Esta producto no existe</h3>
            @endif
            <a href="{{ url('/producto') }}">Ir Atrás</a>   
        </div>
    </div>
@endsection 