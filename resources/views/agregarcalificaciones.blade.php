@extends('voyager::master')
@section('page_title', 'Agregar Calificaciones')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-logbook"></i> Calificaciones de {{ $alumno->nombre ?? '' }}
        </h1>
        <a href="{{ url('admin/Calificaciones/') }}" class="btn btn-warning"><span class="glyphicon glyphicon-list"></span> Regresar</a>
    </div>
@stop
@section('content')
<script type="text/javascript">
	function buscar() {
		window.location.href = '{{ url('admin/calificacion/crear/') }}/'+$('select#cursos option:checked').val();
	}
</script>
@if(is_null($alumno))
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="panel panel-default">
			<div class="panel-body">
				<select id="cursos" class="form-control select2">
			        @foreach ($alumno as $alumno)
			        	<option value="{{ $alumno->nombre }}">{{ $alumno->nombre }}</option>
			        @endforeach
			    </select>
			    <a href="javascript:buscar()" class="form-control btn btn-success">Buscar</a>
			</div>
		</div>
	</div>
</div>
@else
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
                <div id="container">
                    <div class="row">
                        <form action="/admin/calificacion/crear" class="form-inline" method="POST">
                            <input type="hidden" name="alumno" value="{{ $alumno->id }}">
                            <div class="form-group col-md-12">
                                <label for="parcial">Parcial: </label>
                                <select name="parcial" id="parcial" class="form-control select2 select2-hidden-accessible">
                                    <option value="1">Primer</option>
                                    <option value="1">Segundo</option>
                                    <option value="1">tercer</option>
                                    <option value="1">cuarto</option>
                                </select>
                            </div>
                            @csrf
                            @foreach ($alumno->materias() as $materia)
                                <div class="form-group col-md-12">
                                <label for="materia_{{ $materia->id }}">{{ $materia->nombre }}: </label>
                                <input type="number" name="materias[{{ $materia->nombre }}]" class="form-control" max="10" min="0" id="materia_{{ $materia->id }}">
                                </div>
                            @endforeach
                            <input type="submit" value="Enviar" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
@endif
@stop
