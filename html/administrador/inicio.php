<?php
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
</head>
<body>
    
    <header>
        <!-- <div class="logo">
            <a class="navbar-brand js-scroll-trigger logo-header" href="#">
                <img src="../../upload/connies_logo.png" style="width:100px; height: 40px;" alt="">
            </a>
        </div> -->
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"><i class="fas fa-bars fa-2x"></i></label>
        <nav class="menu">
            <ul class="nav">
                <li><a href="../administrador/mesas.php" class="active" id="mesas">Mesas</a></li>
                <li><a href="#" id="menu">Menu</a></li>
                <li><a href="#">Categor&iacute;as</a></li>
                <li><a href="#">Platos</a></li>
                <li><a href="../administrador/usuarios.php">Usuarios</a></li>
                <li><a href="../../html/salir.php">Cerrar Sesi&oacute;n <i class="fas fa-user-circle"></i></a></li>
            </ul>
        </nav>
    </header>
        
    <!-- <div class="banner"> -->

    <div class="main">
        
        <div class="logo">
            <h2 class="title_wel" style="text-transform:uppercase;">ADMIN <?php echo ''.$_SESSION["validarIngreso"].' '.$_SESSION["apellido"] .'!';?></h2>
            <a class="navbar-brand" href="../../html/index.html">
                <img class="log_n" src="../../upload/connies_logo.png" alt="">
            </a>
        </div>
        <div class="datos">
            
            <div class="usuarios">
                <h3>USUARIOS</h3>
                <a href="../administrador/usuarios.php"><i class="fas fa-users fa-8x"></i></a>
                <h3>1500</h3>
            </div>
            <div class="usuarios">
                <h3>MESAS</h3>
                <a href="../administrador/mesas.php"><i class="fas fa-box fa-8x"></i></a>
                <h3>50</h3>
            </div>
            <div class="usuarios">
                <h3>RESERVACIONES</h3>
                <i class="fas fa-clipboard-list fa-8x"></i>
            </div>
            <div class="usuarios">
                <h3>CATEGOR&Iacute;AS</h3>
                <a href="#"><i class="fas fa-clipboard-list fa-8x"></i></a>
            </div>
            <div class="usuarios">
                <h3>PLATOS</h3>
                <a href="../administrador/usuarios.php"><i class="fas fa-concierge-bell fa-8x"></i></a>
               
            </div>
            <div class="usuarios">
                <h3>CUENTA</h3>
                <i class="fas fa-user-circle fa-8x"></i>
            </div>
        </div>
    </div>
    
<?php
    include "../../html/footer.php";
?>