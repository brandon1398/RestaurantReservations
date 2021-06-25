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
                <li><a href="#" class="active" id="mesas">Mesas</a></li>
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
                <i class="fas fa-box fa-8x"></i>
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
    
    <!-- </div> -->

    <div class="footer-box pad-top-70" id="footer">
    <div class="container">
        <div class="row footer_l">
            <div class="footer-in-main">
                <div class="footer-logo">
                    
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-box-a">
                        <h3>Acerca de Nosotros</h3>
                        <p>Aenean commodo ligula eget dolor aenean massa. Cum sociis nat penatibu set magnis dis parturient montes.</p>
                        <ul class="socials-box footer-socials pull-left">
                            <li>
                                <a href="#">
                                    <div class="social-circle-border"><i class="fa  fa-facebook"></i></div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="social-circle-border"><i class="fa fa-twitter"></i></div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="social-circle-border"><i class="fa fa-instagram"></i></div>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-box-b">
                        <h3>Nuevo Menu</h3>
                        <ul>
                            <li><a href="#">Por definir</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-box-c">
                        <h3>Cont&aacute;ctanos</h3>
                        <p>
                            <i class="fa fa-map-signs" aria-hidden="true"></i>
                            <span>Universidad del Azuay</span>
                        </p>
                        <p>
                            <i class="fa fa-mobile" aria-hidden="true"></i>
                            <span>
                            +593 096 362 1024
                        </span>
                        </p>
                        <p>
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span><a href="mailto:brando@es.uazuay.edu.ec?">brando@es.uazuay.edu.ec</a></span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-box-d">
                        <h3>Horarios de Atenci&oacute;n</h3>

                        <ul>
                            <li>
                                <p>Lunes - Jueves </p>
                                <span> 11:00 AM - 9:00 PM</span>
                            </li>
                            <li>
                                <p>Viernes - Domingo </p>
                                <span>  11:00 AM - 5:00 PM</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

  



<!-- JS -->
<script src="../../js/all.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/custom.js"></script>
<script src="../../js/javascript.js"></script>
</body>
</html>