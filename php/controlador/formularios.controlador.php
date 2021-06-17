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

        /* ----------------------------------
            Login user
        ---------------------------------- */
        static public function ctrLoginUser(){
            if(isset($_POST['nombre'])){
                $tabla = "usuarios";
                $item = "nombre_usuario";
                $valor = $_POST["nombre"];
                $respuesta = ModeloFormularios::mdlLoginUser($tabla,$item,$valor);
                if(isset($respuesta["id_usuario"])){
                    if($respuesta["nombre_usuario"] == $_POST["nombre"] && $respuesta["password_usuario"] == $_POST["password"]){
                        $_SESSION["validarIngreso"] = "ok";
                        echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location="../html/cliente/inicio.php");
                            }
                        </script>';
                    }else{
                        echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null,null,window.location.href);
                            }
                        </script>';
                        echo '<div class="alert alert-danger" >USUARIO O CONTRASEÑA INCORRECTA</div>';
                    }
                }else{
                    echo '<div class="alert alert-danger">DATOS INCORRECTOS</div>';
                }
            }
        }
    }

?>