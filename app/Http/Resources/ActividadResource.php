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
    public function toArray($request) {
        
        $idPersona = (auth()->user()) ? auth()->user()->idPersona : null;

        return [
            'idActividad'   => $this->idActividad,
            'tipo'          => new TipoResource($this->tipo),
            'pago'          => $this->pago,
            'fecha'         => $this->fechaInicio->format('d/m'),
            'hora'          => $this->fechaInicio->format('H:i'),
            'fechaInicio'   => empty($this->fechaInicio) ? '' : $this->fechaInicio->format('d-m-Y'),
            'fechaFin'      => empty($this->fechaFin) ? '' : $this->fechaFin->format('d-m-Y'),
            'fechaInicioInscripciones'  => empty($this->fechaInicioInscripciones) ? '' : $this->fechaInicioInscripciones->format('d-m-Y'),
            'fechaFinInscripciones'     => empty($this->fechaFinInscripciones) ? '' : $this->fechaFinInscripciones->format('d-m-Y'),
            'nombreActividad'           => $this->nombreActividad,
            'descripcion'   => $this->descripcion,
            'compromiso'    => $this->compromiso,
            'montoMin'         => $this->montoMin,
            'montoMax'         => $this->montoMax,
            'lugar'         => $this->lugar,
            'moneda'        => $this->moneda,
            'puntosEncuentro'           => PuntoEncuentroResource::collection($this->puntosEncuentro),
            'ubicacion'     => $this->provincia->provincia,
            'estadoInscripcion'    => $this->estadoInscripcion($idPersona),
            'limiteInscripciones'       => (int)$this->limiteInscripciones,
            'fechaLimitePago'      => empty($this->fechaLimitePago) ? '' : $this->fechaLimitePago->format('d-m-Y'),
            'cantInscriptos' => $this->inscripciones()->count(),
            'cuposRestantes' => (int)$this->limiteInscripciones - $this->inscripciones()->count(),
            'presente' => (isset($this->presente) && $this->presente == 1) ? 1 : 0
        ];
    }

    private static function convertirFecha($fecha){
        if(is_null($fecha)) return '';

        return $fecha->format('d-m-Y');
    }
}
