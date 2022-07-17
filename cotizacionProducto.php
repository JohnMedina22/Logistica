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
    <!-- <link rel="stylesheet" href="../style/styles.css"> -->
    <link rel="stylesheet" href="style/stylesIdv.css">
    <title>Proyecto</title>
</head>

<body style="min-height: 100%;">
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
                        <a class="nav-link" aria-current="page" href="./reporte.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./analisis.php">Analisis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./cotizaciones.php">Cotizaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./cotizacionProducto.php">Cotizacion producto</a>
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
    <!-- MAIN  -->
    <form action="php/cotizacion_producto.php" id="frm" method="post" class="d-flex flex-column align-items-center">
        <h1 class="text-center mt-5">Cotizaciones Productos</h1>
        <div class="d-flex mt-5 justify-content-between w-50">
            <div>
                <label for="NroC">Nro. item</label>
                <input id="NroC" name="item" class="form-control" placeholder="0" type="number"/>
            </div>
            <div class="d-flex flex-column me-3 w-50" style="margin-left: 10px;">

                <label for="producto">Cod. Producto</label>
                <select id="codigo" name="codigo" class="form-select">

                <?php
                    $sql = "SELECT * FROM producto";
                    $resultado = $conexion->query($sql);

                    while ($row = $resultado->fetch_assoc()) {

                        $codigo = $row['codigo'];

                    ?>
                        <option value="<?php echo $codigo?>"><?php echo $codigo ?></option>

                <?php } ?>

                </select>
            </div>
            <div class="d-flex justify-content-evenly">
                <div>
                    <label for="endDate">Producto</label>
                    <input id="nombre_producto" name="producto" class="form-control" type="text" readonly/>
                </div>
            </div>

        </div>
        <div class="d-flex mt-5 justify-content-between w-50">
   
            <div class="d-flex flex-column me-3 w-50">
                <label for="eMercancia">Estado Mercancia</label>
                <select name="estado" class="form-select">
                    <option value="Nueva">Nueva</option>
                    <option value="Usada">Usada</option>
                    <option value="Usada como nueva">Usada como nueva</option>
                </select>
            </div>

            <div class="d-flex flex-column me-3 w-50">
                <div>
                    <label for="endDate">Descripcion</label>
                    <input id="endDate" name="descripcion" class="form-control" type="text" />
                </div>
            </div>
            
            <div class="d-flex justify-content-evenly">
                <div>
                    <label for="endDate">Pais de origen</label>
                    <input id="endDate" name="pais_origen" class="form-control" type="text"/>
                </div>
            </div>

        </div>
        <div class="d-flex mt-5 justify-content-between w-50">
            <div class="d-flex flex-column me-3 w-50">
                <label for="eMercancia">Tip. Unid. Fisica</label>
                <select name="tipo_unidad" class="form-select">
                    <option value="general">general</option>
                    <option value="granel">granel</option>
                    <option value="peligrosa">peligrosa</option>
                    <option value="perecedera">perecedera</option>
                    <option value="fragil">frágil</option>
                </select>
            </div>
            
            <div class="d-flex flex-column me-3 w-50">
                <label for="cUniFisi">Cantidad Unid. Fisica</label>
                <input id="cUniFisi" name="cantidad_unidad" class="form-control" type="number" />
            </div>
            <div>
                <label for="kNetos">Kilos netos</label>
                <input id="kNetos" name="kilos" class="form-control" placeholder="0" type="number" />
            </div>

        </div>
        <div class="d-flex mt-5 justify-content-between w-50">
            <div>
                <label for="tDolares">Total Dolares</label>
                <input id="tDolares" name="total" class="form-control" placeholder="0" type="number" />
            </div>
        </div>
        <div class="d-flex mt-4 w-50 mt-5">
            <button class="btn btn-outline-dark me-3 pb-4" style="width: 100px;height: 30px;">Guardar</button>
            <a href="reporte.php" class="btn btn-outline-dark pb-4" style="width: 100px;height: 30px;">Cancelar</a>
        </div>
    </form>

    <script src="js/script-productos.js"></script>
</body>

</html>