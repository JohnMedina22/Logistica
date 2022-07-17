<?php
require_once './php/conexion_be.php';
session_start();

$init = false;

if (isset($_SESSION['usuario'])) {
    $init = true;

    $query = "SELECT * FROM usuarios";
    $ejecutar = mysqli_query($conexion, $query);

    while ($linea = mysqli_fetch_array($ejecutar)) {
        if ($linea['usuario'] == $_SESSION['usuario']) {

            $nombre = $linea['nombre'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/styles.css">
    <title>Proyecto</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./reporte.php">Carga & Logística Perú S.A.C</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="./reporte.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./analisis.php">Analisis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./cotizaciones.php">Cotizaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./cotizacionProducto.php">Cotizacion Producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./Reporte-estimacion.php">Reporte de Estimacion de llegada</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <?php echo $nombre ?>
                </span>
                <div class="horizontalgap" style="width:10px"></div>
                <a style="text-decoration: none;" href="php/cerrar_sesion.php" class="navbar-text">
                    Cerrar Sesion
                </a>
            </div>
        </div>
    </nav>
    <!-- MAIN -->

    <form action="" method="POST" class="d-flex flex-column align-items-center">
        <h1 class="text-center mt-5">Reporte de Estimacion de Llegado</h1>

        <div class="d-flex flex-column w-25">
            <label for="pais">Pais</label>
            <input id="pais" name="pais" class="form-control" type="text" />
        </div>

        <div class="d-flex flex-column mt-3 w-25">
            <label for="Puerto">Puerto</label>
            <select name="puerto" class="form-select">
                <option value="Peru">Peru</option>
                <option value="Mexico">Mexico</option>
            </select>
        </div>

        <div class="d-flex flex-column mt-3 w-25">
            <label for="fechaEm">Fecha de Embarque</label>
            <input id="fechaEm" name="fecha" class="form-control" type="date" />
        </div>

        <button class="btn btn-outline-dark pb-4 mt-5" style="width: 100px;height: 30px;" onclick="estimar(event)">Estimar</button>

        <div class="d-flex mt-5 justify-content-between w-50">

            <div class="d-flex flex-column">
                <label for="fechaEstimada">Fecha estimada de llegada</label>
                <input id="fechaEstimada" class="form-control" type="text" readonly />
            </div>

            <div class="d-flex flex-column">
                <label for="tiempoPro">Tiempo promedio de llegada</label>
                <input id="tiempoPro" value="21 dias" class="form-control" type="text" readonly />
            </div>

        </div>
    </form>

    <script>
        function estimar(e) {
            e.preventDefault();
            let fEmbarque = document.querySelector("#fechaEm").value;
            let date = new Date(fEmbarque)
            date.setDate(date.getDate() + 23);
            document.querySelector("#fechaEstimada").value = date.toLocaleString().split(",")[0];
        }
    </script>
</body>

</html>