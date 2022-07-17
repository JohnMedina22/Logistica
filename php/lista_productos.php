<?php
    include 'conexion_be.php';

    if(isset($_POST)){
        $codigo = $_POST['codigo'];

        $sql = "SELECT * FROM producto WHERE codigo = $codigo";
        $resultado = $conexion->query($sql);

        while ($row = $resultado->fetch_assoc()) {
            $nombre = $row['nombre'];
        }

        echo $nombre;
    }

?>