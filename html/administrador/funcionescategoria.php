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

     //pedidos
     function consultar_pe($cnn, $id){
        $sql= "SELECT * FROM pedido WHERE id_pedido = '$id'";
        $rs=mysqli_query($cnn, $sql);
        $datos=mysqli_fetch_assoc($rs);
        return $datos;
    }

    function consultar_idped($cnn){
        $sql= "SELECT * FROM pedido";
        $rs=mysqli_query($cnn, $sql);
        $datos=mysqli_fetch_assoc($rs);
        return $datos;
    }

    function agregar_itempedido($cnn, $iddetalle, $idpedido, $can,$idplato,$pre){
        $sql="INSERT INTO detallepedido (id_detallePedido,fk_id_plato,fk_id_pedido,cantidad_platos,subtotal_plato) VALUES ('$iddetalle','$idplato','$idpedido','$can','$pre')";
        if(mysqli_query($cnn,$sql)){

        }else{
            echo "Error" . mysqli_error($cnn);
        }

    }

    //detalle pedido
    function consultar_idp($cnn){
        $sql= "SELECT * FROM detallepedido";
        $rs=mysqli_query($cnn, $sql);
        $datos=mysqli_fetch_assoc($rs);
        return $datos;
    }

//platos
    function listar_pla($cnn){
        $lista=array();
        $sql = "SELECT * FROM platos";
        $rs = mysqli_query($cnn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($fila = mysqli_fetch_assoc($rs)) {
                $lista[]=$fila;
            }
        }
        return $lista;
    }

    function listar_p($cnn,$id){
        $sql= "SELECT * FROM platos WHERE id_plato = '$id'";
        $rs=mysqli_query($cnn, $sql);
        $datos=mysqli_fetch_assoc($rs);
        return $datos;
    }
    

?>