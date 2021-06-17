<?php
    require_once "../php/controlador/formularios.controlador.php";
    require_once "../php/modelos/formularios.modelo.php";
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
    <link rel="shortcut icon" href="../upload/connies_logo.png" type="image/x-icon" />
    <!-- <link rel="apple-touch-icon" href="../upload/connies_logo.png"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css?v=<?php echo (rand()); ?>" >
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- color -->
    <link id="changeable-colors" rel="stylesheet" href="../css/colors/orange.css" />
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>


    <!-- Modernizer -->
    <script src="../js/modernizer.js"></script>
    <title>Restaurant Reservations</title>
</head>
<body>
    
    <div id="site-header">
        <header id="header" class="header-block-top">
            <div class="container">
                <div class="row">
                    <div class="main-menu">
                        <!-- navbar -->
                        <nav class="navbar navbar-default" id="mainNav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="logo">
                                    <a class="navbar-brand js-scroll-trigger logo-header" href="#">
                                        <img src="../upload/connies_logo.png" style="width:150px; height: 80px;" alt="">
                                    </a>
                                </div>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="../html/index.html">Inicio</a></li>
                                    <li><a href="#">Men&uacute;</a></li>
                                    <li><a href="#">Qui&eacute;nes Somos</a></li>                                    
                                    <li><a href="#">Galer&iacute;a</a></li>
                                    <li><a href="#">Reservaciones</a></li>
                                    <li><a href="#footer">Cont&aacute;ctanos</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <div id="banner" class="banner form_banner full-screen-mode parallax">
        <div class="container pr">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="banner-static">
                    <div class="banner-text">
                        <div class="banner-cell">
                            <div class="form-reg">
                                <h1 class="text-title">INICIAR SESIÓN</h1> 
                                <!-- <h1><span class="typer" id="some-id" data-delay="300" data-delim=":" data-words="CLIENTE" data-colors="red"></span></h1> -->
                                <br>
                                <form class="formClass" method="POST" id="formulario" name="formulario" onsubmit="return validateFormLogin()">
                                    <label for="nombre">Usuario</label>
                                    <input type="text" class="req" id="nombre" name="nombre" pattern="[A-Z][a-z]+">
                                    <span id="asterisco1" class="nor">*</span>
                                    <br><br>
                                    <!-- <label for="email">Email</label>
                                    <input type="email" id="email" name="email">
                                    <span id="asterisco4" class="nor">*</span>
                                    <br><br> -->
                                    <label for="password">Contraseña</label>
                                    <input type="password" placeholder="**************" name="password" id="password">
                                    <span id="asterisco5" class="nor">*</span>
                                    <br><br>

                                    <?php
                                        $login = new ControladorFormularios();
                                        $login -> ctrLoginUser();      
                                    ?>
                                    <input class="btn_reg hvr-underline-from-center" type="submit" value="ENTRAR">
                                    <br><br>
                                </form>
                                <!-- <button class="btn_reg" src="#" >Iniciar Sesi&oacute;n</button>
                                <br><br> -->
                            </div>
                                                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    

    <div class="footer-box pad-top-70" id="footer">
    <div class="container">
        <div class="row footer_l">
            <div class="footer-in-main">
                <div class="footer-logo">
                    <div class="text-center">
                        <img src="../upload/connies_logo.png" width="150px" height="80px" alt="" />
                    </div>
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
                            <li><a href="#">Bistec de pollo</a></li>
                            <li><a href="#">Bistec de pollo</a></li>
                            <li><a href="#">Bistec de pollo</a></li>
                            <li><a href="#">Bistec de pollo</a></li>
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
    
</div>
</div>



<!-- JS -->
<script src="../js/all.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/custom.js"></script>
<script src="../js/javascript.js"></script>
</body>
</html>