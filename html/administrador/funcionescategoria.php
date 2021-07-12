<?php
    function conectar(){
        $user="root";
        $password="";
        $server="localhost";
        $db="restaurante";

        $con=mysqli_connect($server,$user,$password,$db) or die ("Error al conectar a la bd ");
        return $con;
    }

 //categorias...............................  
   
    function consultar_id($cnn, $id){
        $sql= "SELECT * FROM categoria WHERE id_categoria = '$id'";
        $rs=mysqli_query($cnn, $sql);
        $datos=mysqli_fetch_assoc($rs);
        return $datos;
    }

    function listar_categorias($cnn){
        $lista=array();
        $sql = "SELECT * FROM categoria";
        $rs = mysqli_query($cnn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($fila = mysqli_fetch_assoc($rs)) {
                $lista[]=$fila;
            }
        }
        return $lista;
    }

    function agregar_categoria($cnn,$id,$categoria){
        $sql="INSERT INTO categoria (id_categoria,nombre_categoria) VALUES ('$id','$categoria')";
        if(mysqli_query($cnn,$sql)){

        }else{
            echo "Error" . mysqli_error($cnn);
        }
    }


    function eliminar_categoria($cnn,$id){
        $sql = "DELETE FROM categoria WHERE id_categoria = '$id'";
        if (mysqli_query($cnn, $sql)){
            
        }else{
            echo "Error" . mysqli_error($cnn);
        }
    }


    function modificar_categoria($cnn,$id,$categoria){
        $sql = "UPDATE categoria SET  nombre_categoria= '$categoria' WHERE id_categoria = '$id'";

       if (mysqli_query($cnn, $sql)){
    }else{
        echo "Error" . mysqli_error($cnn);
    }
    }

//usuario...................

    function consultar_idus($cnn, $id){
        $sql= "SELECT * FROM usuarios WHERE id_usuario = '$id'";
        $rs=mysqli_query($cnn, $sql);
        $datos=mysqli_fetch_assoc($rs);
        return $datos;
    }


    function modificar_usuarios($cnn,$id,$nombre,$apellido,$telefono,$email,$pass,$sta,$rol){
        $sql = "UPDATE usuarios SET  nombre_usuario= '$nombre',apellido_usuario= '$apellido',telefono_usuario= '$telefono',email_usuario= '$email',password_usuario= '$pass',status_usuario= '$sta' ,id_rol_fk= '$rol' WHERE id_usuario = '$id'";

        if (mysqli_query($cnn, $sql)){
            $_SESSION['validarIngreso'] = $nombre;
            $_SESSION['apellido'] = $apellido;
        }else{
            echo "Error" . mysqli_error($cnn);
        }
    }

?>