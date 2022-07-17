<?php
    include 'conexion_be.php';

    if(isset($_POST)){
        $inicio = $_POST['startDate'];
        $fin = $_POST['endDate'];

        $sql = "SELECT * FROM detalles_cot WHERE fecha_emision BETWEEN '$inicio' AND '$fin'";
        $resultado = $conexion->query($sql);

        $vector=[];

        while ($row = $resultado->fetch_assoc()) {

            $id_cotizacion = $row['id_cotizacion'];
            $fecha_emision = $row['fecha_emision'];
            $proveedor = $row['proveedor'];
            $incoterm = $row['incoterm'];
            $moneda = $row['moneda'];

            print_r($row);
        }
    }

?>