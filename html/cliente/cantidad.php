<?php
include "../administrador/funcionescategoria.php";
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

    
?>

<?php
 $cnn= conectar();
 $pre="";
 $can="";

 $datos=consultar_idp($cnn);
 if(isset($datos)){
    $idp=$datos["id_detallePedido"];
}
$idp=$idp+1;
 
$datos=consultar_idped($cnn);
 if(isset($datos)){
    $idpedido=$datos["id_pedido"];
}


if(!$_POST){
  $idplato= $_GET['idplato'];
   $dato=listar_p($cnn,$idplato);
    if(isset($dato)){
        $prec=$dato["precio_plato"];
    }
}

  if($_POST){
   $iddetalle= $_POST['i'];
   $idpedido= $_POST['idp'];
   $can=$_POST['can'];
   $c=$_POST['cant'];
   $idplato=$_POST['id_plato'];
   $pret=$_POST['subt'];
   $p=$_POST['sub'];
   $pre=$can.$pret;
   $prec="";
   if(isset($_POST["btn_submit"])){
    agregar_itempedido($cnn, $iddetalle, $idpedido, $c,$idplato,$p);
    echo '<script> alert("Item agregado con exito"); </script>';
    echo '<script> location.href="pedidos.php" </script>';
    }
  }
  

  
   

?>

<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <Style>
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
        </Style>
    </head>

    <div class="main">
        
        <div class="logo">
            <h2 class="title_wel" style="text-transform:uppercase;">ADMIN <?php echo ''.$_SESSION["validarIngreso"].' '.$_SESSION["apellido"] .'!';?></h2>
            <a class="navbar-brand" href="../../html/index.html">
                <img class="log_n" src="../../upload/connies_logo.png" alt="">
            </a>
</div>      

<div class="contenido">
        <form name="categorias_form" class="form-login" onsubmit="return validar();" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">   
        
        <table class="rr">

               <tr>

                <td class="">
                <input class="" type="text" id="i" value="<?php echo $idp; ?>" name="i" style="display:none"/>    
                <input class="" type="text" id="idp" value="<?php echo $idpedido; ?>" name="idp" style="display:none"/>    
                <label for="id_plato">Plato</label>
                    </td>
                    <td class="">
                        <input class="" type="text" id="id_plato" value="<?php echo $idplato; ?>" name="id_plato"/>
                    </td>
                </tr>   
             
                <tr>
                <td class="">
                    <label for="can">Cantidad</label>
                    </td>
                    <td class="" method="get">
                        <input class="" type="text" id="can" value=" " name="can"/>
                    </td>
                    <td class="" method="get">
                        <input class="" type="text" id="cant" value="<?php echo $can; ?>" name="cant" />
                        
                    </td>
                </tr>

                <tr>
                <td class="">
                    <label for="sub">Subtotal</label>
                    </td>
                    <td class="">
                    <input class="" type="text" id="subt" value="<?php echo $prec; ?>" name="subt" style="display:none"/>    
                    <input class="" type="text" id="sub" value="<?php echo $pre; ?>" name="sub" />
                    </td>
                </tr>


                <tr>
                       <?php 
                           if($pre==""){
                           echo '<td>';
                           echo '<input type="submit" id="btn_edit" name="btn_edit" class="btn btn_green" value="Calcular" />';
                           echo '</td>';
                           }else{
                            echo '<td>';
                            echo '<input type="submit" id="btn_submit" name="btn_submit" class="btn btn_green" value="Guardar" />';
                            echo '</td>';
                           }
                    ?>
                </tr>
            </table>
         
         </div>
    </form>


    
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


</html>