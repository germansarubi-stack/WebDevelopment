<?php
include_once('config.php');
//clase conexion con la funcion para cionectarse a la base de datos mediante PDO
class Conexion{
    
    public static function Conectar(){
        
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try{
            $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);
            return $conexion;
        }catch (Exception $e){
            die("El error de Conexión es:". $e->getMessage());
        }
    }
}

//ejecucion de bloque de codigo cando es llamado por el script del html a travez de la funcion buscarID
//condicional que utliza el id para conectar a la base de datos si exite 
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    //consulta a la base de datos
    $consulta = "SELECT id, DNI, nombre, apellido, edad, email, telefono FROM personas WHERE id = :id";
    $resultado = $conexion->prepare($consulta);
    $resultado->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

    //condicional que devuelve los datos en formato JSON si $data no esta vacio
    if (!empty($data)){
        echo(json_encode($data));
        $conexion = null;
    }else{
        echo "Usuario inexistente";
    }
}else{
    echo "Error";
};

?>