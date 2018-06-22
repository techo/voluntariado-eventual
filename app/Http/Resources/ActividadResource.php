<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ActividadResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'idActividad' => $this->idActividad,
            'tipo' => new TipoResource($this->tipo),
            'fecha' => $this->fechaInicio->format('d/m'),
            'hora' => $this->fechaInicio->format('H:i'),
            'fechaInicio' => empty($this->fechaInicio) ? '' : $this->fechaInicio->format('d-m-Y'),
            'fechaFin' => empty($this->fechaFin) ? '' : $this->fechaFin->format('d-m-Y'),
            'fechaInicioInscripciones' =>empty($this->fechaInicioInscripciones) ? '' : $this->fechaInicioInscripciones->format('d-m-Y'),
            'fechaFinInscripciones' => empty($this->fechaFinInscripciones) ? '' : $this->fechaFinInscripciones->format('d-m-Y'),
            'nombreActividad' => $this->nombreActividad,
            'descripcion' => $this->descripcion,
            'compromiso' => $this->compromiso,
            'costo' => $this->costo,
            'lugar' => $this->lugar,
            'moneda' => $this->moneda,
            'puntosEncuentro' => PuntoEncuentroResource::collection($this->puntosEncuentro),
            'localidad' => $this->localidad,
            'inscriptos' => $this->idPersonaInscriptos($this->idActividad),
            'limiteInscripciones' => $this->limiteInscripciones,
            'cantInscriptos' => $this->inscripciones()->inscripto()->count(),
            'cuposRestantes' => $this->limiteInscripciones - $this->inscripciones()->inscripto()->count()
        ];
    }

    private static function convertirFecha($fecha){
        if(is_null($fecha)) return '';

        return $fecha->format('d-m-Y');
    }
}
