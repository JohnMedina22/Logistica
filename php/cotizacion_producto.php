<?php
    include 'conexion_be.php';

    $item = $_POST['item'];
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];
    $tipo_unidad = $_POST['tipo_unidad'];
    $cantidad_unidad = $_POST['cantidad_unidad'];
    $kilos = $_POST['kilos'];
    $total = $_POST['total'];
    $pais_origen = $_POST['pais_origen'];

    $id_cotizacion = rand(100000, 999999);
    $total = $total+($total*0.1);


    $query = "INSERT INTO `cotizacion`( `id_cotizacion`, `codigo_producto`, `nro_item`, `descripcion`, `estado`, `pais_origen`, `tip_unid_fisica`, `cant_unid_fisica`, `kilos_netos`, `total`) 
                VALUES ('$id_cotizacion','$codigo','$item','$descripcion','$estado','$pais_origen','$tipo_unidad','$cantidad_unidad','$kilos','$total')";        

    $ejecutar = mysqli_query($conexion, $query);

    
    header("location: ../cotizaciones.php");
?>