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
  <link rel="stylesheet" href="style/stylesIdv.css">
  <title>Proyecto</title>
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="./reporte.html">Carga & Logística Perú S.A.C</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./reporte.php">Home</a>
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
            <a class="nav-link " href="./Reporte-estimacion.php">Reporte de Estimacion de llegada</a>
          </li>
        </ul>
        <span class="navbar-text">
          <?php echo $nombre ?>
        </span>
        <div class="horizontalgap" style="width:10px"></div>
        <a style="text-decoration: none; margin-left: 20px" href="php/cerrar_sesion.php" class="navbar-text">
          Cerrar sesion
        </a>
      </div>
    </div>
  </nav>
  <!-- MAIN  -->
  <div class="d-flex flex-column">
    <h1 class="text-center mt-5">Reporte de Analisis de Cotizacion</h1>
    <form action="" id="frm" class="d-flex mt-5 justify-content-evenly">

      <div>
        <label for="startDate">Fch. Emision Inicio</label>
        <input name="startDate" class="form-control" type="date" />
      </div>
      <div class="d-flex justify-content-evenly w-25">
        <div>
          <label for="endDate">Fch. Emision Fin</label>
          <input name="endDate" class="form-control" type="date" />
        </div>
        <div class="d-flex flex-column justify-content-end">
          <input type="button" value="Filtrar" class="btn btn-outline-dark pb-4" id="filtrar" style="width: 100px;height: 30px;" />
        </div>
      </div>

    </form>

    <div class="mx-5 mt-5">
      <div class="table-wrapper-scroll-y my-custom-scrollbar-report">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">Nro Cotizacion</th>
              <th scope="col">Fch Cotizacion</th>
              <th scope="col">Proveedor</th>
              <th scope="col">Incoterm</th>
              <th scope="col">Mon. Transaccion</th>
            </tr>
          </thead>
          <tbody id="tbody">

            <?php
            $sql = "SELECT * FROM detalles_cot";
            $resultado = $conexion->query($sql);

            while ($row = $resultado->fetch_assoc()) {

              $id_detalle = $row['id_detalle'];

              $id_cotizacion = $row['id_cotizacion'];
              $fecha_emision = $row['fecha_emision'];
              $proveedor = $row['proveedor'];
              $incoterm = $row['incoterm'];
              $moneda = $row['moneda'];


            ?>
              <tr>

                <td><?php echo $id_cotizacion ?></td>
                <td><?php echo $fecha_emision ?></td>
                <td><?php echo $proveedor ?></td>
                <td><?php echo $incoterm ?></td>
                <td><?php echo $moneda ?></td>
                
              </tr>
            <?php } ?>

            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>

  <script src="js/script-filtro.js?1"></script>
</body>

</html>