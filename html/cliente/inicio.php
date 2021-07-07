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

    include 'header.php';
?>


<!-- footer -->
<!-- <?php
    include "../../html/footer.php";
?> -->