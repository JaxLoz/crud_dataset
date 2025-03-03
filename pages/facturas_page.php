<?php

include("../conexion.php");
include("../menu.html");

$con = conectar();

$sql = "SELECT f.id_factura,c.nombre,f.fecha FROM factura f JOIN cliente c on f.id_cliente=c.id_cliente";
$query = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Facturas</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href=" https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cliente').DataTable({
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ]
            });
        });
    </script>
</head>
<script type="text/javascript">
    function confirmDelete() {

        var respuesta = confirm("Seguro que desea borrar?");
        if (respuesta == true) {
            alert("Registro Borrado");
            return true;
        } else {
            alert("Ha decidido no borrar el registro");
            return false;
        }
    }
</script>

<body>
    <div class="content">
        <div class="container mt-5">
            <div class="row">

                <div class="col-md-3">
                    <h1><span class="badge bg-warning">Nueva Factura</span></h1>
                    <form action="../insert/insert_factura.php" method="POST">

                        <input type="date" class="form-control mb-3" name="fec">
                        <input type="number" class="form-control mb-3" name="idc" placeholder="ID Cliente">

                        <input type="submit" class="btn btn-primary" value="Registrar">

                    </form>
                </div>

                <div class="col-md-8">
                    <table id="Factura" class="table table-dark table-striped table-bordered shadow-lg mt-4" style="width:100%">
                        <thead class="bg-warning">
                            <tr align="center">
                                <th color=green>ID Factura</th>
                                <th>Cliente</th>
                                <th>Fecha De Compra</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                <th>Cargar</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <th><?php echo $row['id_factura'] ?></th>
                                    <th><?php echo $row['nombre'] ?></th>
                                    <th><?php echo $row['fecha'] ?></th>
                                    <th style="text-align:center"><a href="actualizar.php?id_factura=<?php echo $row['id_factura'] ?>"> <button type="button" class="btn btn-info">Editar</button></a></th>
                                    <th style="text-align:center"><a href="../delete/delete_factura.php?id_factura=<?php echo $row['id_factura'] ?>"> <button type="button" class="btn btn-danger" onclick="return confirmDelete()">Eliminar</button></a></th>
                                    <th style="text-align:center"><a href="../delete/delete_factura.php?id_factura=<?php echo $row['id_factura'] ?>"> <button type="button" class="btn btn-light" onclick="return confirmDelete()">Cargar</button></a></th>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- titulo de factura seleccionada  -->

            <div class="row">
                
                <h1><span class="badge bg-info">ID Factura Seleccionada: 1 // Cliente: Flacao // Fecha: 2022-07-07 </span></h1>
            </div>



            <!-- formulario de productos  -->

            <div class="row">

                <div class="col-md-3">
                    <h1><span class="badge bg-warning">Nuevo Producto</span></h1>
                    <form action="../insert/insert_factura.php" method="POST">

                        <input type="text" class="form-control mb-3" name="id_producto" placeholder="ID Producto">
                        <input type="text" class="form-control mb-3" name="cantidad" placeholder="Cantidad">
                        <input type="text" class="form-control mb-3" name="valor_unitario" placeholder="Valor Unitario">
                        <textarea  class="form-cotrol mb-3" name="descripcion" placeholder="Descripcion" cols="32" rows="10"></textarea>

                        <input type="submit" class="btn btn-primary" value="Registrar">

                    </form>
                </div>

                <div class="col-md-8">
                    <table id="Factura" class="table table-dark table-striped table-bordered shadow-lg mt-4" style="width:100%">
                        <thead class="bg-warning">
                            <tr align="center">
                                <th color=green>ID Producto</th>
                                <th>Cantidad</th>
                                <th>Valor Unitario</th>
                                <th>Descripcion</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <th><?php echo $row['id_factura'] ?></th>
                                    <th><?php echo $row['nombre'] ?></th>
                                    <th><?php echo $row['fecha'] ?></th>
                                    <th style="text-align:center"><a href="actualizar.php?id_factura=<?php echo $row['id_factura'] ?>"> <button type="button" class="btn btn-info">Editar</button></a></th>

                                    <th style="text-align:center"><a href="../delete/delete_factura.php?id_factura=<?php echo $row['id_factura'] ?>"> <button type="button" class="btn btn-danger" onclick="return confirmDelete()">Eliminar</button></a></th>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    </div>
</body>

</html>