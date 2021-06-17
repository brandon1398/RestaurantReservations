<?php
    require_once "../php/modelos/conexion.php";
    class ModeloFormularios{

        /* ----------------------------------
            Register user - rol client
        ---------------------------------- */
        static public function mdlRegistroCliente($tabla, $datos){
            #$consulta = "INSERT INTO usuarios (nombre_usuario, apellido_usuario, telefono_usuario,email_usuario,password_usuario,status_usuario,id_rol_fk) VALUES (:nombre, :apellido, :telefono,:email,:password,'1','2')";

            /*prepare: prepara una sentencia sql para ser ejecutada por el metodo PDOStatement::execute()
            Ayuda a prevenir inyecciones SQL */

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

        /* ----------------------------------
            Login user
        ---------------------------------- */
        static public function mdlLoginUser($tabla, $item, $valor){
           
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
    }

?>
