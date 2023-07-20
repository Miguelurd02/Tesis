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
use Illuminate\Support\Facades\Validator;

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
    $user = auth()->user();
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

    if($user->rol=='inmobiliaria'){
      return redirect(to: '/publicacion/registrar');
    } else{
      return redirect(to: '/propiedades/listado');
    }


  }

  public function editar(Request $request, $id)
  {
    $user = auth()->user();
    $propiedades = Propiedades::with('sector','sector.ciudad','agentes.inmobiliaria')->find($id);
    $imagenes = Imagenes::with('propiedades_id');
    $agentes = Agentes::with('inmobiliaria');
    $sectors = Sector::with('ciudad');

    $existingImageCount = Imagenes::where('propiedades_id', $id)->count();
    $remainingImageCount = 10 - $existingImageCount;

    $rules = [

      'imagenes' => ['array', 'max:'. $remainingImageCount],
      'imagenes.*' => ['mimes:jpeg,png,jpg'],

      'titulo' => ['required', 'min:4', 'max:50', 'regex:/^[A-ZÁÉÍÓÚÑ][\p{L}\d\s.,]+$/u'],
      'imagen' => ['image', 'mimes:jpeg,png,jpg'],
      'tipo' => ['required'],
      'dimension' => ['required', 'numeric'],
      'banos' => ['required','numeric'],
      'estacionamiento' => ['required','numeric'],
      'descripcion' => ['required', 'min:50', 'max:1200'],
      'plantas' => ['required','numeric'],
      'habitaciones' => ['required','numeric'],
      'precio' => ['required', 'numeric'],
      'contrato' => ['required'],
      'agentes_id' => ['required'],
      'sector_id' => ['required'],
      // Resto de las reglas de validación para otros campos
  ];

  $messages = [
    'imagenes.image' => 'El campo de imágenes debe ser una imagen.',
    'imagenes.mimes' => 'El campo de imágenes debe ser un archivo de tipo JPEG, PNG o JPG.',
    'imagenes.max' => 'Se ha alcanzado el límite máximo de imágenes permitidas.',

    'titulo.required' => 'El campo de título es obligatorio.',
    'titulo.min' => 'El campo de título debe tener al menos :min caracteres.',
    'titulo.max' => 'El campo de título no debe exceder los :max caracteres.',
    'titulo.regex' => 'El formato del campo de título debe comenzar con mayúscula y solo puede contener letras y espacios en blanco',

    'imagen.image' => 'El campo de imagen debe ser una imagen.',
    'imagen.mimes' => 'El campo de imagen debe ser un archivo de tipo JPEG, PNG o JPG.',

    'tipo.required' => 'El campo de Tipo de inmueble es obligatorio.',

    'dimension.required' => 'El campo de dimensión es obligatorio.',
    'dimension.numeric' => 'El campo de dimensión debe ser un valor numérico.',

    'banos.required' => 'El campo de baños es obligatorio.',
    'banos.numeric' => 'El campo de baños debe ser un valor numérico.',

    'estacionamiento.required' => 'El campo de estacionamiento es obligatorio.',
    'estacionamiento.numeric' => 'El campo de estacionamiento debe ser un valor numérico.',

    'descripcion.required' => 'El campo de descripción es obligatorio.',
    'descripcion.min' => 'El campo de descripción debe tener al menos :min caracteres.',
    'descripcion.max' => 'El campo de descripción no debe exceder los :max caracteres.',

    'plantas.required' => 'El campo de plantas es obligatorio.',
    'plantas.numeric' => 'El campo de plantas debe ser un valor numérico.',

    'habitaciones.required' => 'El campo de habitaciones es obligatorio.',
    'habitaciones.numeric' => 'El campo de habitaciones debe ser un valor numérico.',

    'precio.required' => 'El campo de precio es obligatorio.',
    'precio.numeric' => 'El campo de precio debe ser un valor numérico.',

    'contrato.required' => 'El campo de Tipo de contrato es obligatorio.',

    'agentes_id.required' => 'El campo de agentes es obligatorio.',

    'sector_id.required' => 'El campo de sector es obligatorio.',
  ];

  $validator = Validator::make($request->all(), $rules, $messages);

  if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
  }

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

    if ($request->hasFile('imagenes')) {
      foreach ($request->file('imagenes') as $imagen) {
          $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
          $imagen->move(public_path('assets/img/propiedades'), $nombreImagen);

          // Crear una nueva imagen y guardarla en la base de datos
          $nuevaImagen = new Imagenes();
          $nuevaImagen->nombre_foto = $nombreImagen;
          $nuevaImagen->propiedades_id = $propiedades->id;
          $nuevaImagen->save();
      }
    }

    if ($propiedades->save()) {
      if($user->rol=='inmobiliaria'){
        return redirect(to: '/publicacion/ver');
      } else{
        return redirect(to: '/propiedades/listado');
      }
    } else {
      return view('content.tables.tables-basic', compact('propiedades'));
    }
  }

  public function borrar($id)
  {
    $user = auth()->user();
    $propiedades = Propiedades::with('sector','sector.ciudad','agentes.inmobiliaria')->find($id);


    if (Propiedades::destroy($id)) {
      if($user->rol=='inmobiliaria'){
        return redirect(to: '/publicacion/ver');
      } else{
        return redirect(to: '/propiedades/listado');
      }
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
