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
  <link rel="stylesheet" href="../style/stylesIdv.css">
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
            <a class="nav-link  active" href="./analisis.php">Analisis</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./cotizaciones.php">Cotizacion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./cotizacionProducto.php">Cotizacion Producto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./Reporte-estimacion.php">Reporte de Estimacion de llegada</a>
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

  <div class="d-flex flex-column">
    <h1 class="text-center mt-5">Reporte de Analisis de Cotizacion</h1>
    <div class="d-flex mt-5 justify-content-evenly">

      <div>
        <h2 class="text-center">Evaluacion segun costos</h2>
        <div class="mx-5 mt-5">
          <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">Nro Cotizacion</th>
                  <th scope="col">Total tributos</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $sql = "SELECT * FROM cotizacion WHERE sw=1 ORDER BY total";
                $resultado = $conexion->query($sql);

                while ($row = $resultado->fetch_assoc()) {

                  $id_cotizacion = $row['id_cotizacion'];

                  $nro_item = $row['nro_item'];
                  $partida = $row['pais_origen'];
                  $descripcion = $row['descripcion'];
                  $tipo_unidad = $row['tip_unid_fisica'];
                  $kilos = $row['kilos_netos'];
                  $total = $row['total'];

                ?>
                  <tr>
                    <td><?php echo $id_cotizacion ?></td>
                    <td><?php echo $total ?></td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>

        </div>
      </div>
      <div>
        <h2 class="text-center">Evaluacion segun fecha estimada de llegada</h2>
        <div class="mx-5 mt-5">
          <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">Nro Cotizacion</th>
                  <th scope="col">Total tributos</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $sql = "SELECT * FROM cotizacion WHERE sw=1";
                $resultado = $conexion->query($sql);

                while ($row = $resultado->fetch_assoc()) {

                  $id_cotizacion = $row['id_cotizacion'];

                  $nro_item = $row['nro_item'];
                  $partida = $row['pais_origen'];
                  $descripcion = $row['descripcion'];
                  $tipo_unidad = $row['tip_unid_fisica'];
                  $kilos = $row['kilos_netos'];
                  $total = $row['total'];

                ?>
                  <tr>
                    <td><?php echo $id_cotizacion ?></td>
                    <td><?php echo $total ?></td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    
    <div class="d-flex mt-5 justify-content-evenly">

      <div>
        <p style="color: black;">Informacion a considerar</p>
        <textarea style="width: 1250px;height: 150px; background: #e0e0e0; padding: 5px 10px" name="" id="" cols="30" rows="10"><?php
        $sql = "SELECT * FROM cotizacion WHERE sw=1";
        $resultado = $conexion->query($sql);
        while ($row = $resultado->fetch_assoc()) {
          $id_cotizacion = $row['id_cotizacion'];
          $nro_item = $row['nro_item'];
          $partida = $row['pais_origen'];
          $descripcion = $row['descripcion'];
          $tipo_unidad = $row['tip_unid_fisica'];
          $kilos = $row['kilos_netos'];
          $total = $row['total'];
        ?>la cotización <?php echo $id_cotizacion ?> tiene de total: <?php echo $total,"\n"?><?php } ?>
      </textarea>
      </div>
      
    </div>
  </div>
</body>

</html>