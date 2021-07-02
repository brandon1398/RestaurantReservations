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
    }

?>
