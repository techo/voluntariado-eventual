@extends('backoffice.main')

@section('page_title', $actividad->nombreActividad . ' - evaluaciones')

@section('content')
<div class="nav-tabs-custom">

    @include('backoffice.actividades.tabs' , [ 'tab' => 'evaluaciones' ])

    <div class="tab-content">

        <div class="tab-pane active" id="evaluaciones">
            <div class="row vertical-align">
                <div class="col-md-12">
                    <h3 class="pull-left">Evaluaciones</h3>
                    <span class="pull-right">
                        <br>
                        <btn-enviar-evaluaciones :prop-actividad="{{$actividad}}"></btn-enviar-evaluaciones>
                    </span>
                </div>
            </div>
            <evaluaciones-general-stats :id="{{ $actividad->idActividad }}" ></evaluaciones-general-stats>
            <evaluaciones-actividad :id="{{ $actividad->idActividad }}" ></evaluaciones-actividad>
            <evaluaciones-voluntarios :id="{{ $actividad->idActividad }}" ></evaluaciones-voluntarios>
        </div>

    </div>
</div>
@endsection

@push('additional_css')
    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
@endpush