<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagen = $request->file('file');

        $nombreImagen = Str::uuid() . '.' . $imagen->extension();

        //instanciar Intervention\Image
        $manager = new ImageManager(new Driver());
        //leer la imagen
        $imagenServidor = $manager::imagick()->read($imagen);
        //redimencionar la imagen
        $imagenServidor->resizeDown(1000, 1000);
        //crear la ruta de la imagen
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        //guardar la imagen en la ruta especificada
        $imagenServidor->save($imagenPath);

        return response()->json($nombreImagen);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
