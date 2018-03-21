<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;
use App\PuntoEncuentro;
use App\Inscripcion;
use Illuminate\Support\Facades\Auth;


class InscripcionesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmar(Request $request, $id)
    {
        $actividad = Actividad::find($id);
        $idPuntoEncuentro = $request->input('punto_encuentro');
        $puntoEncuentro = PuntoEncuentro::find($idPuntoEncuentro);
        return view('inscripciones.confirmar')->with('actividad', $actividad)->with('punto_encuentro', $puntoEncuentro);

    }

    public function create(Request $request, $id)
    {
        if (Inscripcion::where([['idActividad', $id], ['idPersona', Auth::user()->idPersona]])->get()->count() == 0) {
            $inscripcion = new Inscripcion();
            $actividad = Actividad::find($id);
            $punto_encuentro = PuntoEncuentro::find($request->input('punto_encuentro'));
            $inscripcion->idActividad = $id;
            $inscripcion->idPuntoEncuentro = $request->input('punto_encuentro');
            $inscripcion->idPersona = Auth::user()->idPersona;
            $inscripcion->estado = 'Sin Contactar';
            $inscripcion->evaluacion = 0;
            $inscripcion->acompanante = '';
            $inscripcion->save();
            return view('inscripciones.gracias')->with('actividad', $actividad)->with('punto_encuentro', $punto_encuentro);
        }
        return redirect('actividades/' . $id);

    }

    public function inscripto($id)
    {
        if (Auth::check() && Auth::user()->estaInscripto($id)) {
            return Array('idActividad' => $id);
        }
        return Array('idActividad' => false);
    }
}
