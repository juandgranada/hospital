<?php
include '../header.php';
include_once '../../controllers/empleadosController.php';
//verificamos si se ha proporcionado el documento del empleado
$documento = $_GET['documento'];

//instanciamos el controlador para llamar la funcion de ver
$empleado_obj = new EmpleadoController();
$empleado = $empleado_obj->view($documento);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Empleado</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <?php
    //instanciamos el controlador
    $empleado_obj = new EmpleadoController();
    ?>
    <div class="container">
        <h2>Datos del empleado</h2>
        <a class='btn btn-danger m-3' href='index.php' role='button'>Volver</a>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="documento">Documento</label>
                    <input type="number" class="form-control" name="documento" value="<?php echo $empleado->documento_emp; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" name="direccion" value="<?php echo $empleado->direccion_emp; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" name="ciudad" value="<?php echo $empleado->ciudad_emp; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="codigoPostal">Codigo Postal</label>
                    <input type="text" class="form-control" name="codigoPostal" value="<?php echo $empleado->codigoPostal_emp; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo de empleado</label>
                    <input type="text" class="form-control" name="tipo" value="<?php echo $empleado->tipo_emp; ?>" readonly>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $empleado->nombre_emp; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" name="telefono" value="<?php echo $empleado->telefono_emp; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="departamento">Departamento</label>
                    <input type="text" class="form-control" name="departamento" value="<?php echo $empleado->departamento_emp; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="seguridadSocial">Numero de seguridad social</label>
                    <input type="number" class="form-control" name="seguridadSocial" value="<?php echo $empleado->seguridadSocial_emp; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="estadoVacaciones">Estado de vacaciones del empleado</label>
                    <input type="text" class="form-control" name="estadoVacaciones" value="<?php echo $empleado->estadoVacaciones_emp; ?>" readonly>
                </div>
            </div>
        </div>
    </div>
</body>

</html>