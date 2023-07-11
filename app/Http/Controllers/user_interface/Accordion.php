<?php

namespace App\Http\Controllers\user_interface;
use App\Models\Propiedades;
use App\Models\Ciudad;
use App\Models\Sector;
use App\Http\Controllers\Controller;
use App\Models\Agentes;
use App\Models\Inmobiliaria;
use Illuminate\Http\Request;

class Accordion extends Controller
{
  public function index()
  {
    $propiedades = Propiedades::with(['sector','sector.ciudad','agentes'])->get();
    return view('content.user-interface.ui-accordion', compact('propiedades'));

  }

  //FUNCION PARA BUSCAR Y FILTRAR
  public function buscar(Request $request)
{  
  $propiedades = Propiedades::with(['sector','agentes','agentes.inmobiliaria'])->get();
    $inmobiliarias = Inmobiliaria::all();
    $ciudads = Ciudad::all();
    $sectors = Sector::with(['ciudad'])->get();
  
  //PEDIR LOS DATOS INGRESADOS EN EL FORMULARIO
    $contrato = $request->input('contrato');
    $tipo = $request->input('tipo');
    $sectorId = $request->input('sector_id');
    $ciudadId = $request->input('ciudad');
    $rangoDimensionDesde = $request->input('rango-dimension-desde');
    $rangoDimensionHasta = $request->input('rango-dimension-hasta');
    $banos = $request->input('banos');
    $estacionamiento = $request->input('estacionamiento');
    $plantas = $request->input('plantas');
    $habitaciones = $request->input('habitaciones');
    $rangoPrecioDesde = $request->input('rango-precio-desde');
    $rangoPrecioHasta = $request->input('rango-precio-hasta');
    $inmobiliaria = $request->input('inmobiliaria');

    //QUERY PARA ALMACENAR LAS PROPIEDADES
    $query = Propiedades::query()
        ->leftJoin('sectors', 'propiedades.sector_id', '=', 'sectors.id') // Unión con la tabla sectores
        ->leftJoin('agentes', 'propiedades.agentes_id', '=', 'agentes.id') // Unión con la tabla agentes
        ->select('propiedades.*');

    //LLAMADOS A LOS MODELOS CIUDAD Y AGENTES PARA LAS CLAVES FORANEAS
    //consultas a las tablas Ciudad y Agentes
    $ciudadModel = Ciudad::where('id', $ciudadId)->first();//buscando la primera ciudad que coincida con el id ingresado
    $ciudadId = $ciudadModel ? $ciudadModel->id : null; //asignar el valor de ciudad model a ciudadId verificando que no sea nulo
    $agenteIds = Agentes::where('inmobiliaria_id', $inmobiliaria)->pluck('id')->toArray();//obtener los id de los agentes que pertenecen a una determinada inmobiliaria
   
    // Filtrar por los parámetros especificados
    if ($contrato) {
        $query->where('propiedades.contrato', $contrato);
    }
    if ($tipo) {
        $query->where('propiedades.tipo', $tipo);
    }
    if ($ciudadId) {
        $query->whereHas('sector', function ($subquery) use ($ciudadId) {
            $subquery->where('ciudad_id', $ciudadId);
        });
    }
    if ($sectorId) {
        $query->where('propiedades.sector_id', $sectorId);
    }
    if ($rangoDimensionDesde && $rangoDimensionHasta) {
        $query->whereBetween('propiedades.dimension', [$rangoDimensionDesde, $rangoDimensionHasta]);
    }
    if ($banos) {
        $query->where('propiedades.banos', $banos);
    }
    if ($estacionamiento) {
        $query->where('propiedades.estacionamiento', $estacionamiento);
    }
    if ($plantas) {
        $query->where('propiedades.plantas', $plantas);
    }
    if ($habitaciones) {
        $query->where('propiedades.habitaciones', $habitaciones);
    }
    if ($rangoPrecioDesde && $rangoPrecioHasta) {
        $query->whereBetween('propiedades.precio', [$rangoPrecioDesde, $rangoPrecioHasta]);
    }

    // Ordenar los resultados por coincidencia con los parámetros
    $query->orderByRaw("
        (
            (IF(contrato = '{$contrato}', 1, 0))
            + (IF(tipo = '{$tipo}', 1, 0))
            + (IF(ciudad_id = '{$ciudadId}', 1, 0))
            + (IF(sector_id = '{$sectorId}', 1, 0))
            + (IF(dimension BETWEEN '{$rangoDimensionDesde}' AND '{$rangoDimensionHasta}', 1, 0))
            + (IF(banos = '{$banos}', 1, 0))
            + (IF(estacionamiento = '{$estacionamiento}', 1, 0))
            + (IF(plantas = '{$plantas}', 1, 0))
            + (IF(habitaciones = '{$habitaciones}', 1, 0))
            + (IF(precio BETWEEN '{$rangoPrecioDesde}' AND '{$rangoPrecioHasta}', 1, 0))
            + (IF(agentes_id IN (" . ($agenteIds ? implode(',', $agenteIds) : "0") . "), 1, 0))
        ) DESC"
    );
 

        $propiedades = $query->get();

return view('content.user-interface.ui-accordion', compact('propiedades', 'ciudads', 'sectors', 'inmobiliarias'));       
} 
}

