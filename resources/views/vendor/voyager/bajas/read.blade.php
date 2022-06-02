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
        height: 200px;"
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

</style>
@extends('voyager::master')

@section('page_title', 'Expediente de bajas')

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('Expediente de bajas') }} {{ ucfirst($dataType->getTranslatedAttribute('')) }} &nbsp;

        @can('edit', $dataTypeContent)
            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                {{ __('voyager::generic.edit') }}
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

        <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager::generic.return_to_list') }}
        </a>
        <a class="btn btn-info" href="{{ url('admin/baja/'.$dato->id) }}" target="_blank"><i class="voyager-external"></i>Imprimir</a>
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="col-md-12">
                            @if($dato->inscrito)
                            <div class="alert alert-success" role="alert">
                               bajas
                            </div>
                            @else
                            <div class="alert alert-warning" role="alert">
                                Los alumnos que estan dado de bajas
                            </div>
                            @endif
                            <table>
                            <tr>
                            <td style="width: 100%; vspace: 1"><img src="https://telegra.ph/file/ca8ab134d4687616726a6.jpg" width="250" height="80"></td>
                            </tr>
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
                                            <td id="solicitud" colspan="3"><b>SOLICITUD DE BAJA</b>  </td>
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

                                </tr>
                            </table>
                            <table style="border: solid 1px #000; width: 100%;">

                                <tr>
                                    <td> <b>NOMBRE COMPLETO:</b> {{ strtoupper($dato->nombre) }} {{ strtoupper($dato->apellido) }}</td>

                                </tr>
                                <tr>
                                    <td><b>MATRICULA:</b> {{ strtoupper($dato->matricula) }}</td>
                                </tr>
                                <tr>
                                    @php
                                    $estatus = array('', 'Baja Definiiva', 'Baja Temporal', 'Continuidad');
                                @endphp
                                    <td><b>ESTATUS:</b>  {{ $estatus[$dato->estatus] }}</td>
                                </tr>

                            </table>
                            <br>
                            <br>
                            <div style="text-align: center; font-size: 12px">MISMO QUE IMPIDE CONTINUAR CON MIS ESTUDIOS EN ESTA INSTITUCIÓN</div>
                            <table  style="border: solid 1px #000; width: 100%;">

                            </table>
                            <br>
                            <br>
                            <table style="width: 100%; text-align: center">
                                <tr>
                                    <td style="width: 45%;">
                                        NOMBRE Y FIRMA DEL ALUMNO<br>
                                        <br><br><br><br>
                                        <hr width="70%">

                                    </td>

                                    </td>
                                    <td style="width: 45%;">
                                               Vo.Bo
                                        DIRECTOR DE DIVISIÓN DE CARRERA
                                        <br><br><br><br><br>
                                        <hr width="70%" size="2">

                                    </td>

                                </tr>
                                <tr>
                                  <td style="width: 45%;">
                                    FIRMA Y SELLO
                                    BIBLIOTECA
                                    <br><br><br><br><br>
                                    <hr width="70%" size="2">
                                 </td>

                                  <td style="width: 45%;">
                                    COLEGIATURA
                                    <br><br><br><br><br>
                                    <hr width="70%" size="2">
                                  </td>
                                </tr>
                            </table>
                            <br>
                            <hr>
                            <div style="text-align: left; font-size: 12px">RECIBÍ DE CONFORMIDAD LOS SIGUIENTES DOCUMENTOS ORIGINALES: </div>
                            <table style="width: 100%">
                                <hr>
                            <p>

                                Documentos:<br> <br>

                                <input type="checkbox" name="cb-acta" value="gusta"> Acta de nacimiento<br>
                                <input type="checkbox" name="cb-secundaria" value="gusta"> Certificado de estudios de secundaria<br>
                                <input type="checkbox" name="cb-prepa" value="gusta"> Certificado de estudios de bachillerato<br>
                                <input type="checkbox" name="cb-carta" value="gusta"> Carta de buena conducta de bachillerato<br>
                                <input type="checkbox" name="cb-fotos" value="gusta"> Fotografías<br>
                                <input type="checkbox" name="cb-otros" value="gusta"> Otros<br>
                                <input type="checkbox" name="cb-credencial" value="gusta"> Devuelve credencial<br>

                            </p>

                            </table>
                        </table>
                        <br>
                        <br>
                        <table style="width: 100%; text-align: center">
                            <tr>
                                <td style="width: 45%;">
                                    FIRMA DEL INTERESADO<br>
                                    <br><br><br><br>
                                    <hr width="70%">
                                </td>
                                </td>
                                <td style="width: 45%;">
                                     NOMBRE Y FIRMA
                                    <br><br><br><br><br>
                                    <hr width="70%" size="2">

                                </td>
                            </tr>
                        </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
