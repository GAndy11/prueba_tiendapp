<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::all();
        return view("marca.list", [
            'marcas' => $marcas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("marca.add");
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
            'referencia' => 'required'
        ]);

        $marca = new Marca();

        $marca->nombre = $validData["nombre"];
        $marca->referencia = $validData["referencia"];

        $marca->save();

        return redirect("/marca");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        $registro = Marca::find($marca);
        
        return view('marca.show', [
            'marca' => $marca
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        return view('marca.edit', [
            'marca' => $marca
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        //Validaciones
        $validData = $request->validate([
            'nombre' => 'required',
            'referencia' => 'required'
        ]);

        $marca->nombre = $validData["nombre"]; 
        $marca->referencia = $validData["referencia"];
        $marca->save();
        
        return redirect('/marca');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        Marca::destroy($marca->id);

        return redirect("/producto");
    }
}
