<?php
    
    class ModeloFormularios{

        /* ----------------------------------
            Register user - rol client
        ---------------------------------- */
        static public function mdlRegistroCliente($tabla, $datos){
            require_once "../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(nombre_usuario, apellido_usuario, telefono_usuario,email_usuario,password_usuario,status_usuario,id_rol_fk) 
            VALUES (:nombre, :apellido, :telefono,:email,:password,'1','2')");

            $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":apellido",$datos["apellido"],PDO::PARAM_STR);
            $stmt->bindParam(":telefono",$datos["telefono"],PDO::PARAM_STR);
            $stmt->bindParam(":email",$datos["email"],PDO::PARAM_STR);
            $stmt->bindParam(":password",$datos["password"],PDO::PARAM_STR);

            if($stmt->execute()){
                return 'ok';
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt->close();
            $stmt = null;
        }
        static public function mdlRegistroClienteAdmin($tabla, $datos){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(nombre_usuario, apellido_usuario, telefono_usuario,email_usuario,password_usuario,status_usuario,id_rol_fk) 
            VALUES (:nombre, :apellido, :telefono,:email,:password,'1',:rol)");

            $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":apellido",$datos["apellido"],PDO::PARAM_STR);
            $stmt->bindParam(":telefono",$datos["telefono"],PDO::PARAM_STR);
            $stmt->bindParam(":email",$datos["email"],PDO::PARAM_STR);
            $stmt->bindParam(":password",$datos["password"],PDO::PARAM_STR);
            $stmt->bindParam(":rol",$datos['rol'],PDO::PARAM_STR);

            if($stmt->execute()){
                return 'ok';
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt->close();
            $stmt = null;
        }

        

        /* ----------------------------------
            Login user
        ---------------------------------- */
        static public function mdlLoginUser($tabla, $item, $valor){
            require_once "../php/modelos/conexion.php";           
            if($item == null && $valor == null){
                $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla ORDER BY id_usuario DESC");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }else{

                $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id_usuario DESC");
                $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetch();
            }

            $stmt->close();
            $stmt = null;
        }

        /* ----------------------------------
            Select users
        ---------------------------------- */

        static public function mdlSelectUsers($tabla,$tabla2){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla INNER JOIN $tabla2 ON id_rol_fk=id_rol and status_usuario = 1 ORDER BY id_usuario");
            $stmt -> execute();
            $num = $stmt->rowCount();
            if($num > 0){
                return $stmt -> fetchAll();
            }else{
                return null;
            }
        }

        /* ----------------------------------
            Select roles
        ---------------------------------- */

        static public function mdlSelectRoles($tabla){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            $num = $stmt->rowCount();
            if($num > 0){
                return $stmt -> fetchAll();
            }else{
                return null;
            }
        }

        /* ----------------------------------
            Delete user
        ---------------------------------- */

        static public function mdlDeleteUser($tabla,$valor){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id_usuario=:id");
            $stmt -> bindParam(":id",$valor,PDO::PARAM_INT);
            if($stmt->execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt->close();
            $stmt=null;
        }

        /* ----------------------------------
            Search user for id
        ---------------------------------- */
        static public function mdlSelectUserId($tabla, $valor){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE id_usuario=:id");
            $stmt -> bindParam(":id",$valor,PDO::PARAM_INT);
            if($stmt->execute()){
                return $stmt -> fetch();
            }else{
                return null;
            }
        }

        /* ----------------------------------
            update user
        ---------------------------------- */
        static public function mdlUpdateUser($tabla,$data){
            require_once("../../php/modelos/conexion.php");
            $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET nombre_usuario=:nombre, apellido_usuario=:apellido, telefono_usuario=:telefono, email_usuario=:email, password_usuario=:password_u, id_rol_fk=:rol_fk WHERE id_usuario=:id") ;
            $stmt -> bindParam(":nombre",$data["nombre_usuario"],PDO::PARAM_STR);
            $stmt -> bindParam(":apellido",$data["apellido_usuario"],PDO::PARAM_STR);
            $stmt -> bindParam(":telefono",$data["telefono_usuario"],PDO::PARAM_STR);
            $stmt -> bindParam(":email",$data["email_usuario"],PDO::PARAM_STR);
            $stmt -> bindParam(":password_u",$data["password"],PDO::PARAM_STR);
            $stmt -> bindParam(":rol_fk",$data["rol_fk"],PDO::PARAM_INT);
            $stmt -> bindParam(":id",$data["id_usuario"],PDO::PARAM_INT);
            
            if($stmt -> execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar->errorInfo());
                return "null";
            }
        }



        /* ------------ MESAS ------------- */


        
        /* ----------------------------------
            Select mesas
        ---------------------------------- */

        static public function mdlSelectMesas($tabla){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla ORDER BY numero_mesa");
            $stmt -> execute();
            $num = $stmt->rowCount();
            if($num > 0){
                return $stmt -> fetchAll();
            }else{
                return null;
            }
        }

        /* ----------------------------------
            Select mesas libres
        ---------------------------------- */

        static public function mdlSelectMesasLibre($tabla){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE estado_mesa='Libre' ORDER BY numero_mesa");
            $stmt -> execute();
            $num = $stmt->rowCount();
            if($num > 0){
                return $stmt -> fetchAll();
            }else{
                return null;
            }
        }

        /* ----------------------------------
            Registro mesas
        ---------------------------------- */

        static public function mdlRegistroMesasAdmin($tabla, $datos){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(numero_mesa, personas_mesa, estado_mesa) 
            VALUES (:numero, :personas, :estado)");
            /* $status = $datos["estado"];
            if($status == "false" /* libre ){
                $band = false;
            }else{
                $band = true;
            } */
            $stmt->bindParam(":numero",$datos["numero"],PDO::PARAM_INT);
            $stmt->bindParam(":personas",$datos["personas"],PDO::PARAM_INT);
            $stmt->bindParam(":estado",$datos["estado"],PDO::PARAM_STR);

            if($stmt->execute()){
                return 'ok';
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt->close();
            $stmt = null;
        }

        /* ----------------------------------
            Search mesas for id
        ---------------------------------- */
        static public function mdlSelectMesasId($tabla, $valor){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE id_mesa=:id");
            $stmt -> bindParam(":id",$valor,PDO::PARAM_INT);
            if($stmt->execute()){
                return $stmt -> fetch();
            }else{
                return null;
            }
        }

        /* ----------------------------------
            update user
        ---------------------------------- */
        static public function mdlUpdateMesas($tabla,$data){
            require_once("../../php/modelos/conexion.php");               
            $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET numero_mesa=:numero, personas_mesa=:personas, estado_mesa=:estado WHERE id_mesa=:id") ;
        
            $stmt -> bindParam(":numero",$data["numero_mesa"],PDO::PARAM_INT);
            $stmt -> bindParam(":personas",$data["personas_mesa"],PDO::PARAM_INT);
            $stmt -> bindParam(":estado",$data["estado_mesa"],PDO::PARAM_STR);
            $stmt -> bindParam(":id",$data["id_mesa"],PDO::PARAM_INT);
            
            if($stmt -> execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar->errorInfo());
                return "null";
            }
        }

        /* ----------------------------------
            Delete mesa
        ---------------------------------- */

        static public function mdlDeleteMesa($tabla,$valor){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id_mesa=:id");
            $stmt -> bindParam(":id",$valor,PDO::PARAM_INT);
            if($stmt->execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt->close();
            $stmt=null;
        }

        /* ----------------------------------
            Reserva mesa
        ---------------------------------- */

        static public function mdlReservaMesa($tabla,$datos){
            require_once "../../php/modelos/conexion.php";
            $usuario = $_SESSION['id'];
            $mesa = $datos['mesa'];
            $fecha = $datos['fecha'];
            $hora = $datos['hora'];

            $stmt = Conexion::conectar() -> prepare("SELECT * FROM reserva WHERE fecha_reserva=:fecha and hora_reserva=:hora
            and fk_id_mesa=:mesa");

            $stmt->bindParam(":fecha",$fecha,PDO::PARAM_STR);
            $stmt->bindParam(":hora",$hora,PDO::PARAM_STR);
            $stmt->bindParam(":mesa",$mesa,PDO::PARAM_INT);

            if($stmt->execute()){
                $num = $stmt->rowCount();
                if($num > 0){
                    echo '<div class="alert alert-danger">Error, esta mesa ya se encuentra reservada esa fecha y hora!</div>';
                }else{
                    $stmt = Conexion::conectar() -> prepare("INSERT INTO reserva(fecha_reserva, hora_reserva, fk_id_usuario,fk_id_mesa)
                    VALUES (:fecha,:hora,:id_usuario,:id_mesa)");
                    $stmt->bindParam(":fecha",$datos["fecha"],PDO::PARAM_STR);
                    $stmt->bindParam(":hora",$datos["hora"],PDO::PARAM_STR);
                    $stmt->bindParam(":id_usuario",$usuario,PDO::PARAM_INT);
                    $stmt->bindParam(":id_mesa",$datos["mesa"],PDO::PARAM_INT);

                    if($stmt->execute()){

                        $sql = Conexion::conectar() -> prepare("UPDATE mesas SET estado_mesa='Ocupada' WHERE id_mesa = :id");
                        $sql -> bindParam(":id",$mesa,PDO::PARAM_INT);

                        if($sql -> execute()){
                            echo '<script>
                            setTimeout(function(){
                                <div class="alert alert-success">Mesa reservada exitosamante!</div>;
                                },1500);
                            </script>';
                            return 'ok';
                        }                       
                        
                    }else{
                        print_r(Conexion::conectar()->errorInfo());
                    }
                     
                    $stmt->close();
                    $stmt=null;                    
                }
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }           
        } 

        /* ----------------------------------
            Reserva mesa admin
        ---------------------------------- */

        static public function mdlReservaMesaAdmin($tabla,$datos){
            require_once "../../php/modelos/conexion.php";
            $usuarioNombre = $datos['cliente'];
            $mesa = $datos['mesa'];
            $fecha = $datos['fecha'];
            $hora = $datos['hora'];

            $stmt = Conexion::conectar() -> prepare("SELECT * FROM reserva WHERE fecha_reserva=:fecha and hora_reserva=:hora
            and fk_id_mesa=:mesa");

            $stmt->bindParam(":fecha",$fecha,PDO::PARAM_STR);
            $stmt->bindParam(":hora",$hora,PDO::PARAM_STR);
            $stmt->bindParam(":mesa",$mesa,PDO::PARAM_INT);

            if($stmt->execute()){
                $num = $stmt->rowCount();
                if($num > 0){
                    echo "<script>alert('Error, esta mesa ya se encuentra reservada esa fecha y hora!')</script>";
                    echo '<div class="alert alert-danger">Error, esta mesa ya se encuentra reservada esa fecha y hora!</div>';
                }else{
                    $stmtClient = Conexion::conectar() -> prepare("SELECT * FROM usuarios WHERE nombre_usuario=:usuario");
                    $stmtClient -> bindParam(":usuario",$usuarioNombre,PDO::PARAM_STR);

                    if($stmtClient->execute()){
                        $numClient = $stmtClient -> rowCount();
                        if($numClient > 0){
                            $resClient = $stmtClient -> fetchAll();
                            foreach($resClient as $client){
                                $r_client = $client['id_usuario'];
                            }
                            $stmt = Conexion::conectar() -> prepare("INSERT INTO reserva(fecha_reserva, hora_reserva, fk_id_usuario,fk_id_mesa)
                            VALUES (:fecha,:hora,:id_usuario,:id_mesa)");
                            $stmt->bindParam(":fecha",$datos["fecha"],PDO::PARAM_STR);
                            $stmt->bindParam(":hora",$datos["hora"],PDO::PARAM_STR);
                            $stmt->bindParam(":id_usuario",$r_client,PDO::PARAM_INT);
                            $stmt->bindParam(":id_mesa",$datos["mesa"],PDO::PARAM_INT);

                            if($stmt->execute()){

                                $sql = Conexion::conectar() -> prepare("UPDATE mesas SET estado_mesa='Ocupada' WHERE id_mesa = :id");
                                $sql -> bindParam(":id",$mesa,PDO::PARAM_INT);

                                if($sql -> execute()){
                                    echo "<script>alert('Mesa reservada exitosamente!')</script>";
                                    return 'ok';
                                }   
                            }else{
                                print_r(Conexion::conectar()->errorInfo());
                            }
                            $stmt->close();
                            $stmt=null;  
                        }else{
                            echo "<script>alert('No existe el usuario!')</script>";
                            echo "<div class='alert alert-danger'>No existe el usuario!</div>";
                        }
                    }               
                }
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
        }
        
        /* ----------------------------------
            Select users
        ---------------------------------- */


        static public function mdlSelectReservasId($tabla,$datos){
            require_once "../../php/modelos/conexion.php";
            $usuario = $_SESSION['id'];
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM `mesas` INNER JOIN reserva INNER JOIN usuarios WHERE fk_id_usuario = id_usuario and fk_id_usuario=$usuario and id_mesa = fk_id_mesa");
            /* $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla INNER JOIN mesas ON fk_id_mesa = id_mesa and fk_id_usuario = $usuario"); */
            if($stmt->execute()){
                return $stmt -> fetchAll();
            }else{
                return null;
            }
        }

        static public function mdlSelectReservas($tabla){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM `mesas` INNER JOIN reserva INNER JOIN usuarios ON id_usuario = fk_id_usuario and id_mesa=fk_id_mesa");
            if($stmt->execute()){
                return $stmt -> fetchAll();
            }else{
                return null;
            }
        }

        static public function mdlDeleteReserva($tabla, $valor,$mesa){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id_reserva=:valor");
            $stmt -> bindParam(":valor",$valor,PDO::PARAM_INT);
            
            if($stmt->execute()){
                $sql = Conexion::conectar() -> prepare("UPDATE mesas SET estado_mesa='Libre' WHERE id_mesa=:mesa");
                $sql -> bindParam(":mesa",$mesa,PDO::PARAM_INT);
                if($sql->execute()){
                    return "ok";
                }else{
                    return null;
                }
            }
        }

        /* ----------------------------------
            select PLATOS
        ---------------------------------- */
        static public function mdlSelectPlatos($tabla,$valor){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla INNER JOIN categoria ON nombre_categoria=:valor and `categoria`.`id_categoria`=`platos`.`fk_id_categoria`");
            $stmt -> bindParam(":valor",$valor,PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt -> fetchAll();
            }
        }

        /* ----------------------------------
            select all reservation
        ---------------------------------- */

        static public function mdlSelectAllReservation($tabla){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla INNER JOIN usuarios INNER JOIN mesas ON id_usuario=fk_id_usuario and id_mesa = fk_id_mesa");
            if($stmt->execute()){
                return $stmt -> fetchAll();
            }
        }

        /* ----------------------------------
            select CATEGORIAS
        ---------------------------------- */

        static public function mdlSelectCategorias($tabla){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla");
            if($stmt -> execute()){
                return $stmt -> fetchAll();
            }
        }

        /* ----------------------------------
            insert CATEGORIAS
        ---------------------------------- */

        static public function mdlInsertCategoria($tabla,$nombre){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(nombre_categoria) VALUES (:nombre);");
            $stmt->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            if($stmt -> execute()){
                return "ok";
            }
        }

        /* ----------------------------------
            delete CATEGORIAS
        ---------------------------------- */
        static public function mdlDeleteCategoria($tabla,$id){
            require_once "../../php/modelos/conexion.php";
            $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id_categoria=:id");
            $stmt -> bindParam(":id",$id,PDO::PARAM_INT);
            if($stmt->execute()){
                return "ok";
            }else{
                return "null";
            }
        }

        /* ----------------------------------
            select CATEGORIAS ID
        ---------------------------------- */
        static public function mdlSelectCategoriasID($valor){
            require_once '../../php/modelos/conexion.php';
            $stmt = Conexion::conectar() -> prepare ("SELECT * FROM categoria WHERE id_categoria = :valor;");
            $stmt -> bindParam(":valor",$valor,PDO::PARAM_INT);
            if($stmt->execute()){
                return $stmt -> fetch();
            }
        }

        /* ----------------------------------
            update categoria
        ---------------------------------- */

        static public function mdlUpdateCategoria($tabla,$data){
            require_once '../../php/modelos/conexion.php';
            $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET nombre_categoria=:nombre WHERE id_categoria=:id;");
            $stmt -> bindParam(":nombre",$data['nombre_categoria'],PDO::PARAM_STR);
            $stmt -> bindParam(":id",$data['id_categoria'],PDO::PARAM_INT);
            if($stmt -> execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar->errorInfo());
                return "null";
            }
        }

    }

?>

