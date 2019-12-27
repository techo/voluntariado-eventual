<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearActividad extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombreActividad' => 'required',
            'descripcion' => 'required',
            'estadoConstruccion' => 'required',
            'confirmacion' => 'required',
            'pago' => 'required',

            'idTipo' => 'required',
            'idOficina' => 'required',

            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',

            'fechaInicioInscripciones' => 'sometimes|nullable|date|before_or_equal:fechaInicio',
            'fechaFinInscripciones' => 'sometimes|required_unless:fechaInicioInscripciones,null|nullable|date|after_or_equal:fechaInicioInscripciones',
            'fechaInicioEvaluaciones' => 'sometimes|nullable|date|after_or_equal:fechaInicio',
            'fechaFinEvaluaciones' => 'sometimes|required_unless:fechaInicioEvaluaciones,null|nullable|date|after_or_equal:fechaInicioEvaluaciones',
            
            'lugar' => 'present',
            'idPais' => 'required',
            'idProvincia' => 'required',
            'idLocalidad' => 'required',

            'limiteInscripciones' => 'nullable',
            'inscripcionInterna' => 'nullable',
            'mensajeInscripcion' => 'required',
            
            'montoMin' => 'nullable',
            'montoMax' => 'nullable',
            'moneda' => 'nullable',
            'fechaLimitePago' => 'nullable',
            'beca' => 'nullable',
        ];
    }
}
