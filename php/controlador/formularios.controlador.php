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

        static public function ctrRegistroClienteAdmin(){
            if(isset($_POST['nombre'])){
                $tabla = "usuarios";
                $datos = array("nombre" => $_POST['nombre'],
                "apellido" => $_POST['apellido'],
                "telefono" => $_POST['telefono'],
                "email" => $_POST['email'],
                "password" => $_POST['password'],
                "rol" => $_POST['rol']);
                $respuesta = ModeloFormularios::mdlRegistroClienteAdmin($tabla,$datos);
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
                        $_SESSION["validarIngreso"] = $respuesta["nombre_usuario"];
                        $_SESSION["apellido"] = $respuesta["apellido_usuario"];
                        $_SESSION['id'] = $respuesta["id_usuario"];
                        $_SESSION['rol_fk'] = $respuesta["id_rol_fk"];

                        if($respuesta["id_rol_fk"] == 1){
                            echo '<script>
                                    if(window.history.replaceState){
                                        window.history.replaceState(null,null,window.location.href)
                                    }
                                    window.location = "../html/administrador/inicio.php";
                                </script>';
                        }else{
                            echo '<script>
                                if(window.history.replaceState){
                                    window.history.replaceState(null,null,window.location.href);
                                }
                                window.location = "../html/cliente/inicio.php";
                            </script>';
                        }
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

        /* ----------------------------------
            Select users
        ---------------------------------- */
        static public function ctrSelectUsers(){
            $tabla = "usuarios";
            $tabla2 = "roles";
            $respuesta = ModeloFormularios::mdlSelectUsers($tabla,$tabla2);
            
            if($respuesta){
                return $respuesta;
            }else{
                return "null";
            }
        }

        /* ----------------------------------
            Select roles
        ---------------------------------- */
        static public function ctrSelectRoles(){
            $tabla = "roles";
            $respuesta = ModeloFormularios::mdlSelectRoles($tabla);
            if($respuesta){
                return $respuesta;
            }else{
                return "null";
            }
        }

        /* ----------------------------------
            Delete user
        ---------------------------------- */
         public function ctrDeleteUser(){
            if(isset($_POST['deleteUser'])){
                $tabla = "usuarios";
                $valor = $_POST['deleteUser'];
                $respuesta = ModeloFormularios::mdlDeleteUser($tabla, $valor);
            }  
            
            if(isset($respuesta)){
                if($respuesta == "ok"){
                    echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location = "../../html/administrador/usuarios.php";
                    </script>;';
                }
            }
        }

        /* ----------------------------------
            Search user
        ---------------------------------- */
        static public function ctrSelectUserId($valor){
            if(isset($valor)){
                $tabla = "usuarios";
                $respuesta = ModeloFormularios::mdlSelectUserId($tabla, $valor);
                return $respuesta;
            }
        }

        /* ----------------------------------
            Update user
        ---------------------------------- */
        static public function ctrUpdateUser(){
            if(isset($_POST["actualizar"])){
                $valor = $_POST['nombre'];

                if($_POST['passwordNew'] != ""){
                    $password = $_POST['passwordNew'];
                }else{
                    $password = $_POST['passwordOld'];
                }
                $tabla = "usuarios";
                $data = array("id_usuario" => $_POST["id"],
                            "nombre_usuario" => $_POST["nombre"],
                            "apellido_usuario" => $_POST["lastName"],
                            "telefono_usuario" => $_POST["phone"],
                            "email_usuario" => $_POST["email"],
                            "password" => $password,
                            "rol_fk" => $_POST["rol"]);

                $respuesta = ModeloFormularios::mdlUpdateUser($tabla,$data);
                return $respuesta;
                
            }
        }


        /* ------------ MESAS ------------- */


        /* ----------------------------------
            Select mesas
        ---------------------------------- */
        static public function ctrSelectMesas(){
            $tabla = "mesas";
            $respuesta = ModeloFormularios::mdlSelectMesas($tabla);
            
            if($respuesta){
                return $respuesta;
            }else{
                return "null";
            }
        }

        /* ----------------------------------
            Registro mesas
        ---------------------------------- */

        static public function ctrRegistroMesasAdmin(){
            if(isset($_POST['numero'])){
                $tabla = "mesas";
                $datos = array("numero" => $_POST['numero'],
                "estado" => $_POST['estado'],
                "personas" => $_POST['personas']);
                $respuesta = ModeloFormularios::mdlRegistroMesasAdmin($tabla,$datos);
                return $respuesta;
            }
        }

        /* ----------------------------------
            Select mesas for id
        ---------------------------------- */
        static public function ctrSelectMesasId($valor){
            if(isset($valor)){
                $tabla = "mesas";
                $respuesta = ModeloFormularios::mdlSelectMesasId($tabla, $valor);
                return $respuesta;
            }
        }

        /* ----------------------------------
            Update mesas
        ---------------------------------- */
        static public function ctrUpdateMesas(){
            if(isset($_POST["actualizar"])){
                $tabla = "mesas";
                $data = array("id_mesa" => $_POST["id"],
                            "numero_mesa" => $_POST['numero'],
                            "personas_mesa" => $_POST['personas'],
                            "estado_mesa" => $_POST['estado']);
                
                $respuesta = ModeloFormularios::mdlUpdateMesas($tabla,$data);
                return $respuesta;
                
            }
        }

        /* ----------------------------------
            Delete mesa
        ---------------------------------- */
        public function ctrDeleteMesa(){
            if(isset($_POST['deleteMesa'])){
                $tabla = "mesas";
                $valor = $_POST['deleteMesa'];
                $respuesta = ModeloFormularios::mdlDeleteMesa($tabla, $valor);
            }  
            
            if(isset($respuesta)){
                if($respuesta == "ok"){
                    echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location = "../../html/administrador/mesas.php";
                    </script>;';
                }
            }
        }
    }

?>