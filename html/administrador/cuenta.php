<?php
include "./funcionescategoria.php";
include "header.php";  
    /* include "../php/controlador/formularios.controlador.php";
    include "../php/modelos/formularios.modelo.php"; */
    session_start();
    if(!isset($_SESSION["validarIngreso"])){
        echo '<script>
            window.location="../../html/login.php";
        </script>';
        return;
    }else{
    
        if($_SESSION["validarIngreso"]=="null"){
            echo '<script>
                window.location="../../html/login.php";
            </script>';
            return;
        }
    }


    $cnn= conectar();
    $nombre="";
    $apellido="";
    $telefono="";
    $email="";
    $pass="";
    $sta="";
    $rol="";
    $id="";


        
        $id=$_SESSION["id"];
        $datos_id=consultar_idus($cnn,$_SESSION["id"]);
        if(isset($datos_id)){
            $nombre=$datos_id["nombre_usuario"];
            $apellido=$datos_id["apellido_usuario"];
            $telefono=$datos_id["telefono_usuario"];
            $email=$datos_id["email_usuario"];
            $pass=$datos_id["password_usuario"];
            $sta=$datos_id["status_usuario"];
            $rol=$datos_id["id_rol_fk"];
        }

    



?>

<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Basic -->
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

    <!-- Site Metas -->
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../../upload/connies_logo.png" type="image/x-icon" />
    <!-- <link rel="apple-touch-icon" href="../upload/connies_logo.png"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" media="screen" type="text/css">
    <!-- Site CSS -->
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../../css/responsive.css" media="screen" type="text/css">
    <!-- color -->
    <link id="changeable-colors" rel="stylesheet" href="../../css/colors/orange.css"  type="text/css"/>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>


    <!-- Modernizer -->
    <script src="../../js/modernizer.js"></script>


    <script src="https://kit.fontawesome.com/a615326ea3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/adm_style.css?=<?php echo (rand()); ?>" type="text/css" >
    <!-- <link rel="stylesheet" href="../../css/style.css?v=<?php echo (rand()); ?>" > -->
    <title>Restaurant Reservations</title>

    <style>
        .rr{
            background : black;
        }

    .btn{
    border-radius: 3px;
    padding: 20px 15px;
    display: inline-block;
  }
  .btn_green{
   color: black;
   background-color:  #f04900;
  }
    </style>
</head>

<header>
<input type="checkbox" id="btn-menu">
        <label for="btn-menu"><i class="fas fa-bars fa-2x"></i></label>
        <nav class="menu">
            <ul class="nav">
                <li><a href="../administrador/inicio.php">Inicio</a></li>
                <li><a href="../administrador/usuarios.php">Usuarios</a></li>
                <li><a href="../administrador/mesas.php" class="active" id="mesas">Mesas</a></li>
                <li><a href="#">Reservaciones</a></li>
                <li><a href="../categorias">Categor&iacute;as</a></li>
                <li><a href="#">Platos</a></li>
                <li><a href="../../html/salir.php">Cerrar Sesi&oacute;n <i class="fas fa-user-circle"></i></a></li>
            </ul>
        </nav>
    </header>

<?php


if($_POST){
$id=$_POST["id"];
$nombre=$_POST["nom"];
$apellido=$_POST["ape"];
$telefono=$_POST["tel"];
$email=$_POST["ema"];
$pass=$_POST["pas"];
$sta=$_POST["sta"];
$rol=$_POST["rol"];
}

 if(isset($_POST["btn_edit"])){
    modificar_usuarios($cnn, $id, $nombre,$apellido,$telefono,$email,$pass,$sta,$rol);
    echo '<script> alert("Usuario modificado con exito"); </script>';
    echo '<script> location.href="../../html/administrador/inicio.php" </script>';
  }
 



?>

    <div class="main">
        
        <div class="logo">
            <h2 class="title_wel" style="text-transform:uppercase;">ADMIN <?php echo ''.$_SESSION["validarIngreso"].' '.$_SESSION["apellido"] .'!';?></h2>
            <a class="navbar-brand" href="../../html/index.html">
                <img class="log_n" src="../../upload/connies_logo.png" alt="">
            </a>
        <div class="contenido">
        <form name="categorias_form" class="form-login" onsubmit="return validar();" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <table class="rr">

                <tr>
                <input type="text" id="id" name="id" value="<?php echo $id; ?>" style="display:none" />
                </tr>

               <tr>
                    <td class="">
                    <label for="nom">Nombre</label>
                    </td>
                    <td class="">
                        <input class="" type="text" id="nom" value="<?php echo $nombre; ?>" name="nom"/>
                    </td>

                </tr>

                <tr>
                <td class="">
                    <label for="ape">Apellido</label>
                    </td>
                    <td class="">
                        <input class="" type="text" id="ape" value="<?php echo $apellido; ?>" name="ape"/>
                    </td>
                </tr>
                   
                <tr>
                <td class="">
                    <label for="tel">Telefono</label>
                    </td>
                    <td class="">
                        <input class="" type="text" id="tel" value="<?php echo $telefono; ?>" name="tel"/>
                    </td>
                </tr>
             
                <tr>
                <td class="">
                    <label for="ema">Email</label>
                    </td>
                    <td class="">
                        <input class="" type="text" id="ema" value="<?php echo $email; ?>" name="ema"/>
                    </td>
                </tr>

                <tr>
                <td class="">
                    <label for="pas">Password</label>
                    </td>
                    <td class="">
                        <input class="" type="text" id="pas" value="<?php echo $pass; ?>" name="pas"/>
                    </td>
                </tr>

                <tr>
                <td class="">
                    <label for="sta">Status</label>
                    </td>
                    <td class="">
                        <input class="" type="text" id="sta" value="<?php echo $sta; ?>" name="sta"/>
                    </td>
                </tr>

                <tr>
                <td class="">
                    <label for="rol">Rol</label>
                    </td>
                    <td class="">
                        <input class="" type="text" id="rol" value="<?php echo $rol; ?>" name="rol"/>
                    </td>
                </tr>


                <tr>
                       <?php 
                           
                           echo '<td>';
                           echo '<input type="submit" id="btn_edit" name="btn_edit" class="btn btn_green" value="MODIFICAR" />';
                           echo '</td>';
                    ?>
                </tr>
            </table>
         
         </div>
    </form>



    

    <!-- JS -->
    <script src="../../js/all.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/custom.js"></script>
    <script src="../../js/javascript.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    </body>
</html>