<?php
    require_once("../../php/modelos/db.php");
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
            <li><a href="../administrador/inicio.php">Inicio</a></li>
                <li><a href="#" class="active" id="mesas">Mesas</a></li>
                <li><a href="#" id="menu">Menu</a></li>
                <li><a href="#">Categor&iacute;as</a></li>
                <li><a href="#">Platos</a></li>
                <li><a href="../administrador/usuarios.php">Usuarios</a></li>
                <li><a href="../../html/salir.php">Cerrar Sesi&oacute;n <i class="fas fa-user-circle"></i></a></li>
            </ul>
        </nav>
    </header>
    <div class="main">
        <div class="table_usr">
            <table>
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>EMAIL</th>
                    </tr>
                </thead>
                <tbody> 

                </tbody>
            </table>
        </div>
    </div>


    <!-- JS -->
    <script src="../../js/all.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/custom.js"></script>
    <script src="../../js/javascript.js"></script>
</body>
</html>