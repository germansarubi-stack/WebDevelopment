<?php
// Función que valida que el campo "nombre" solo contiene letras
    function validarNombre($nombre) {    
        return preg_match('/^[a-zA-Z]+$/u', $nombre);}
        $mensajeError = ''; //Variable para almacenar el mensaje de error

// Establece el valor de 'nombre' en la sesión si se envía desde el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'])){    
        $nombre = $_POST['nombre'];   

// Validar que el nombre solo contiene letras    
    if (validarNombre($nombre)) {        
// Inicia la sesión o la recupera si ya está iniciada        
    session_start([
        'cookie_lifetime' => 86400,        
    ]);        
    $_SESSION['nombre'] = $nombre;        
        // Redirige a Formulario.php        
        header('Location: Formulario.php');        
        exit();    
        } else {        
            $mensajeError = "El nombre debe contener solo letras.";    
        }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
         .error-message {            
            color: red; /* Cambia el color del mensaje de error a rojo */            
            font-size: 1.2em; /* Cambia el tamano de las letras del mensaje */                        
            font-weight: bold; /* Setea las letras del mensaje a bold*/        
        }
    </style>
</head>
<body class="bg-primary d-flex p-5 justify-content-center ligna-items-center" style="--bs-bg-opacity: 0.4">

    <div class="bg-white p-4  mt-1 border rounded-3"
    style="width: 50rem">

    <div class="text-center">        
        <h1 class="display-4 font-weight-bold">Inicio de sesion</h1>    
    </div>    

    <div class="container mt-4">        
        <div class="row justify-content-center">            
            <div class="col-6">                               
                <form class= "row g-3" action="input.php" method="post">                    
                    <div class="form-group">                        
                        <label for="nombre" class="fw-semibold">
                        Escribe tu nombre:
                        </label>  
                        <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre" aria-describedby="ejemnombre">
                            <div id="ejemnombre" class="form-text">
                            Ej: Pablo
                            </div>              
                    </div>                    
                    <button type="submit" class="btn btn-primary">ENVIAR</button>                
                </form>                
                <p class="error-message"><?php echo $mensajeError; ?></p>            
            </div>        
        </div>    
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>