<?php

namespace App\Http\Controllers\tables;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImagenesRequest;
use App\Http\Requests\PropiedadRequest;
use App\Models\Agentes;
use App\Models\Imagenes;
use App\Models\Propiedades;
use App\Models\Sector;
use Illuminate\Http\Request;

class Basic extends Controller
{
  public function index()
  {
    $propiedades = Propiedades::with(['sector','sector.ciudad','agentes.inmobiliaria','imagenes'])->get();

    $imagenes = Imagenes::with('propiedades')->get();
    $agentes = Agentes::with('inmobiliaria')->get();
    $sectors = Sector::with('ciudad')->get();

    return view('content.tables.tables-basic', compact('propiedades','imagenes','agentes','sectors'));
  }

  public function registrar(PropiedadRequest $request, ImagenesRequest $imagenesRequest)
  {
    $data = $request->validated();

    if ($request->hasFile('imagen')) {
      $archivo = $request->file('imagen');
      $nuevoNombreFoto = time() . '_' . $archivo->getClientOriginalName();
      $rutaDestino = public_path('assets/img/propiedades') . $nuevoNombreFoto;
      $archivo->move(public_path('assets/img/propiedades'), $nuevoNombreFoto);

      // Guardar la nueva foto en la base de datos
      $data['imagen'] = $nuevoNombreFoto;
    }

    $propiedad = new Propiedades($data);
    $propiedad->save();

    if ($imagenesRequest->hasFile('imagenes')) {
      foreach ($imagenesRequest->file('imagenes') as $imagen) {
          $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
          $imagen->move(public_path('assets/img/propiedades'), $nombreImagen);

          // Crear una nueva imagen y guardarla en la base de datos
          $nuevaImagen = new Imagenes();
          $nuevaImagen->nombre_foto = $nombreImagen;
          $nuevaImagen->propiedades_id = $propiedad->id;
          $nuevaImagen->save();
      }
  }

    return redirect(to: '/propiedades/listado');

  }

  public function editar(Request $request, $id)
  {
    $propiedades = Propiedades::with('sector','sector.ciudad','agentes.inmobiliaria')->find($id);
    $imagenes = Imagenes::with('propiedades_id');
    $agentes = Agentes::with('inmobiliaria');
    $sectors = Sector::with('ciudad');

    $propiedades->titulo = $request->titulo;
    $propiedades->tipo = $request->tipo;
    $propiedades->dimension = $request->dimension;
    $propiedades->banos = $request->banos;
    $propiedades->estacionamiento = $request->estacionamiento;
    $propiedades->descripcion = $request->descripcion;
    $propiedades->plantas = $request->plantas;
    $propiedades->habitaciones = $request->habitaciones;
    $propiedades->precio = $request->precio;
    $propiedades->contrato = $request->contrato;
    $propiedades->agentes_id = $request->agentes_id;
    $propiedades->sector_id = $request->sector_id;

    if ($request->hasFile('imagen')) {
      $archivo = $request->file('imagen');
      $nuevoNombreFoto = time() . '_' . $archivo->getClientOriginalName();
      $rutaDestino = public_path('assets/img/propiedades') . $nuevoNombreFoto;
      $archivo->move(public_path('assets/img/propiedades'), $nuevoNombreFoto);

      // Guardar la nueva foto en la base de datos
      $propiedades->imagen = $nuevoNombreFoto;
  }

    if ($propiedades->save()) {
      return redirect(to: '/propiedades/listado');
    } else {
      return view('content.tables.tables-basic', compact('propiedades'));
    }
  }

  public function borrar($id)
  {
    $propiedades = Propiedades::with('sector','sector.ciudad','agentes.inmobiliaria')->find($id);


    if (Propiedades::destroy($id)) {
      return redirect(to: '/propiedades/listado');
    } else {
      return view('content.tables.tables-basic', compact('propiedades'));
    }
  }

  public function eliminar($id)
    {
        $imagen = Imagenes::find($id);
        
        // Lógica para eliminar la imagen de la base de datos y del almacenamiento
        
        if (Imagenes::destroy($id)) {
          return response()->json(['mensaje' => 'Imagen eliminada con éxito']);
        } else {
          return response()->json(['mensaje' => 'No se encontró la imagen'], 404);
        }
    }
}
