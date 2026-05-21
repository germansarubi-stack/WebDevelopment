<?php
// Recuperacion de la sesión a travez del cookie guardado
session_start([    
    'cookie_lifetime' => 86400,
    ]);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-primary d-flex p-1 justify-content-center ligna-items-center" style="--bs-bg-opacity: 0.4">

    <div class="container bg-white p-3  mt-1 border rounded-3"
    style="width: 50rem">

        <div class="row justify-content-center">            
            <div class="col-md-6">                
                <h1 class= "display-4 font-weight-bold">Formulario</h1>                          
                <?php                            
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {                
                        echo "<h2>Datos del formulario:</h2>";                
                        echo "<ul>";                            
                        $datos = [                    
                            'nombre' => 'Nombre:',                    
                            'contrasena' => 'Contraseña:',                    
                            'ciudad' => 'Ciudad:',                    
                            'pais' => 'País:',                    
                            'email' => 'Email:',                    
                            'telefono' => 'Teléfono:'                
                        ];    

                        // Bucle for para recorrer todos los campos del arreglo 
                        for ($i = 0; $i < count($datos); $i++) {                    
                            $dato = array_keys($datos)[$i];                    
                            $etiqueta = $datos[$dato];                                
                            echo "<li><strong>$etiqueta</strong> ";                    
                            echo isset($_POST[$dato]) ? htmlspecialchars($_POST[$dato]) : 'No ingresado';                                        
                            echo "</li>";                
                        }                            
                        echo "</ul>";  

                        // Muestra el nombre almacenado en la sesión si existe                
                        if (isset($_SESSION['nombre'])) {                    
                            echo "<strong>Nombre en la sesión:</strong> " . htmlspecialchars($_SESSION['nombre']) . "<br>";                
                            }            
                    }                            
                    ?>                    
                    
                    <form action="Formulario.php" method="post">                    
                        <div class="form-group">                         
                            <label for="nombre">Nombre:</label>                        
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($_SESSION['nombre']) ? htmlspecialchars($_SESSION['nombre']) : ''; ?>" required>                    
                        </div>  

                        <div class="form-group">                        
                            <label for="contrasena">Contraseña:</label>                        
                            <input type="password" class="form-control" id="contrasena" name="contrasena" required placeholder="Escribe una contraseña" aria-describedby="ejemcontra">
                            <div id="ejemcontra" class="form-text">
                            La contraseña debe tener minimo 8 caracteres entre signos y numeros
                            </div>                    
                        </div>   

                        <div class="form-group">                        
                            <label for="ciudad">Ciudad:</label>                        
                            <input type="text" class="form-control" id="ciudad" name="ciudad" required placeholder="Escribe tu ciudad" aria-describedby="ejemciudad">
                            <div id="ejemciudad" class="form-text">
                            Ej: Ushuaia
                            </div>                   
                        </div>  

                        <div class="form-group">                        
                            <label for="pais">País:</label>                        
                            <input type="text" class="form-control" id="pais" name="pais" required placeholder="Escribe tu pais" aria-describedby="ejempais">
                            <div id="ejempais" class="form-text">
                            Ej: Argentina
                            </div>
                        </div>   
                                         
                        <div class="form-group">                        
                            <label for="email">E-mail:</label>                        
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Escribe tu E-mail" aria-describedby="ejememail">
                            <div id="ejememail" class="form-text">
                            Ej: prueba@ejemplo.com
                            </div>                    
                        </div>   

                        <div class="form-group">                        
                            <label for="telefono">Teléfono:</label>                        
                            <input type="tel" class="form-control" id="telefono" name="telefono" required placeholder="Escribe tu telefono" aria-describedby="ejemtel">
                            <div id="ejemtel" class="form-text">
                            Ej: 2901663399 , con caracteristica y sin espacios
                            </div>                    
                        </div>                    
                        <button type="submit" class="btn btn-primary">Enviar</button>                
                    </form>            
            </div>        
        </div>    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    
</body>
</html>


