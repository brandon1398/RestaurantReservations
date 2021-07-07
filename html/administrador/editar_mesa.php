<?php
    include "header.php";    
?>
<?php
    $valor = $_GET["id"];
    $user = ControladorFormularios::ctrSelectMesasId($valor);
    
?>
<section class="editUser">
    <article class="content">
        <header class="title_edit">Editar Usuario</header>
        <div class="contenido">
            <form action="" method="POST">
                <input type="hidden" class="req" id="id" name="id" value="<?php echo $valor; ?>">
                <label for="numero">Nº Mesa</label>
                <input type="number" class="req" id="numero" name="numero" value="<?php echo $user['numero_mesa']; ?>">
                <span id="asterisco1" class="nor">*</span>
                <br><br>
                <label for="personas">Max Personas</label>
                <input type="number" id="personas" name="personas" value="<?php echo $user['personas_mesa'] ?>">
                <span id="asterisco2" class="nor">*</span>
                <br><br>
                <label for="estado">Estado </label>
                <span style="color:#fff;font-size:15px;">Libre </span><input type="radio" id="personas" value="Libre" name="estado" <?php if(isset($user['estado_mesa']) && $user['estado_mesa']=="Libre") echo "checked"; ?>>
                <span style="color:#fff;font-size:15px;">Ocupada </span><input type="radio" id="personas" value="Ocupada" name="estado" <?php if(isset($user['estado_mesa'])  && $user['estado_mesa']=="Ocupada") echo "checked"; ?>>
               
                <br><br>
                <button class="btn_reg" type="submit" name="actualizar">Actualizar</button>
                <a class="btn a_edit_u" name="cancelar" href="../administrador/mesas.php">Cancelar</a>

                <?php
                    $actualizar = ControladorFormularios::ctrUpdateMesas();
                    if($actualizar=="ok"){
                        echo "<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null,null,window.location.href);
                            }
                        </script>";

                        echo '<div class="alert alert-success" style="position:relative;top:-50px;">Mesa actualizada<div>';

                        echo "<script>
                            setTimeout(function(){
                                window.location = '../administrador/mesas.php';
                            }, 1000);
                        </script>";
                    }
                ?>
            </form>
        </div>
    </article>
</section>

<?php 
    include "../../html/footer.php";
?>