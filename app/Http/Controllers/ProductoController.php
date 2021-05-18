<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $productos = Producto::all();
        return view("producto.list",[
            "productos" => $productos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        
        return view("producto.add",[
            "marcas" => $marcas
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validaciones
        $validData = $request->validate([
            'nombre' => 'required',
            'talla' => 'required',
            'observaciones' => 'required',
            'marca' => 'required',
            'cantidad' => 'required',
            'fecha_embarque' => 'required'
        ]);

        $producto = new Producto();

        $producto->nombre = $validData["nombre"];
        $producto->talla = $validData["talla"];
        $producto->observaciones = $validData["observaciones"];
        $producto->id_marca = $validData["marca"];
        $producto->cantidad_inventario = $validData["cantidad"];
        $producto->fecha_embarque = $validData["fecha_embarque"];


        $producto->save();

        return redirect("/producto");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        $registro = Producto::find($producto);
        $marca = Marca::find($producto->id_marca);
        
        return view('producto.show', [
            'producto' => $producto,
            'marca' => $marca
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $marcas = Marca::all();
        return view('producto.edit', [
            'producto' => $producto,
            'marcas' => $marcas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //Validaciones
        $validData = $request->validate([
            'nombre' => 'required',
            'talla' => 'required',
            'observaciones' => 'required',
            'marca' => 'required',
            'cantidad' => 'required',
            'fecha_embarque' => 'required'
        ]);

        $producto->nombre = $validData["nombre"];
        $producto->talla = $validData["talla"];
        $producto->observaciones = $validData["observaciones"];
        $producto->id_marca = $validData["marca"];
        $producto->cantidad_inventario = $validData["cantidad"];
        $producto->fecha_embarque = $validData["fecha_embarque"];

        $producto->save();

        return redirect("/producto");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        Producto::destroy($producto->id);

        return redirect("/producto");
    }
}
