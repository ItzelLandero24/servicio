<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm">
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
        <td><b>ESTATUS:</b> {{ $estatus[$dato->estatus] }}</td>
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
</page>
<script>
    window.print();
</script>
