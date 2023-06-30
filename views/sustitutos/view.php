<?php
include '../header.php';
include_once '../../controllers/sustitutosController.php';
//verificamos si se ha proporcionado el documento del sustituto
$documento = $_GET['documento'];

//instanciamos el controlador para llamar la funcion de ver
$sustituto_obj = new SustitutoController();
$sustituto = $sustituto_obj->view($documento);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver sustituto sustituto</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <?php
    //instanciamos el controlador
    $sustituto_obj = new SustitutoController();
    ?>
    <div class="container">
        <h2>Datos del sustituto Sustituto</h2>
        <a class='btn btn-danger m-3' href='index.php' role='button'>Volver</a>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="documento">Documento</label>
                    <input type="number" class="form-control" name="documento" value="<?php echo $sustituto->documento_sus; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" name="direccion" value="<?php echo $sustituto->direccion_sus; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" name="ciudad" value="<?php echo $sustituto->ciudad_sus; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="codigoPostal">Codigo Postal</label>
                    <input type="text" class="form-control" name="codigoPostal" value="<?php echo $sustituto->codigoPostal_sus; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tipo">Numero de Matricula Profesional</label>
                    <input type="text" class="form-control" name="matriculaProfesional" value="<?php echo $sustituto->matriculaProfesional_sus; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="fechaBaja">Fecha de Baja</label>
                    <input type="date" class="form-control" name="fechaBaja" value="<?php echo $sustituto->fechaBaja_sus; ?>" readonly>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $sustituto->nombre_sus; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" name="telefono" value="<?php echo $sustituto->telefono_sus; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="departamento">Departamento</label>
                    <input type="text" class="form-control" name="departamento" value="<?php echo $sustituto->departamento_sus; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="seguridadSocial">Numero de seguridad social</label>
                    <input type="number" class="form-control" name="seguridadSocial" value="<?php echo $sustituto->seguridadSocial_sus; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tipo">Fecha de Alta</label>
                    <input type="date" class="form-control" name="fechaAlta" value="<?php echo $sustituto->fechaAlta_sus; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="estadoVacaciones">Estado de vacaciones</label>
                    <input type="text" class="form-control" name="estadoVacaciones" value="<?php echo $sustituto->estadoVacaciones_sus; ?>" readonly>
                </div>
            </div>
        </div>
    </div>
</body>

</html>