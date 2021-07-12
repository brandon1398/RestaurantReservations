<?php
    include "header.php";    
?>
<?php
    $valor = $_GET["id"];
    $user = ControladorFormularios::ctrSelectCategoriasID($valor);
?>
<section class="editUser">
    <article class="content">
        <header class="title_edit">Editar Categor&iacute;a</header>
        <div class="contenido">
            <form action="" method="POST">
                <label for="id">ID Categor&iacute;a</label>
                <input type="text" readonly class="req" id="id" name="id" value="<?php echo $valor; ?>">
                <br><br>    
                <label for="nombre">Nombre Categor&iacute;a</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $user['nombre_categoria'];?>">
                <span id="asterisco2" class="nor">*</span>
                <br><br>
                <br><br>
                <button class="btn_reg" type="submit" name="actualizar">Actualizar</button>
                <a class="btn a_edit_u" name="cancelar" href="../administrador/categorias.php">Cancelar</a>

                <?php
                    $actualizar = ControladorFormularios::ctrUpdateCategoria();
                    if($actualizar=="ok"){
                        echo "<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null,null,window.location.href);
                            }
                        </script>";

                        echo '<div class="alert alert-success" style="position:relative;top:-50px;">Categoría actualizada<div>';

                        echo "<script>
                            setTimeout(function(){
                                window.location = '../administrador/categorias.php';
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