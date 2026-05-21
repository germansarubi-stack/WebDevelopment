<?php
    include_once("./conexion.php");

    class Clientes{

        //funcion que ejecuta un select en la base de datos para traer todo lo que contiene
        public static function listarClientes(){
            $query = conexion::conexionBD()->prepare("select * from clientes");
            $query->execute();
            $data = $query->fetchALL();
            return $data;
        }

        //funcion insertar cliente
        public static function insertarCliente(){
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $email = $_POST["email"];
            $telefono = $_POST["telefono"];
            $direccion = $_POST["direccion"];
            
            $query = conexion::conexionBD()->prepare("INSERT INTO clientes(nombre,apellido,email,telefono,direccion) VALUES(?,?,?,?,?)");
            $query -> bindParam(1, $nombre, PDO::PARAM_STR);
            $query -> bindParam(2, $apellido, PDO::PARAM_STR);
            $query -> bindParam(3, $email, PDO::PARAM_STR);
            $query -> bindParam(4, $telefono, PDO::PARAM_STR);
            $query -> bindParam(5, $direccion, PDO::PARAM_STR);

            //si se ejecuta que recargue la pagina para mostrar resultados o no
            if($query->execute()){
                header("location: ./index.php");
            }else{ 
                header("location: ./index.php");
            }
        }

        //funcion actualizar cliente
        public static function actualizarCliente(){
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $email = $_POST["email"];
            $telefono = $_POST["telefono"];
            $direccion = $_POST["direccion"];
            
            $query = conexion::conexionBD()->prepare("UPDATE clientes SET clientes.nombre =?, clientes.apellido =?, clientes.email =?, clientes.telefono =?, clientes.direccion =? WHERE clientes.clinete_ID =?;");
            $query -> bindParam(1, $nombre, PDO::PARAM_STR);
            $query -> bindParam(2, $apellido, PDO::PARAM_STR);
            $query -> bindParam(3, $email, PDO::PARAM_STR);
            $query -> bindParam(4, $telefono, PDO::PARAM_STR);
            $query -> bindParam(5, $direccion, PDO::PARAM_STR);
            $query -> bindParam(6, $id, PDO::PARAM_INT);

            //si se ejecuta que recargue la pagina para mostrar resultados o no
            if($query->execute()){
                header("location: ./index.php");
            }else{ 
                header("location: ./index.php");
            }
        }

        //funcion eliminar cliente
        public static function eliminarCliente(){
            $id = $_POST["id"];
          
            $query = conexion::conexionBD()->prepare("DELETE FROM clientes WHERE clientes.clinete_ID =?;");
            $query -> bindParam(1, $id, PDO::PARAM_INT);

            //si se ejecuta que recargue la pagina para mostrar resultados o no
            if($query->execute()){
                header("location: ./index.php");
            }else{ 
                header("location: ./index.php");
            }
        }

    }

    //en caso de interactuar con los botones del formulario, ejecuta la funcion correspondiente
    if(array_key_exists("insertar", $_POST)){
        Clientes::insertarCliente();
    }

    if(array_key_exists("actualizar", $_POST)){
        Clientes::actualizarCliente();
    }

    if(array_key_exists("eliminar", $_POST)){
        Clientes::eliminarCliente();
    }
?>