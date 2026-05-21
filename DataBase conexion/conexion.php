<?php
include_once('config1.php');
    class conexion{
        public static function conexionBD(){
            

            //utilizamos try catch para que capture cualquier error y nos avise por pantalla
            try{
                $conex = new PDO ("mysql:host=$host;port=3306;dbname=$dbname",$usurname,$password);
                echo "Conexion a la Base de Datos correctamente establecida";
            }
            catch(PDOExeption $pex){
                die ("Conexion a la base de datos fallida".$pex->getMessage());
            }
            return $conex;

        }

        //cerramos conexion con la base de datos, no es del todo necesario puesto que se cierra automaticamente cuando se cierra la pagina
        public static function cerrarConexion(){
            $finConex = conexion::conexionBD().close();
            return $finconex;
        }
    
    }

    

?>