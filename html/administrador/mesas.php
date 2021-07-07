<?php
    require_once "../../php/modelos/conexion.php";
    require_once "../../php/controlador/formularios.controlador.php";
    require_once "../../php/modelos/formularios.modelo.php";
    
    $mesas = ControladorFormularios::ctrSelectMesas();
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
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"><i class="fas fa-bars fa-2x"></i></label>
        <nav class="menu">
            <ul class="nav">
                <li><a href="../administrador/inicio.php">Inicio</a></li>
                <li><a href="../administrador/usuarios.php">Usuarios</a></li>
                <li><a href="../administrador/mesas.php" class="active" id="mesas">Mesas</a></li>
                <li><a href="#">Reservaciones</a></li>
                <li><a href="#">Categor&iacute;as</a></li>
                <li><a href="#">Platos</a></li>
                <li><a href="../../html/salir.php">Cerrar Sesi&oacute;n <i class="fas fa-user-circle"></i></a></li>
            </ul>
        </nav>
    </header>

    
    <!-- main -->
    <section class="main">
        <article class="item_content">
            <table class="table_user display" id="tablaUser">
                <caption>MESAS<label for="addUser" class="caption_b">Agregar <i class="fas fa-plus"></i></label></caption>
                <thead>
                    <tr>
                        <th>Nº MESA</th>
                        <th>MAX PERSONAS</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                        if(isset($mesas)):
                            foreach($mesas as $mesa): ?>
                                <tr>
                                    
                                    <td><?php echo $mesa["numero_mesa"]; ?></td>
                                    <td><?php echo $mesa["personas_mesa"]; ?></td>
                                    <td><?php echo $mesa["estado_mesa"]; ?></td>
                                    <td>
                                        <form method="POST">
                                            <a href="../../html/administrador/editar_mesa.php?id=<?php echo $mesa["id_mesa"]; ?>" class="btn btn-warning fas fa-pencil-alt"></a>
                                         
                                            <input type="hidden" value="<?php echo $mesa["id_mesa"]; ?>" name="deleteMesa">
                                            <button onclick="return eliminar();" type="submit" class="btn btn-danger fas fa-trash-alt fa-1x"></button>
                                            <?php 
                                                $eliminar = new ControladorFormularios();
                                                $eliminar -> ctrDeleteMesa();
                                            ?>
                                        </form>                              
                                    </td>
                                </tr>                   
                            <?php endforeach ?>
                        <?php endif; ?>                                      
                   
                </tbody>
            </table>
        </article>
    </section>
    <input type="checkbox" id="addUser">
    <section class="modalCreate">
        <article class="contenedor">
            <header>NUEVA MESA</header>
            <label class="x fas fa-window-close" for="addUser"></label>
            <div class="contenido">
            <form class="formClass" method="POST" id="formulario" name="formulario">
                
                <label for="numero">Nº Mesa</label>
                <input type="number" class="req" id="numero" name="numero">
                <span id="asterisco1" class="nor">*</span>
                <br><br>
                <label for="personas">Max Personas</label>
                <input type="number" id="personas" name="personas">
                <span id="asterisco2" class="nor">*</span>
                <br><br>
                <label for="estado">Estado </label>
                <span style="color:#fff;font-size:15px;">Libre </span><input type="radio" id="personas" value="Libre" name="estado">
                <span style="color:#fff;font-size:15px;">Ocupada </span><input type="radio" id="personas" value="Ocupada" name="estado">
               
                <br><br>
                <?php
                    $registro = ControladorFormularios::ctrRegistroMesasAdmin();
                    if($registro == "ok"){
                        // limpiamos las variables
                        echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location="../../html/administrador/mesas.php");
                            }
                        </script>';                                             
                    }
                ?>
                <input class="btn_reg" type="submit" value="Registrar">
                <br><br>
            </form>
            </div>
        </article>
    </section>


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

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <!-- table search -->
    <script>
        $(document).ready(function() {
            $('#tablaUser').DataTable({
                        "language": {
                        "emptyTable":			"No hay datos disponibles en la tabla.",
                        "info":		   		"Del _START_ al _END_ de _TOTAL_ ",
                        "infoEmpty":			"Mostrando 0 registros de un total de 0.",
                        "infoFiltered":			"(filtrados de un total de _MAX_ registros)",
                        "infoPostFix":			" registros!",
                        "lengthMenu":			"Mostrar registros _MENU_",
                        "loadingRecords":		"Cargando...",
                        "processing":			"Procesando...",
                        "search":			"Buscar:",
                        "searchPlaceholder":		"Dato para buscar",
                        "zeroRecords":			"No se han encontrado coincidencias.",
                        "paginate": {
                            "first":			"Primera",
                            "last":				"Última",
                            "next":				"Siguiente",
                            "previous":			"Anterior"
                        },
                        "aria": {
                            "sortAscending":	"Ordenación ascendente",
                            "sortDescending":	"Ordenación descendente"
                        }
                    },
                    "lengthMenu": [5, 10, 20, 50],
                    scrollY: '40vh'
            });
        });   
    </script>


    <script>
        function eliminar(){
            if(confirm('Desea eliminar la mesa?')){
                return true;
            }else{
                return false;
            }
        }
    </script>
</body>
</html>