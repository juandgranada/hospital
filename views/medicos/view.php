<?php
include '../header.php';
include_once '../../controllers/medicosController.php';
//verificamos si se ha proporcionado el documento del medico
$documento = $_GET['documento'];

//instanciamos el controlador para llamar la funcion de ver
$medico_obj = new MedicoController();
$medico = $medico_obj->view($documento);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver medico</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <?php
    //instanciamos el controlador
    $medico_obj = new MedicoController();
    ?>
    <div class="container">
        <h2>Datos del Medico</h2>
        <a class='btn btn-danger m-3' href='index.php' role='button'>Volver</a>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="documento">Documento</label>
                    <input type="number" class="form-control" name="documento" value="<?php echo $medico->documento_med; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" name="direccion" value="<?php echo $medico->direccion_med; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" name="ciudad" value="<?php echo $medico->ciudad_med; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="codigoPostal">Codigo Postal</label>
                    <input type="text" class="form-control" name="codigoPostal" value="<?php echo $medico->codigoPostal_med; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tipo">Numero de Matricula Profesional</label>
                    <input type="text" class="form-control" name="matriculaProfesional" value="<?php echo $medico->matriculaProfesional_med; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="estadoVacaciones">Estado de vacaciones</label>
                    <input type="text" class="form-control" name="estadoVacaciones" value="<?php echo $medico->estadoVacaciones_med; ?>" readonly>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $medico->nombre_med; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" name="telefono" value="<?php echo $medico->telefono_med; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="departamento">Departamento</label>
                    <input type="text" class="form-control" name="departamento" value="<?php echo $medico->departamento_med; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="seguridadSocial">Numero de seguridad social</label>
                    <input type="number" class="form-control" name="seguridadSocial" value="<?php echo $medico->seguridadSocial_med; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo de medico</label>
                    <input type="text" class="form-control" name="tipo" value="<?php echo $medico->tipo_med; ?>" readonly>
                </div>
            </div>
        </div>
    </div>
</body>

</html>