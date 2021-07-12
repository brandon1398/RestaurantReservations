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
            Select mesas libres
        ---------------------------------- */
        static public function ctrSelectMesasLibre(){
            $tabla = "mesas";
            $respuesta = ModeloFormularios::mdlSelectMesasLibre($tabla);
            
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

        

        /* ----------------------------------
            reservar mesa
        ---------------------------------- */
        static public function ctrReservaMesa(){
            if(isset($_POST['fecha'])){
                $tabla = "reseva";
                $datos = array("fecha" => $_POST['fecha'],
                "hora" => $_POST['hora'],
                "mesa" => $_POST['mesa']);
                
                $respuesta = ModeloFormularios::mdlReservaMesa($tabla,$datos);
                return $respuesta;
            }
        }

        /* ----------------------------------
            reservar mesa admin
        ---------------------------------- */
        static public function ctrReservaMesaAdmin(){
            if(isset($_POST['fecha'])){
                $tabla = "reseva";
                $datos = array("cliente" => $_POST['cliente'],
                "fecha" => $_POST['fecha'],
                "hora" => $_POST['hora'],
                "mesa" => $_POST['mesa']);
                
                $respuesta = ModeloFormularios::mdlReservaMesaAdmin($tabla,$datos);
                if(isset($respuesta)){
                    if($respuesta == "ok"){
                        echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            setTimeout(function(){
                                <div class="alert alert-success">Mesa reservada exitosamante!</div>;
                            },3000);
                            window.location = "../../html/administrador/reservaciones.php";
                        </script>;';
                    }
                }
                return $respuesta;
            }
        }

        /* ----------------------------------
            select reservas id
        ---------------------------------- */

        static public function ctrSelectReservasId(){
            if(isset($_SESSION['id'])){
                $tabla = "reserva";
                $respuesta = ModeloFormularios::mdlSelectReservasId($tabla,$_SESSION['id']);
                return $respuesta;
            }
        }

        static public function ctrSelectReservas(){
            if(isset($_SESSION['id'])){
                $tabla = "reserva";
                $respuesta = ModeloFormularios::mdlSelectReservas($tabla);
                return $respuesta;
            }
        }

        /* ----------------------------------
            delete reserva
        ---------------------------------- */

        public function ctrDeleteReserva(){
            if(isset($_POST['deleteReserva'])){
                $tabla = "reserva";
                $valor = $_POST['deleteReserva'];
                $mesa = $_POST['idMesa'];
                $respuesta = ModeloFormularios::mdlDeleteReserva($tabla,$valor,$mesa);

                if($respuesta=="ok"){
                    echo "<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location = '../../html/administrador/reservaciones.php'
                    </script>";
                }else{
                    echo "error";
                }
            }
        }
        public function ctrDeleteReservaClient(){
            if(isset($_POST['deleteReserva'])){
                $tabla = "reserva";
                $valor = $_POST['deleteReserva'];
                $mesa = $_POST['idMesa'];
                $respuesta = ModeloFormularios::mdlDeleteReserva($tabla,$valor,$mesa);

                if($respuesta=="ok"){
                    echo "<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location = '../../html/cliente/reservaciones.php'
                    </script>";
                }else{
                    echo "error";
                }
            }
        }

        /* ----------------------------------
            select PLATOS
        ---------------------------------- */
        static public function ctrSelectPlatos(){
            if(isset($_POST['btn_carnes'])){
                $tabla = "platos";
                $valor = "Carnes";
                $respuesta = ModeloFormularios::mdlSelectPlatos($tabla,$valor);
                if(isset($respuesta) && !empty($respuesta)){
                    echo "<script>
                        window.location = '../../html/cliente/menu.php#productos'
                    </script>";

                    return $respuesta;
                }
            }
            else if(isset($_POST['btn_bebidas'])){
                $tabla = "platos";
                $valor = "Bebidas";
                $respuesta = ModeloFormularios::mdlSelectPlatos($tabla,$valor);
                if(isset($respuesta) && !empty($respuesta)){
                    echo "<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null,null,window.location.href);
                        }
                        window.location = '../../html/cliente/menu.php#productos'
                    </script>";
                    return $respuesta;
                }
            }
        }

        /* ----------------------------------
            select all reservation
        ---------------------------------- */

        static public function ctrSelectAllReservation(){
            $tabla = "reserva";
            $respuesta = ModeloFormularios::mdlSelectAllReservation($tabla);
            if(isset($respuesta) && !empty($respuesta)){
                /* echo "<script>
                    window.location = '../../html/administrador/reservaciones.php'
                </script>"; */
                return $respuesta;
            }
        } 

        /* ----------------------------------
            select id reservation
        ---------------------------------- */

        static public function ctrDeleteReservationAdmin(){
            $tabla = "reserva";
            if(isset($_POST['idMesa']) && !empty($_POST['idMesa']) && isset($_POST['deleteReserva']) && !empty($_POST['deleteReserva'])){
                $idMesa = $_POST['idMesa'];
                $idReserva = $_POST['deleteReserva'];
                $respuesta = ModeloFormularios::mdlDeleteReserva($tabla,$idReserva,$idMesa);
                if($respuesta=="ok"){
                    echo "<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location = '../../html/administrador/reservaciones.php'
                    </script>";
                }else{
                    echo "error";
                }
            }
        } 

         /* ----------------------------------
            select CATEGORIAS
        ---------------------------------- */
        static public function ctrSelectCategorias(){
            $tabla = "categoria";
            $respuesta = ModeloFormularios::mdlSelectCategorias($tabla);
            if(!empty($respuesta)){
                return $respuesta;
            }
        }


        /* ----------------- CATEGORIAS ------------------- */

        /* ----------------------------------
            insert CATEGORIAS
        ---------------------------------- */
        static public function ctrInsertCategoria(){
            if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
                $tabla = "categoria";
                $nombre = $_POST['nombre'];
                $respuesta = ModeloFormularios::mdlInsertCategoria($tabla,$nombre);
                return $respuesta;
            }   
        }

        /* ----------------------------------
            delete CATEGORIAS
        ---------------------------------- */

        public function ctrDeleteCategoria(){
            if(isset($_POST['deleteCategoria']) && !empty($_POST['deleteCategoria'])){
                $tabla = "categoria";
                $idCategoria = $_POST['deleteCategoria'];
                $respuesta = ModeloFormularios::mdlDeleteCategoria($tabla,$idCategoria);
                if($respuesta=="ok"){
                    echo "<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null,null,window.location.href);
                        }
                        window.location = '../../html/administrador/categorias.php'
                    </script>";
                }
            }
        }

        /* ----------------------------------
            select categoria id
        ---------------------------------- */
        static public function ctrSelectCategoriasID($valor){
            if(!empty($valor)){
                $respuesta = ModeloFormularios::mdlSelectCategoriasID($valor);
                return $respuesta;
            }
        }

        /* ----------------------------------
            update categoria
        ---------------------------------- */
        static public function ctrUpdateCategoria(){
            if(isset($_POST['id']) && isset($_POST['nombre'])){
                $tabla = "categoria";
                $data = array("id_categoria" => $_POST['id'],
                "nombre_categoria" => $_POST['nombre']);
                $respuesta = ModeloFormularios::mdlUpdateCategoria($tabla,$data);
                return $respuesta;
            }
        }
    }

?>