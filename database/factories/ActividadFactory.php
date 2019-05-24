<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Actividad::class, function (Faker $faker) {

      $fecha = Carbon::parse(now())->addDays(5);
      $fecha_fin = $fecha->copy()->addMinute();

    return [
      'idTipo' => factory(\App\Tipo::class)->create(),
      'fechaCreacion' => $fecha->format('Y-m-d H:i:s'),
      'fechaModificacion' => $fecha->format('Y-m-d H:i:s'),
      'fechaInicio' => $fecha->format('Y-m-d H:i:s'),
      'fechaFin' => $fecha_fin->format('Y-m-d H:i:s'),
      'fechaInicioFinFormato' => null,
      'fechaInicioInscripciones' => $fecha->copy()->subDays(10)->format('Y-m-d H:i:s'),
      'fechaFinInscripciones' => $fecha->copy()->subMinute()->format('Y-m-d H:i:s'),
      'limiteInscripciones' => "0",
      'idUnidadOrganizacional' => 1,
      'idOficina' => 1,
      'nombreActividad' => $faker->name,
      'descripcion' => $faker->name,
      'lugar' => "",
      'casasPlanificadas' => "0",
      'casasConstruidas' => "0",
      'comentarios' => "",
      'tipoConstruccion' => "",
      'estadoConstruccion' => "Abierta",
      'idPrograma' => null,
      'mensajeInscripcion' => $faker->name,
      'idEncuestaDinamica' => 0,
      'numConstruccion' => null,
      'pApMat' => 1,
      'pDNI' => 1,
      'pFonoMovil' => 1,
      'pUniversidad' => 1,
      'pCarrera' => 1,
      'pAnoEstudio' => 1,
      'pAcompanante' => 0,
      'tPortugues' => 0,
      'enviarMail' => 1,
      'actividadSecundaria' => 1,
      'compromiso' => 1,
      'idListaCTCT' => "",
      'mostrarFB' => 0,
      'presupuesto' => null,
      'inscripcion' => null,
      'inscripcionInterna' => 0,
      'idPersonaCreacion' => 1,
      'idPersonaModificacion' => 1,
      'idEmpresa' => null,
      'costo' => null,
      'moneda' => "ARS",
      'estadoDefault' => null,
      'puntosEnvio' => null,
      'captaciones' => null,
      'pAcompanantePost' => null,
      'mailBeca' => null,
      'idFormulario' => null,
      'fechaInicioEvaluaciones' => $fecha_fin->copy()->addMinute()->format('Y-m-d H:i:s'),
      'fechaFinEvaluaciones' => $fecha_fin->copy()->addDays(10)->format('Y-m-d H:i:s'),
      'idAsentamiento' => null,
      'idZona' => null,
      'linkFormularioEvaluacion' => null,
      'statusMailSeguimiento' => null,
      'mailSeguimiento' => null,
      'destacada' => null,
      'EnviarMailPago' => null,
      'MailPago' => null,
      'CostoConMoneda' => null,
      'LinkPago' => null,
      'PuntosEnvioUL' => null,
      'CaptacionesUL' => null,
      'idPais' => factory(App\Pais::class)->create(),
      'idProvincia' => factory(App\Provincia::class)->create(),
      'idLocalidad' => factory(App\Localidad::class)->create(),
      'idCoordinador' => factory(App\Persona::class)->create(),
      'beca' => null,
      'montoMin' => "100.00",
      'montoMax' => "0.00"
        //
    ];
});
