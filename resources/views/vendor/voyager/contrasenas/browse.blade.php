<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Generador</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
        <link rel="icon" href="copiar.png">
        <style>
            body {
    background-color:#f9f9f9;
}
.badge {
    font-size: 25px;
}
#estilo {
    width: 50rem;
    height: 5rem;
    margin: 20px 80px 50px 357px;
}
#imagenlogo {
    align-items: center;
    align-content: center;
    justify-items: center;
    justify-content: center;

}
#cuadro {
    background-color: #015052;
    color: aliceblue;
    height: 500px;
    width: 800px;
    margin:-30px 20px 50px 20px;
}
#boton {
    background-color: #0d6efd;
    width: 100%;
    height: 40px;
    border-radius: 0.25rem;
    line-height: 1.5;
    color: aliceblue;
}
#boton1 {
    background-color: #a5aec0;
    width: 15%;
    height: 40px;
    border-radius: 0.25rem;
    line-height: 1.5;
    color: rgb(15, 15, 1);
    float: right;
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
    height:auto;
    float: right;
    margin: 20px 20px 20px 20px;
    }
    .button:hover {
    background-color: #d7681e;
    color: #fff;
    }
        </style>
    </head>
    <body>
        <a class="button" href="{{ route('voyager.alumnos.index') }}">←Regresar atras</a>
        <div id="imagenlogo">
            <img id="estilo"src="https://telegra.ph/file/1a5576e0b68bbde6e6096.png" >
        </div>

        <div class="container my-4">


            <div class="row justify-content-md-center">
                <div id="cuadro" >
                    <div class="my-3">
                        <h3 class="text-center">Generador de Contraseñas</h3>
                    </div>
                    <div class="mb-3">
                        <label for="inputLength" class="form-label">Longitud</label>
                        <input type="number" id="inputLength" class="form-control text-center" min="1" max="50" value="12" />
                    </div>
                    <div class="form-check my-3">
                        <input type="checkbox" id="checkbox1" class="form-check-input" />
                        <label class="form-check-label" for="checkbox1">Incluir Números</label>
                    </div>
                    <div class="form-check my-3">
                        <input type="checkbox" id="checkbox2" class="form-check-input" />
                        <label class="form-check-label" for="checkbox2">Incluir Símbolos</label>
                    </div>
                    <div class="d-grid gap-2 my-3">
                        <button class="btn btn-primary" id="btnGenerate">Generar Contraseña</button>
                    </div>
                    <div >
                        <button id="boton1" onclick="copiarAlPortapapeles('generatedPassword') "><img src="https://telegra.ph/file/223bd339d214116f0dab8.png" height ="30" width="30" /> Copiar</button>

                    </div>

                    <br/><br/>


                    <hr />
                    <div class="d-grid gap-2 py-3">
                        <span id="generatedPassword" class="badge bg-success"></span>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function copiarAlPortapapeles(id_elemento) {
            var aux = document.createElement("input");
            aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
            document.body.appendChild(aux);
            aux.select();
            document.execCommand("copy");
            document.body.removeChild(aux);
            alert("Copiado a Portapapeles")
            }

            const generatePassword = (base, length) => {
    let password = "";
    for (let x = 0; x < length; x++) {
        let random = Math.floor(Math.random() * base.length);
        password += base.charAt(random);
    }
    return password;
};

const generate = () => {
    let length = parseInt(inputLength.value);

    let base = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const numbers = "0123456789";
    const symbols = ".?,;-_¡!¿*%&$/()[]{}|@><";

    if (checkbox1.checked) base += numbers;

    if (checkbox2.checked) base += symbols;

    generatedPassword.innerText = generatePassword(base, length);
};

window.addEventListener("DOMContentLoaded", () => {
    btnGenerate.addEventListener("click", () => {
        generate();
    });
});
        </script>
        <script src="main.js"></script>
    </body>
</html>

