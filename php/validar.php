<?php
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $telefono=$_POST['telefono'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    include('../php/db.php');
    
    $consulta = "INSERT INTO usuarios (nombre_usuario, apellido_usuario, telefono_usuario,email_usuario,password_usuario,status_usuario,id_rol_fk) VALUES ('$nombre', '$apellido', '$telefono','$email','$password','1','2')";
    if (mysqli_query($conexion, $consulta)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    
?>