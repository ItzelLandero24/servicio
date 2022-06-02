<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm">
    <style>
        .subrrayado {
            text-decoration: underline;
            font-size: 14px
            margin: 20px;
        }
    </style>

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
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script src="script.js"></script>
    <table>
        <tr>
        <td  style="width: 100%; vspace: 1"><img src="https://telegra.ph/file/ca8ab134d4687616726a6.jpg" width="250" height="80"></td>
        </tr>
        </table>
        <table id="okey">
            <tr>
                    <h1 id="titulo">
                      UNIVERSIDAD TECNOLOGICA DE CANDELARIA <br><br>
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
                <td><b>DOMICILIO:</b></td>
                <td><b>GMAIL:</b> {{ $dato->email }}</td>

            </tr>
            <tr>
                <td><b>FECHA DE NACIMIENTO:</b> {{ $dato->fechadenacimiento }}</td>
                <td><b>COLONIA:</b> {{ strtoupper($dato->colonia) }}</td>
                <td><b>SEXO:</b> {{ ($dato->sexo == 1) ? 'Femenino' : 'Masculino' }}</td>
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
                <td><b>UBICACIÓN:</b> {{ strtoupper($dato->ubicacionescuela) }}</td>
            </tr>
        </table>
</page>
<script>
    window.print();
</script>
