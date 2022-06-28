@extends('voyager::master')
@section('page_title', 'Calificación')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-logbook"></i> Calificación de {{ $alumno->nombre }}
        </h1>
        <a href="{{ url('admin/cursos/'.$curso->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-list"></span> Regresar</a>
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
                        <div class="col-md-3"><img src="{{ asset('storage/'.'bg_app.jpg') }}" width="120" class="img-responsive"></div>
                        <div class="col-md-6 text-center">
                            <h4>
                            UNIVERSIDAD TECNOLOGICA DE CANDELARIA<br><br>
                            UTECAN<br>

                            </h4>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Alumno: {{ $alumno->name }}</div>
                        <div class="col-md-4">Matricula: </div>
                        <div class="col-md-4 text-right">Carrera: {{ $alumno->carrera->carrera }}</div>
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
                                    <th>Extraordinario</th>
                                    <th>Final</th>
                                    <th style="border: none"></th>
                                    <th>Extraordinario</th>
                                    <th>baja</th>

                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $suma=0;
                                    @endphp
                                    @foreach ($alumno->materias() as $materia)
                                        <tr>
                                            <td>{{ $materia->nombre }}</td>
                                            <td>{{ $alumno->calificacion($materia->id, 1) }}</td>
                                            <td>{{ $alumno->calificacion($materia->id, 2) }}</td>
                                            <td>{{ $alumno->calificacion($materia->id, 3) }}</td>
                                            <td>{{ number_format($alumno->promedio($materia->id), 1) }}</td>
                                            <td style="width: 100px; border:none;"></td>
                                            <td>{{ $alumno->calificacion($materia->id, 4) }}</td>
                                            <td>{{ $alumno->calificacion($materia->id, 5) }}</td>
                                            <td>{{ $alumno->calificacion($materia->id, 6) }}</td>
                                            @php
                                                $suma+=$alumno->promedio($materia->id)
                                            @endphp
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">Promedio final</td>
                                        <td>{{ number_format($suma/$alumno->materias()->count(), 1) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <p>
                            La escala de calificaciones parciales es del 0.00 al 10.00. El alumno NO TENDRÁ DERECHO A
PRESENTAR EL EXAMEN PARCIAL de cada asignatura CUANDO NO OBTENGA EL PROMEDIO
MÍNIMO PARCIAL APROBATORIO de 6.00 o cuando no alcance el 80% de asistencia a clases.
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
                            DIRECTOR DEL PLANTEL
                            <br><br><br>
                            <hr width="70%" size="2">
                            LICENCIADA
                        </div>
                    </div>
                </div>
		</div>
	</div>
</div>
@stop
