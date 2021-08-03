<?php
    include "header.php";    
?>
<?php
    session_start();
    $roles = ControladorFormularios::ctrSelectRoles();
    $valor = $_SESSION['id'];
    $user = ControladorFormularios::ctrSelectUserId($valor);
?>
<section class="editUser">
    <article class="content">
        <header class="title_edit">Cuenta Personal</header>
        <div class="contenido">
            <form action="" method="POST">
                <label for="name">ID</label>
                <input type="text" name="id" value="<?php echo $valor; ?>" readonly>
                <input type="hidden" name="passwordOld" value="<?php echo $user['password_usuario']; ?>">
                <br><br>
                <label for="name">Nombre</label>
                <input type="text" name="nombre" value="<?php echo $user['nombre_usuario']; ?>">
                <br><br>
                <label for="lastName">Apellido</label>
                <input type="text" name="lastName" value="<?php echo $user['apellido_usuario'] ?>">
                <br><br>
                <label for="phone">Telefono</label>
                <input type="number" name="phone" value="<?php echo $user['telefono_usuario'] ?>">
                <br><br>
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $user['email_usuario']?>">
                <br><br>
                <label for="password">Contraseña</label>
                <input type="password" name="passwordNew">
                <br><br>
                <label for="rol">Rol</label>
                <select name="rol" id="rol">
                    <?php foreach($roles as $rol):?>
                        <?php 
                            $select = "selected";
                            if($user['id_rol_fk'] == $rol['id_rol']):?>
                                <option <?php echo $select ?> value="<?php echo $rol['id_rol']; ?>"><?php echo $rol['nombre_rol']; ?></option>
                            <?php else:  ?>
                                <option value="<?php echo $rol['id_rol']; ?>"><?php echo $rol['nombre_rol']; ?></option>
                        <?php endif; ?>                        
                    <?php endforeach; ?>
                </select>
                <br><br>
                <button class="btn_reg" type="submit" name="actualizar">Actualizar</button>
                <a class="btn a_edit_u" name="cancelar" href="../administrador/inicio.php">Cancelar</a>

                <?php
                    $actualizar = ControladorFormularios::ctrUpdateUser();
                    if($actualizar=="ok"){
                        
                        $_SESSION["validarIngreso"] = $_POST["nombre"];
                        $_SESSION["apellido"] = $_POST["lastName"];
                    
                        echo "<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null,null,window.location.href);
                            }
                        </script>";

                        echo '<div class="alert alert-success" style="position:relative;top:-50px;">Cuenta Actualizada!<div>';

                        echo "<script>
                            setTimeout(function(){
                                window.location = '../administrador/inicio.php';
                            }, 1500);
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