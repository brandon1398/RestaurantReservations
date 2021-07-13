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


<!DOCTYPE html>
<html lang="en">
<head>

    <style>
  .btn{
    border-radius: 3px;
    padding: 20px 15px;
    display: inline-block;
  }
  .btn_green{
   color: black;
   background-color:  #f04900;
  }
  
  .ta{
      background: black;
  }
  
  .platos th{
      border 1px;
      color: white;
  }

  .platos td{
      border 1px;
      color: white;
  }

.table-fixed tbody{
    height: 230px;
    overflow-y: auto;
    width: 1500px:
}

.table-fixed thead{ 
width:
}

.table-fixed tbody,
.table-fixed thead{
 float:left;
 border-bottom-width: 10000px;
}

.prin{
     width: 1000px;
}

.tabla-fixed{
    margin-left:0;
}

.contenido{
 margin-left: 0;
  
}


    </style>

</head>




    <?php
    $cnn= conectar();
     function listarplatos(){
        global $cnn;
        $lista=listar_pla($cnn);
        if(isset($lista)){
            foreach($lista as $fila){
             echo "<tr>
                <td class='lista'>{$fila['id_plato']}</td>
                <td class='lista'>{$fila['nombre_plato']}</td>
                <td class='lista'>{$fila['descripcion_plato']}</td>
                <td class='lista'>{$fila['precio_plato']}</td>
                <td class='lista'><img src='../../upload/{$fila['imagen_plato']}' width=100;height=100; alt=''/></td>
                <td class='lista'>{$fila['fk_id_categoria']}</td>";

                echo '<td class="lista"><form action=cantidad.php method="get">';
                $enlaceEditar='<button name="btnEditar" type="button" class="btn_green btn" onClick="location.href=\'./cantidad.php?idplato=' . $fila['id_plato'] . '\'" >Seleccionar</button>';
                echo $enlaceEditar;
                echo "</form></td>";

              echo "</tr>";  
            }
        }
        }

        
    
        
        
?>

<?php
$cnn= conectar();

$id_pedido="";
$nombrep="";

if(!$_POST){
    $datos_id=consultar_idped($cnn);
    if(isset($datos_id)){
        $id_pedido=$datos_id["id_pedido"];
        $id_pedido=$id_pedido+1;
    }
}

if(isset($_GET["id"])){
    $id=$_GET["id"];
   

}else{
if($_POST){
$id_pedido=$_POST["id_ped"];
}

}

?>


<?php

$cnn= conectar();
$nombre="";
$fecha="";
$id="";
$idpedido="";
$nombrep="";
$precio="";
$id_plato="";

$datos=consultar_idped($cnn);
 if(isset($datos)){
    $idpedido=$datos["id_pedido"];
}




?>

    <div class="main">
        
        <div class="logo">
            <h2 class="title_wel" style="text-transform:uppercase;">ADMIN <?php echo ''.$_SESSION["validarIngreso"].' '.$_SESSION["apellido"] .'!';?></h2>
            <a class="navbar-brand" href="../../html/index.html">
                <img class="log_n" src="../../upload/connies_logo.png" alt="">
            </a>
        

        </div>
        <form name="categorias_form" class="prin" onsubmit="return validar();" action="cantidad.php" method="post">
        <div class="contenido">
            <table class="ta">
         

               <tr>
                      <td class="">
                        <label for="fec">Fecha</label>
                     </td>
                      <td class="">
                      <input class="rr" type="text" id="id" value="<?php echo date('d/m/Y');?>" name="idfec" placeholder: ""/>
                      </td>

                      <td class="">
                        <label for="id_ped">Pedido Nº</label>
                     </td>
                      <td class="">
                      <input class="rr" type="text" id="id_ped" value="<?php echo $id_pedido; ?>" name="id_ped" placeholder: ""/>
                      </td>
                    
                </tr>
                <tr>
                
                    <td class="">
                    <label for="id">Id</label>
                    </td>
                    <td class="">
                        <input class="rr" type="text" id="id" value="<?php echo $_SESSION["id"]; ?>" name="id" placeholder: ""/>
                    </td>

                    <td class="">
                    <label for="nom">Nombre</label>
                    </td>
                    <td class="">
                        <input class="rr" type="text" id="nom" value="<?php echo $_SESSION["validarIngreso"]; ?>" name="nom" placeholder: ""/>
                    </td>
                </tr>

                <tr>
                     <td class="">
                                        </td>
                    <td class="">
                    <label for="platos">Platos</label>

                     <table class="platos table-fixed">
                         <thead>
                             <tr>
                             <th >Codigo</th>
                             <th >Nombre</th>
                             <th >Descripcion</th>
                             <th >Precio</th>
                             <th >Imagen</th>
                             <th>Categoria</th>
                             </tr>
                            </thead>
                         <tbody class="li">
                             <?php listarplatos(); ?>
                         </tbody>
                     </table>
                    </td>
                    <td class="">
                    
                    </td>
                    <td class="pe">
                    <label for="pedido">Pedido</label>
                    
                    <table border="1">
                    <td class="">
                    <label for="Plato">Plato</label>
                    </td>
                    <td><?php  echo $nombrep?></td>
                    <td class="">
                    <label for="Precio">Precio</label>
                    </td>

                    </table>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td></td>
                   
                <?php 
                       
                       if($id<>""){
                           
                           echo '<td>';
                           echo '<input type="submit" id="btn_elimi"class="caption_b btn btn_green" name="btn_edit" value="ELIMINAR" />';
                           echo '</label></caption>';
                           echo '</td>';
                       }else{
                           echo '<td>';
                           echo '<input type="submit" id="btn_submit" class="btn btn_green" name="btn_submit" value="GUARDAR" />';
                           echo '</td>';
                       }
                       
                    ?>

               </tr> 
            </table>
         </div>
         </div>
    </form>
  
<?php
    include '../../html/footer.php';
    ?>
    