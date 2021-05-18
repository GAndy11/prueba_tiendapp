@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Listado de Productos para Administración.</h1>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <a class="new-marca" href="{{ url('/producto/create') }}">
                Crear nuevo
            </a>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-12">
            @if(count($productos) > 0)
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Id</th>
                            <th scope="col">nombre</th>
                            <th scope="col">Talla</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Cantidad Inventario</th>
                            <th scope="col">Fecha Embarque</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td style="width: 20px"><a href="{{ url('/producto/'.$producto->id) }}">Ver</td>
                                <td style="width: 20px"><a href="{{ url('/producto/'.$producto->id).'/edit' }}">Editar</td>
                                <th scope="row">{{ $producto->id }}</th>
                                <td>{{ $producto->nombre}}</td>
                                <td>{{ $producto->talla}}</td>
                                <td>{{ $producto->id_marca}}</td>
                                <td>{{ $producto->cantidad_inventario}}</td>
                                <td>{{ $producto->fecha_embarque}}</td>
                                <form action="/producto/{{ $producto->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <td style="width: 20px"><button type="submit"><a>Eliminar</a></button></td>
                                </form>
                            </tr>   
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3>No hay productos para mostrar.</h3>
            @endif
            
        </div>
    </div>
</div>
@endsection