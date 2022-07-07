@extends('voyager::master')
@section('page_title', 'Calificaciones')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-logbook"></i> Calificación de {{ $alumno->nombre }}
        </h1>
        <a href="{{ url('admin/alumnos/'.$alumno->nombre) }}" class="btn btn-warning"><span class="glyphicon glyphicon-list"></span> Regresar</a>
        <a class="btn btn-info" href="{{ url('admin/imprimir/'.$alumno->id) }}" target="_blank"><i class="fa fa-print"></i>Imprimir</a>
    </div>
@stop
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
                <div id="container">
                    <div class="row">
                        <div class="col-md-3"><img src="{{ asset('storage/'.'Icon.png') }}" width="120" class="img-responsive"></div>
                        <div class="col-md-6 text-center">
                            <h4>
                            UNIVERSIDAD TECNOLOGICA DE CANDELARIA<br><br>
                            UTECAN<br>

                            </h4>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Alumno: {{ $alumno->nombre}}</div>
                        <div class="col-md-4 text-right">Carrera: {{ $alumno->Carrera }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" border="1">
                                <thead>
                                <tr>
                                    <th>Asignatura</th>
                                    <th>I Parcial</th>
                                    <th>II Parcial</th>
                                    <th>III Parcial</th>
                                    <th>IV Parcial</th>
                                    <th>Remedial</th>
                                    <th>Final</th>
                                    <th style="border: none"></th>
                                    <th>Extraordinario</th>


                                </tr>

                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <p>
                            La escala de calificaciones es del 0 al 10 y la minima aprobatoria es de 8
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            ELABORO<br>
                            RESPONSABLE DEPTO. SERVICIOS ESCOLARES
                            <br><br><br>
                            <hr width="70%">
                            LIC JAVIER
                        </div>
                        <div class="col-md-6 text-center">
                            Vo.Bo<br>
                            Lic
                            <br><br><br>
                            <hr width="70%" size="2">
                            Lic
                        </div>
                    </div>
                </div>
		</div>
	</div>
</div>
@stop

