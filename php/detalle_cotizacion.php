<?php
    include 'conexion_be.php';


    $cotizacion = $_POST['cotizacion'];
    $fecha_emision = $_POST['fecha_emision'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $proveedor = $_POST['proveedor'];
    $incoterm = $_POST['incoterm'];
    $pais = $_POST['pais'];
    $puerto_destino = $_POST['puerto_destino'];
    $moneda = $_POST['moneda'];
    $contenedores = $_POST['contenedores'];

    $id_cotizacion = 1;

    $query = "INSERT INTO detalles_cot(id_cotizacion, fecha_emision, fecha_vencimiento, proveedor, incoterm, pais_embarque, puerto_destino, moneda, n_contenedores)
                VALUES('$cotizacion', '$fecha_emision','$fecha_vencimiento','$proveedor', '$incoterm', '$pais', '$puerto_destino', '$moneda', '$contenedores')";

    $ejecutar = mysqli_query($conexion, $query);

    $query = "UPDATE `cotizacion` SET `sw`= 1 WHERE id_cotizacion = $cotizacion";

    $ejecutar = mysqli_query($conexion, $query);

    
    header("location: ../reporte.php");
?>