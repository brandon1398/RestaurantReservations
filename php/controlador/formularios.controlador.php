<?php
    class ControladorFormularios{
        
        /* ----------------------------------
            Registro usuario - rol cliente
        ---------------------------------- */

        static public function ctrRegistroCliente(){
            if(isset($_POST['nombre'])){
                $tabla = "usuarios";
                $datos = array("nombre" => $_POST['nombre'],
                "apellido" => $_POST['apellido'],
                "telefono" => $_POST['telefono'],
                "email" => $_POST['email'],
                "password" => $_POST['password']);

                $respuesta = ModeloFormularios::mdlRegistroCliente($tabla,$datos);
                return $respuesta;
            }
        }
    }

?>