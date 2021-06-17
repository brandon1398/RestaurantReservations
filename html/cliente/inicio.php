<?php
    if(!isset($_SESSION["validarIngreso"])){
        echo '<script>
            window.history.replaceState(null, null, window.location.href);
        </script>';
        return ;
    }else{
        if($_SESSION["validarIngreso"] != "ok"){
            echo '<script>
                window.history.replaceState(null, null, window.location.href);
            </script>';
            return;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>cliente</h1>

</body>
</html>