<?php
 session_start();
    require_once "../../php/modelos/conexion.php";
    require_once "../../php/controlador/formularios.controlador.php";
    require_once "../../php/modelos/formularios.modelo.php";
    
    $usuarios = ControladorFormularios::ctrSelectUsers();
    $roles = ControladorFormularios::ctrSelectRoles();
    $mesas = ControladorFormularios::ctrSelectMesasLibre();
    $mesasT = ControladorFormularios::ctrSelectMesas();
    $listRes = ControladorFormularios::ctrSelectReservasId();
    $listR = ControladorFormularios::ctrSelectReservas();
    if(isset($listR) && !empty($listR)){
        foreach($listR as $list){
            if($_SESSION['id'] == $list['fk_id_usuario']){
                $id_fk_usuario = $list['fk_id_usuario'];
            }
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
    <link rel="stylesheet" href="../../css/men_style.css?=<?php echo (rand()); ?>" type="text/css" >
<!--     <link rel="stylesheet" href="../../css/style.css?v=<?php echo (rand()); ?>" >
 -->    <title>Restaurant Reservations</title>
</head>
<body>
    
    <header>
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"><i class="fas fa-bars fa-2x"></i></label>
        <nav class="menu">
            <ul class="nav">   
                <li><a href="inicio.php">Inicio</a></li>      
                <li><a href="reservaciones.php">Reservaciones</a></li>
                <li><a href="#">Pedidos</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="../../html/salir.php">Cerrar Sesi&oacute;n <i class="fas fa-user-circle"></i></a></li>
            </ul>
        </nav>
    </header>

<section class="menu_content">
    <article>
        <h2 class="title_menu">El verdadero sabor de Cuenca</h2>
    </article>
    <article class="item_menu">
        <section class="item_carta">
            <section class="item_promo">
                <h2>Promo Men&uacute;</h2>
                <p>Traiga a cenar a su novia, su amante, su mujer y si las trae a las 3 usted cenar&aacute; gratis</p>
            </section>
        </section>
        <br>
        <br>
        <section class="item_carta">
            <section class="image-fluid">
                <img src="../../upload/plato_3.jpg" class="img-fluid" alt="">
            </section>
            <br><br><br>
            <h3 class="title_best">LOMO DE RES</h3>
            <p style="color: rgba(0,0,0,.5); font-size:20px;">Disfruta de la especialidad de la casa</p>
            <br><br>
            <p style="color: rgba(238,70,6,.8); font-size:18px;">A tan solo $7.80</p>
        </section>

        <section class="item_carta">
            <form action="" method="POST">
                <input type="submit" class="categoria_fondo_1" value="CARNES" name="btn_carnes">
                <input type="submit" class="categoria_fondo_2" value="ENSALADAS" name="btn_ensaladas">
                <input type="submit" class="categoria_fondo_3" value="POSTRES" name="btn_postres">
                <input type="submit" class="categoria_fondo_4" value="BEBIDAS" name="btn_bebidas">
            </form>
        </section>
    </article>
    <!-- <section class="carousel">
        <img src="../../upload/plato2.jpg" id="img_menu">
    </section> -->
    <!-- <section class="categoria">
        <div class="content">
            <img src="../../upload/plato1.jpg" width="200px" height="200px" alt="">
        </div>
        <div class="content">
            <img src="../../upload/plato1.jpg" width="200px" height="200px" alt="">
        </div>
        <div class="content">
            <img src="../../upload/plato1.jpg" width="200px" height="200px" alt="">
        </div>
        <div class="content">
            <img src="../../upload/plato1.jpg" width="200px" height="200px" alt="">
        </div>
        <div class="content">
            <img src="../../upload/plato1.jpg" width="200px" height="200px" alt="">
        </div>
        <div class="content">
            <img src="../../upload/plato1.jpg" width="200px" height="200px" alt="">
        </div>
    </section>

    <section class="content_item_menu"> -->
        <!-- <table>
            <tbody>
                <tr>
                    <td>
                        <img src="../../upload/plato1.jpg" width="200px" height="200px" alt="">
                        <h2>Seco de pollo</h2>
                    </td>
                </tr>
            </tbody>
        </table>   -->  <!-- 
    </section> -->
</section>


<script>
    function carrusel(){
        var cont=0;
        setInterval(() => {
            var array = ["../../upload/plato1.jpg","../../upload/plato3.jpg"];
            var img = new Array();
            img[0] = "../../upload/plato1.jpg"
            img[1] = "../../upload/plato_1.jpg"
            img[2] = "../../upload/plato_2.jpg"
            img[3] = "../../upload/plato3.jpg"
            img[4] = "../../upload/plato_3.jpg"
            document.getElementById('img_menu').setAttribute("src",img[cont]);
            if(cont!=img.length-1){
                cont++;
            }else{
                cont=0;
            }
        }, 3000);
    }

    /* carrusel(); */

</script>