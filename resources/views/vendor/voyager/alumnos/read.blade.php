@php
    $dato = $dataTypeContent;
    $fecha = Carbon\Carbon::now()->locale('es');
@endphp
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<style>
    #tabladatos {
        border: solid 2px rgb(89, 46, 6);
        width: 100%;
        height: 300px;"
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         }
    #okey {
         font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
         font-size: 11pt;
         background-color: rgb(255, 255, 255)
         }
    #titulo {
        text-align: center;
        font-size: 30px;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        height: 100px;
    }

    #solicitud {
       text-align: center;
       font-size:  23px;
       background-color: #ebe5e5d9;
       font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
       width:60px;
     }
     #solicitud:hover {
        box-shadow: 0 0.1rem 0.4rem rgba(6, 172, 122, 0.583);
     }
     #datosalumno {
       text-align: center;
       font-size:  23px;
       background-color: #ebe5e5d9;
       font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
       width:60px;
     }
     #datosalumno:hover {
        box-shadow: 0 0.1rem 0.4rem rgba(6, 172, 122, 0.583);
    }
     #folio {
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         font-size: 15px;
         background-color: rgb(255, 255, 255)
         }

     #fecha {
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         font-size: 15px;
         background-color: rgb(255, 255, 255)
         }

    #datosescuela {
       text-align: center;
       font-size:  23px;
       background-color: #ebe5e5d9;
       font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
       width:60px;
     }
     #datosescuela:hover {
        box-shadow: 0 0.1rem 0.4rem rgba(6, 172, 122, 0.583);
     }

    #datostablaescuela{
        border: solid 2px rgb(0, 0, 0);
        width: 100%;
        height: 150px;"
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    #invoice {
        font-size: 5px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

  #boton {
        background-color: rgba(237, 48, 35, 0.734);
        color:beige;
       border-radius: 30px;
    }

</style>

@extends('voyager::master')

@section('page_title', __('Expedientes del registro de alumnos').' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('Expediente del alumno') }} {{ ucfirst($dataType->getTranslatedAttribute('')) }} &nbsp;

        @can('edit', $dataTypeContent)
            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
                <i class="glyphicon glyphicon-pencil"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.edit') }}</span>
            </a>
        @endcan
        @can('delete', $dataTypeContent)
            @if($isSoftDeleted)
                <a href="{{ route('voyager.'.$dataType->slug.'.restore', $dataTypeContent->getKey()) }}" title="{{ __('voyager::generic.restore') }}" class="btn btn-default restore" data-id="{{ $dataTypeContent->getKey() }}" id="restore-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.restore') }}</span>
                </a>
            @else
                <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger delete" data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
                </a>
            @endif
        @endcan
        @can('browse', $dataTypeContent)
        <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
            <i class="glyphicon glyphicon-list"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.return_to_list') }}</span>
        </a>
        <a class="btn btn-info" href="{{ url('admin/registro/'.$dato->id) }}" target="_blank"><i class="voyager-external"></i>Imprimir</a>


        @endcan
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="col-md-12">
                            @if($dato->Registro)
                            <div class="alert alert-success" role="alert">
                                Se ha realizado el registro de alumnos
                            </div>
                            @else
                            <div class="alert alert-warning" role="alert">
                                Los datos del registro estan en proceso
                            </div>
                            @endif
                            <table>
                            <tr>
                            <td  style="width: 100%; vspace: 1"><img src="https://telegra.ph/file/ca8ab134d4687616726a6.jpg" width="250" height="80"></td>
                            </tr>
                            </table>
                            <table id="okey">
                                <tr>
                                        <h1 id="titulo">
                                          UNIVERSIDAD TECNOLÓGICA DE CANDELARIA <br><br>
                                        </h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="folio" style="width: 10%"><b> FOLIO:</b> {{ $dato->id }}</td>
                                </tr>
                                <tr>
                                    <td id="fecha" colspan="2"><b> FECHA:</b>  {{ strtoupper($fecha->isoFormat('LL')) }}</td>
                                </tr>
                                <tr>
                                    <td style="height: 15px"></td>
                                </tr>
                                <tr>
                                    <br>
                                    <td id="solicitud" colspan="3"><b>SOLICITUD DE REGISTRO</b>  </td>
                                </tr>
                                <tr>
                                    <td style="height: 15px"></td>
                                </tr>
                                <tr>
                                    <td id="datosalumno" colspan="3"><b>DATOS DEL ALUMNO</b></td>
                                </tr>
                                <tr>
                                    <td style="height: 15px"></td>
                                </tr>
                                <tr>
                                    <td style="height: 15px"></td>
                                </tr>
                            </table>
                            <table id="tabladatos">
                                <tr>
                                    <td> <b>NOMBRE COMPLETO:</b> {{ strtoupper($dato->nombre) }} {{ strtoupper($dato->apellidos) }}</td>
                                    <td><b>DOMICILIO:</b>{{ strtoupper($dato->domicilio) }}</td>
                                    <td><b>GMAIL:</b> {{ $dato->email }}</td>

                                </tr>
                                <tr>
                                    <td><b>FECHA DE NACIMIENTO:</b> {{ $dato->fechadenacimiento }}</td>
                                    <td><b>COLONIA:</b> {{ strtoupper($dato->colonia) }}</td>
                                    <td><b>SEXO:</b> {{ ($dato->sexo == 1) ? 'Masculino' : 'Femenino' }}</td>
                                </tr>
                                <tr>
                                    <td><b>LUGAR DE NACIMIENTO:</b> {{ strtoupper($dato->lugardenacimiento) }}</td>
                                    <td><b>MUNICIPIO:</b> {{ strtoupper($dato->municipio) }} {{ strtoupper($dato->comunidad) }}</td>
                                    <td><b>TELEFONO:</b> {{ $dato->telefono }}</td>
                                </tr>
                                <tr>
                                    <td><b>CURP:</b> {{ $dato->curp }}</td>
                                    <td><b>COMUNIDAD:</b> {{ strtoupper($dato->comunidad) }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>ESTADO:</b> {{ strtoupper($dato->estado) }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                <td><b>CÓDIGO POSTAL:</b> {{ $dato->CP }}</td>
                                </tr>
                            </table>
                            <br>

                            </table>
                            <br>
                            <br>
                            <table style="width: 100%;">
                                <tr>
                                    <td id="datosescuela"><b>DATOS DE LA ESCUELA DE PROCEDENCIA</b></td>
                                </tr>
                                <tr>
                                    <td style="height: 15px"></td>
                                </tr>
                                <tr>
                                    <td style="height: 15px"></td>
                                </tr>
                            </table>
                            <table id="datostablaescuela">
                                <tr>
                                    <td><b>NOMBRE DE LA ESCUELA:</b> {{ strtoupper($dato->escuelaprocedencia) }}</td>
                                </tr>
                                <tr>
                                    <td><b>UBICACIÓN:</b> {{ strtoupper($dato->ubicacion) }}</td>
                                </tr>
                            </table>


    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ __('voyager::generic.delete_confirm') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('javascript')
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="script.js"></script>
    @if ($isModelTranslatable)
        <script>
            $(document).ready(function () {
                $('.side-body').multilingual();
            });
        </script>
    @endif
    <script>
        var deleteFormAction;
        $('.delete').on('click', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) {
                // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');

            $('#delete_modal').modal('show');
        });

    </script>
@stop


