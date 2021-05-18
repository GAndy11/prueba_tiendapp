@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Listado de Marcas para Administración.</h1>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <a class="new-marca" href="{{ url('/marca/create') }}">
                Crear nuevo
            </a>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-12">
            @if(count($marcas) > 0)
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Id</th>
                            <th scope="col">Referencia</th>
                            <th scope="col">Nombre</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marcas as $marca)
                            <tr>
                                <td style="width: 20px"><a href="{{ url('/marca/'.$marca->id) }}">Ver</td>
                                <td style="width: 20px"><a href="{{ url('/marca/'.$marca->id).'/edit' }}">Editar</td>
                                <th scope="row">{{ $marca->id }}</th>
                                <td>{{ $marca->referencia}}</td>
                                <td>{{ $marca->nombre}}</td>
                                <form action="/marca/{{ $marca->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <td style="width: 20px"><button type="submit"><a>Eliminar</a></button></td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3>No hay marcas para mostrar.</h3>
            @endif
            
        </div>
    </div>
</div>
@endsection