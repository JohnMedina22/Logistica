<?php

    include 'conexion_be.php';

    $ruc = $_POST['ruc'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $confPass = $_POST['password2'];
    
    $query = "INSERT INTO usuarios(ruc, correo, nombre, usuario, clave) VALUES('$ruc','$correo','$nombre','$user','$password')";


    if($password != $confPass){
        echo '
            <script>
                alert("Las contraseñas no coinciden");
                
                window.location = "../registro.php";
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if(!empty($ejecutar)){
        echo'
            <script>
                alert("Usuario registrado correctamente");

                window.location = "../index.html";
            </script>
        ';
    }
    else{
        echo'
            <script>
                alert("Hubo un problema con el registro, intente nuevament");
                window.location = "../registro.html";
            </script>
        ';
    }

    

?>