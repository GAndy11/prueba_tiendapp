@extends('layouts.app')

@section('content')
    <div class="container boxed">
        <div class="row justify-content-center">
            <h1>Visualizar Marca</h1>
        </div>
        <div class="col-md-12">
            @if($marca)   
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $marca->nombre }}" readonly>
                </div>
                <div class="form-group">
                    <label for="referencia">Referencia</label>
                    <input type="text" class="form-control" id="referencia" name="referencia"value="{{ $marca->referencia }}" readonly>
                </div>
                
            @else
                <h3>Esta marca no existe</h3>
            @endif
            <a href="{{ url('/marca') }}">Ir Atrás</a>   
        </div>
    </div>
@endsection 