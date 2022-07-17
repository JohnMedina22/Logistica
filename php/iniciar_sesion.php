<?php

    include 'conexion_be.php';

    session_start();

    $user = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM usuarios WHERE usuario='$user' and clave='$password'";
    $validar_login = mysqli_query($conexion, $query);

    if(mysqli_num_rows($validar_login) > 0){

        $_SESSION['usuario'] = $user;
        echo '
            <script>
                window.location = "../reporte.php";
            </script>
        ';
    }
    else{
        echo '
            <script>
                window.location = "../index.html";
            </script>
        ';
    }

?>