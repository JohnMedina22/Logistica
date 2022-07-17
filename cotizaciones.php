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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="../style/styles.css"> -->
    <link rel="stylesheet" href="../style/stylesIdv.css">
    <title>Proyecto</title>
</head>

<body style="min-height: 100%;">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./reporte.php">Carga & Logística Perú S.A.C</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link active" href="./cotizaciones.php">Cotizaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./cotizacionProducto.php">Cotizacion producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./Reporte-estimacion.php">Reporte de Estimacion de llegada</a>
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
    <form action="php/detalle_cotizacion.php" method="POST" class="d-flex flex-column align-items-center">
        <h1 class="text-center mt-5">Cotizaciones</h1>
        <div class="d-flex mt-5 justify-content-between w-50">
            
            <div class="d-flex flex-column w-25">
                <label for="NroC">Nro. Cotizacion</label>
                <select name="cotizacion" class="form-select" aria-label="Default select example">
                    
                    <?php
                    $sql = "SELECT * FROM cotizacion WHERE sw=0";
                    $resultado = $conexion->query($sql);

                    while ($row = $resultado->fetch_assoc()) {

                        $id_cotizacion = $row['id_cotizacion'];

                    ?>
                        <option value="<?php echo $id_cotizacion ?>"> <?php echo $id_cotizacion ?></option>

                    <?php } ?>
                    
                </select>

            </div>
            <div>
                <label for="startDate">Fch. Emision</label>
                <input id="startDate" name="fecha_emision" class="form-control" type="date" />
            </div>
            <div class="d-flex justify-content-evenly">
                <div>
                    <label for="endDate">Fch. Vencimiento</label>
                    <input id="endDate" name="fecha_vencimiento" class="form-control" type="date" />
                </div>
            </div>

        </div>
        <div class="d-flex mt-4 w-50 justify-content-between">
            
            <div class="d-flex flex-column me-3 w-75">
                <label for="incoterm">Proveedor</label>
                <div class="input-group">
                    <input type="text" name="proveedor" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                  </div>
            </div>

            <div class="d-flex flex-column w-25">
                <label for="incoterm">Incoterm</label>
                <select name="incoterm" class="form-select" aria-label="Default select example">
                    <option value="EXW">EXW</option>
                    <option value="FCA">FCA</option>
                    <option value="CPT">CPT</option>
                    <option value="CIP">CIP</option>
                </select>

            </div>

        </div>
        <div class="d-flex mt-4 justify-content-between w-50">

            <div class="d-flex flex-column me-3 w-75">
                <label for="paisE">Pais de Embarque</label>
                <select name="pais" class="form-select" >
                    <option value="Peru">Peru</option>
                    <option value="Colombia">Colombia</option>
                </select>
            </div>
            <div class="d-flex flex-column w-25">
                <label for="puertoD">Puerto de Destino</label>
                <select name="puerto_destino" class="form-select" >
                    <option value="Duanas">Duanas</option>

                </select>

            </div>

        </div>
        <div class="d-flex mt-4 justify-content-between w-50">

            <div class="d-flex flex-column me-3 w-50">
                <label for="monedaT">Moneda de Transaccion</label>
                <select name="moneda" class="form-select" aria-label="Default select example">
                    <option value="Dolar">Dolar</option>
                    <option value="Euro">Euro</option>
                </select>
            </div>
            <div class="d-flex flex-column w-50 ">
                <div>
                    <label for="nContenedores">Nro Contenedores</label>
                    <input id="nContenedores" name="contenedores" class="form-control" type="text" />
                </div>
            </div>
        </div>

        <div class="d-flex mt-5 w-50">
            <button class="btn btn-outline-dark me-3 pb-4" style="width: 100px;height: 30px;">Confirmar</button>
        </div>
    </form>
        <div class="mx-5 mt-5">
            <div class="table-wrapper-scroll-y my-custom-scrollbar-report">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nro Cot</th>
                            <th scope="col">Nro item</th>
                            <th scope="col">Partida</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Unidad Fisica</th>
                            <th scope="col">Kilo Netos</th>
                            <th scope="col">Total dolares</th>
                            <th scope="col">Cotizacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        $sql = "SELECT * FROM cotizacion";
                        $resultado = $conexion->query($sql);

                        while ($row = $resultado->fetch_assoc()) {

                            $codigo_producto = $row['codigo_producto'];

                            $sql = "SELECT * FROM producto WHERE codigo = $codigo_producto";
                            $res = $conexion->query($sql);

                            while ($prod = $res->fetch_assoc()) {
                                $nombre_producto = $prod['nombre'];
                            }

                            $id_cotizacion = $row['id_cotizacion'];

                            $nro_item = $row['nro_item'];
                            $partida = $row['pais_origen'];
                            $descripcion = $row['descripcion'];
                            $tipo_unidad = $row['tip_unid_fisica'];
                            $kilos = $row['kilos_netos'];
                            $total = $row['total'];
                            $sw = ($row['sw']==0) ? "Espera": "Confirmada";
                            
                        ?>
                            <tr>
                                <td><?php echo $id_cotizacion ?></td>
                                <td><?php echo $nro_item ?></td>
                                <td><?php echo $partida ?></td>
                                <td><?php echo $nombre_producto ?></td>
                                <td><?php echo $descripcion ?></td>
                                <td><?php echo $tipo_unidad ?></td>
                                <td><?php echo $kilos ?></td>
                                <td><?php echo $total ?></td>
                                <td><?php echo $sw ?></td>
                            </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>
            
            <!-- <div class="d-flex mt-4  w-50">
                <button class="btn btn-outline-dark me-3 pb-4" style="width: 100px;height: 30px;">Nuevo</button>
                <button class="btn btn-outline-dark me-3 pb-4" style="width: 100px;height: 30px;">Editar</button>
                <button class="btn btn-outline-dark me-3 pb-4" style="width: 100px;height: 30px;">Eliminar</button>
                <button class="btn btn-outline-dark me-3 pb-4" style="width: 100px;height: 30px;">Liberar</button>
                <button class="btn btn-outline-dark me-3 pb-4" style="width: 100px;height: 30px;">Exportar</button>
            </div> -->
        </div>


</body>

</html>