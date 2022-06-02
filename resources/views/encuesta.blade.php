<!DOCTYPE HTML>
<html>
<head>
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
	<meta charset="utf-8" />
	<title>Estudio socioeconómico</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

    <style>
       #titulo {
        font-size: 1rem;
            font-family: Montserrat;
            text-align: center;
            background-color: #015052;
            color: white;
            padding: 1rem 2rem;        }

        body {
            background-color: #f9f9f9;
        }

        #espacio {
            font-size: 2rem;
            font-family: Montserrat;
            text-align: center;
            background-color: #015052;
            background-color: ;
            color: white;
            padding: 3rem 2rem;
}
        }

        a{
            border-radius: 5px;
            padding: 10px 7px;
            color: #fff;
            background-color: #333;
            margin: 5px;
            text-decoration: none;
            }

            .button {
            background-color: #2ecc71;
            border-radius: 6px;
            border: none;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
            text-align: center;
            width: auto;
            height:;
            float: right;
            }
            .button:hover {
            background-color: #FB7E29;
            color: #fff;
            }

            .img {
                width: 60px;
            }

            #myInput {
            background-image: url('https://www.w3schools.com/css/searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
            }
    </style>
</head>
<body>
    <div class="container">
        <br>
        <a class="button" href="http://servicio.test/admin/alumnos" target="_blank">← Regresar</a>
        <div class="img">
            <img src="https://telegra.ph/file/72adc6aa7a5e10bd11116.png" width="700">
        </div>
        <br>
        <br>
        <h2 id="espacio"><b>Universidad tecnológica de Candelaria</b></h2>
        <br>
    	<h2 id="titulo" class="text-center mt-4 mb-4"><b>ESTUDIO SOCIOECONÓMICO: CONCENTRADO DE ESTUDIANTES</b></h2>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar nombre">
        <br>
        <br>
    	<div class="card">
    		<div class="card-header"><b>Porfavor, seleccione a continuación el archivo excel:</b></div>
    		<div class="card-body">

                <input type="file" id="excel_file" />

    		</div>
    	</div>
        <div id="excel_data" class="mt-5"></div>
    </div>
</body>
</html>

<script>

const excel_file = document.getElementById('excel_file');

excel_file.addEventListener('change', (event) => {

    if(!['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'].includes(event.target.files[0].type))
    {
        document.getElementById('excel_data').innerHTML = '<div class="alert alert-danger">Only .xlsx or .xls file format are allowed</div>';

        excel_file.value = '';

        return false;
    }

    var reader = new FileReader();

    reader.readAsArrayBuffer(event.target.files[0]);

    reader.onload = function(event){

        var data = new Uint8Array(reader.result);

        var work_book = XLSX.read(data, {type:'array'});

        var sheet_name = work_book.SheetNames;

        var sheet_data = XLSX.utils.sheet_to_json(work_book.Sheets[sheet_name[0]], {header:1});

        if(sheet_data.length > 0)
        {
            var table_output = '<table id="mitabla" class="table table-striped table-bordered">';

            for(var row = 0; row < sheet_data.length; row++)
            {

                table_output += '<tr>';

                for(var cell = 0; cell < sheet_data[row].length; cell++)
                {

                    if(row == 0)
                    {

                        table_output += '<th>'+sheet_data[row][cell]+'</th>';

                    }
                    else
                    {

                        table_output += '<td>'+sheet_data[row][cell]+'</td>';

                    }

                }

                table_output += '</tr>';

            }

            table_output += '</table>';

            document.getElementById('excel_data').innerHTML = table_output;
        }

        excel_file.value = '';

    }

});

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("mitabla");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

</script>
