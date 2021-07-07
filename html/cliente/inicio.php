<?php
    session_start();
    if(!isset($_SESSION["validarIngreso"])){
        echo '<script>
            window.location="../login.php";
        </script>';
        return;
    }else{
        if($_SESSION["validarIngreso"]=="null"){
            echo '<script>
                window.location="../login.php";
            </script>';
            return;
        }
    }
?>


<?php
    include 'header.php';
?>
   
    <div class="main">
        <div class="logo">
            <h2 class="title_wel" style="text-transform:uppercase;">BIENVENIDO <?php echo ''.$_SESSION["validarIngreso"].' '.$_SESSION["apellido"] .'!';?></h2>
            <a class="navbar-brand" href="../../html/index.html">
                <img class="log_n" src="../../upload/connies_logo.png" alt="">
            </a>
        </div>
        <div class="datos">
            <div class="usuarios">
                <h3>RESERVACIONES</h3>
                <i class="fas fa-clipboard-list fa-8x"></i>
            </div>
            <div class="usuarios">
                <h3>PEDIDOS</h3>
                <a href="#"><i class="fas fa-clipboard-list fa-8x"></i></a>
            </div>
            <div class="usuarios">
                <h3>MENU</h3>
                <a href="../administrador/usuarios.php"><i class="fas fa-concierge-bell fa-8x"></i></a>
               
            </div>
            <div class="usuarios">
                <h3>CUENTA</h3>
                <i class="fas fa-user-circle fa-8x"></i>
            </div>
        </div>
    </div>
    

<!-- JS -->
<?php
    include '../../html/footer.php';
?>