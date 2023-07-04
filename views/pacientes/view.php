<?php
include '../header.php';
include_once '../../controllers/pacientesController.php';
//verificamos si se ha proporcionado el documento del empleado
$documento = $_GET['documento'];

//instanciamos el controlador para llamar la funcion de ver
$paciente_obj = new PacienteController();
$paciente = $paciente_obj->view($documento);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Paciente</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <?php
    //instanciamos el controlador
    $paciente_obj = new PacienteController();
    ?>
    <div class="container">
        <h2>Datos del paciente</h2>
        <a class='btn btn-danger m-3' href='index.php' role='button'>Volver</a>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="documento">Documento</label>
                    <input type="number" class="form-control" name="documento" value="<?php echo $paciente->documento_pac; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" name="direccion" value="<?php echo $paciente->direccion_pac; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" name="ciudad" value="<?php echo $paciente->ciudad_pac; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="codigoPostal">Codigo Postal</label>
                    <input type="text" class="form-control" name="codigoPostal" value="<?php echo $paciente->codigoPostal_pac; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tipo">Medico que lo atiende</label>
                    <input type="text" class="form-control" name="medicoID" value="<?php echo $paciente->medicoID ?>" readonly>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $paciente->nombre_pac; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" name="telefono" value="<?php echo $paciente->telefono_pac; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="departamento">Departamento</label>
                    <input type="text" class="form-control" name="departamento" value="<?php echo $paciente->departamento_pac; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="seguridadSocial">Numero de seguridad social</label>
                    <input type="number" class="form-control" name="seguridadSocial" value="<?php echo $paciente->seguridadSocial_pac; ?>" readonly>
                </div>
            </div>
        </div>
    </div>
</body>

</html>