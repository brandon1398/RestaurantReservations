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
    <link rel="stylesheet" href="../../css/cli_style.css?=<?php echo (rand()); ?>" type="text/css" >
    <!-- <link rel="stylesheet" href="../../css/style.css?v=<?php echo (rand()); ?>" > -->
    <title>Restaurant Reservations</title>
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


    <section class="main"> 
        <!-- <h1 class="title_res">RESERVACIONES</h1> -->
        <article class="contenido">
            <br><br><br>
            <h1 class="reserv">Realizar Reservaci&oacute;n</h1>
            <br><br>
            <form class="formClass" method="POST" id="formulario" name="formulario">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha">
                <br><br>
                <label for="hora">Hora</label>
                <input type="time" name="hora" value="11:00" min="11:00" max="21:00">
                <br><br>
                <label for="mesa">Mesa</label>
                <select name="mesa" id="mesa" style="color: #e75b1e;">
                    <option value="">Seleccione</option>
                    <?php foreach($mesasT as $mesa): ?>
                        <option value="<?php echo $mesa["id_mesa"]; ?>"><?php echo 'Mesa '.$mesa['numero_mesa']; ?></option>
                    <?php endforeach ?>
                </select>;
                <br><br>                
                <?php
                    $registro = ControladorFormularios::ctrReservaMesa();
                    if($registro == "ok"){
                        // limpiamos las variables
                        echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location="../../html/cliente/reservaciones.php");
                            }
                        </script>';                                             
                    }
                ?> 
                <br>
                <input type="submit" class="btn reserBTN" value="Reservar">
                <br><br>
            </form>
        </article>
        <article class="mesas_c">
            <table class="table_mesas">
                <tbody>
                    <?php 
                        /* echo '<tr>'; */
                        $cont = 0;
                        foreach($mesasT as $mesa){
                            if($cont==0){
                                echo '<tr>';
                            }else if($cont==3){
                                echo '</tr>';
                                $cont = 0;
                            }

                            if($mesa['estado_mesa']=="Libre"){
                                echo '<td><h4>Mesa '. $mesa['numero_mesa'] . '</h4><i class="fas fa-box fa-5x" style="color:black;"></i><h4 class="title_mE">Num Personas '.   $mesa['personas_mesa'].'</h4><td>';
                            }else{
                                echo '<td><h4>Mesa '. $mesa['numero_mesa'] . '</h4><i class="fas fa-box fa-5x" style="color:red;"><h4 class="title_mE">Num Personas '.   $mesa['personas_mesa'] .'</h4></i><td>';
                            }
                            
                            /* foreach($listRes as $list){
                                if($mesa['id_mesa'] == $list['fk_id_mesa']){
                                    echo '<td><h4>Mesa '. $mesa['numero_mesa'] . '</h4><i class="fas fa-box fa-5x" style="color:red;"><h4 class="title_mE">Personas '.   $mesa['personas_mesa'] .'</h4></i><td>';
                                }
                            } */
                            $cont += 1;
                        }
                    ?>
                </tbody>
            </table>
            
        </article>

        

        <article class="item_content">
            <table class="table_user display" id="tablaUser">
                    <!--caption>RESERVACIONES</caption>-->                <thead>
                    <tr>
                        <td>MESA</td>
                        <td>FECHA RESERVADA</td>
                        <td>HORA RESERVADA</td>    
                        <td>ACCIONES</td>                    
                    </tr>
                </thead>
                <tbody> 
                    <?php foreach($listRes as $list): ?>
                        
                        <tr>
                            <td><?php echo $list['numero_mesa']; ?></td>
                            <td><?php echo $list['fecha_reserva'] ?></td>
                            <td><?php echo $list['hora_reserva'] ?></td>
                            <td>
                                <form method="POST">
                                    <!-- <a href="../../html/administrador/editar_mesa.php?id=<?php echo $mesa["id_mesa"]; ?>" class="btn btn-warning fas fa-pencil-alt"></a>
                                       -->   
                                    <input type="hidden" value="<?php echo $list["id_reserva"]; ?>" name="deleteReserva">
                                    <input type="hidden" value="<?php echo $list["fk_id_mesa"]; ?>" name="idMesa">
                                    <button onclick="return eliminarR();" type="submit" class="btn btn-danger fas fa-trash-alt fa-1x"></button>
                                    <?php 
                                        $eliminar = new ControladorFormularios();
                                        $eliminar -> ctrDeleteReserva();
                                    ?>
                                </form>  
                            </td>
                        </tr>
                    <?php endforeach; ?>                            
                   
                </tbody>
            </table>
        </article>
    </section>

    <script>
        function eliminarR(){
            if(confirm("Dese eliminar la reservación?")){
                return true;
            }else{
                return false;
            }
        }
    </script>

    <?php
        include '../../html/footer.php';
    ?>