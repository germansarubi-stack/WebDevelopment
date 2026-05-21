<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
</head>
<body class="bg-primary d-flex justify-content-center ligna-items-center" style="--bs-bg-opacity: 0.2">


    <!--Titulo y recuadro-->
    <div class="bg-white p-4  mt-1 border rounded-3" style="width: 70rem;">
        <p class="text-center fst-italic fs-1">
            REGISTRO DE CLIENTES
        </p>

        <!--todos los input label del formulario y sus respectivos botones-->
        <div class="container">
            <form class="row g-3" action="./CClientes.php" method="POST">
                <div class="col-6">
                  <label for="id" class="fw-semibold">
                    Cliente ID:
                  </label>  
                  <input type="text" class="form-control" id="id" name="id" readonly="readonly">
                </div>

                <div class="col-6">
                    <label for="nombre" class="fw-semibold">
                      Nombre/s:
                    </label>  
                    <input type="text" class="form-control" id="nombre" name="nombre" priority>
                  </div>

                  <div class="col-6">
                    <label for="apellido" class="fw-semibold">
                      Apellido/s:
                    </label>  
                    <input type="text" class="form-control" id="apellido" name="apellido" priority>
                  </div>
                
                  <div class="col-12">
                    <label for="email" class="fw-semibold">
                      Email:
                    </label>  
                    <input type="email" class="form-control" id="email" name="email" priority>
                  </div>  

                  <div class="col-6">
                    <label for="telefono" class="fw-semibold">
                      Telefono:
                    </label>  
                    <input type="telefono" class="form-control" id="telefono" name="telefono">
                  </div>

                  <div class="col-12">
                    <label for="direccion" class="fw-semibold">
                      Direccion:
                    </label>  
                    <input type="text" class="form-control" id="direccion" name="direccion">
                  </div>

                  <div class="col-6">
                    <label for="fechaAlta" class="fw-semibold">
                      Fecha de alta:
                    </label>  
                    <input type="txt" class="form-control" id="fechaAlta" name="fechaAlta" readonly="readonly">
                  </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="insertar" id="insertar">
                        INSERTAR 
                    </button>
                    <button type="submit" class="btn btn-primary" name="actualizar" id="actualizar">
                        ACTUALIZAR 
                    </button>
                    <button type="submit" class="btn btn-primary" name="eliminar" id="eliminar">
                        ELIMINAR 
                    </button>
                </div>
            </form> <br>
        </div>


        <!--Tabla con los datos de la Base de Datos e interacciones con la misma-->
        <p class="text-center fst-italic fs-1">
            Lista de Clientes
        </p>
        <div>
            <table class="table" id="tab">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre/s</th>
                    <th scope="col">Apellido/s</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Fecha de alta</th>
                    <th scope="col">Accion</th>
                </tr>
                <tbody>

                <!--codigo PHP que provoca un select y trae los datos de todas las filas de la Base de Datos-->
                    <?php
                    include_once("./CClientes.php");
                    $lista = Clientes::listarClientes();
                    foreach($lista as $fila){
                        echo "<tr>";
                        echo "<td>".$fila["clinete_ID"]."</td>";
                        echo "<td>".$fila["nombre"]."</td>";
                        echo "<td>".$fila["apellido"]."</td>";
                        echo "<td>".$fila["email"]."</td>";
                        echo "<td>".$fila["telefono"]."</td>";
                        echo "<td>".$fila["direccion"]."</td>";
                        echo "<td>".$fila["fecha_alta"]."</td>";
                        echo "<td>"."<input type=\"submit\" value=\"Seleccionar\" onClick=\"Seleccionar()\">"."</td>";
                        
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>

    <!--script de la funcion seleccionar, al clikearlo lleva los datos al formulario para actualizar algun parametro-->
<script>
    function Seleccionar(){
        var table = document.getElementById("tab");
        for(var i=1;i<table.rows.length;i++){
            table.rows[i].onclick = function(){
                document.getElementById("id").value= this.cells[0].innerHTML;
                document.getElementById("nombre").value= this.cells[1].innerHTML;
                document.getElementById("apellido").value= this.cells[2].innerHTML;
                document.getElementById("email").value= this.cells[3].innerHTML;
                document.getElementById("telefono").value= this.cells[4].innerHTML;
                document.getElementById("direccion").value= this.cells[5].innerHTML;
                document.getElementById("fechaAlta").value= this.cells[6].innerHTML;
            };
        }
    }
</script>
    
</body>
</html>



