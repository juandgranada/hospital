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
    <title>Editar Medico</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <?php
    //instanciamos el controlador
    $medico_obj = new MedicoController();
    ?>
    <div class="container">
        <h2>Editar Medico</h2>
        <a class='btn btn-danger m-3' href='index.php' role='button'>Cancelar</a>
        <form method="post">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="documento">Documento</label>
                        <input type="number" class="form-control" name="documento" value="<?php echo $medico->documento_med; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" name="direccion" value="<?php echo $medico->direccion_med; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" value="<?php echo $medico->ciudad_med; ?>">
                    </div>
                    <div class="form-group">
                        <label for="codigoPostal">Codigo Postal</label>
                        <input type="text" class="form-control" name="codigoPostal" value="<?php echo $medico->codigoPostal_med; ?>">
                    </div>
                    <div class="form-group">
                        <label for="matriculaProfesional">Matricula Profesional</label>
                        <input type="number" class="form-control" name="matriculaProfesional" value="<?php echo $medico->matriculaProfesional_med; ?>">
                    </div>
                    <div class="form-group">
                        <label for="estadoVacaciones">Seleccione el estado de vacaciones</label>
                        <select name="estadoVacaciones" class="form-control">
                            <option selected><?php echo $medico->estadoVacaciones_med; ?></option>
                            <option value="No disponbles">No disponibles</option>
                            <option value="Programadas">Programadas</option>
                            <option value="Ya disfrutadas">Ya disfrutadas</option>
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $medico->nombre_med; ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" name="telefono" value="<?php echo $medico->telefono_med; ?>">
                    </div>
                    <div class="form-group">
                        <label for="departamento">Departamento</label>
                        <input type="text" class="form-control" name="departamento" value="<?php echo $medico->departamento_med; ?>">
                    </div>
                    <div class="form-group">
                        <label for="seguridadSocial">Numero de seguridad social</label>
                        <input type="number" class="form-control" name="seguridadSocial" value="<?php echo $medico->seguridadSocial_med; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo de medico</label>
                        <select name="tipo" class="form-control">
                            <option selected><?php echo $medico->tipo_med ?></option>
                            <option value="Titular">Titular</option>
                            <option value="Interino">Interino</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" name="update">Editar</button>
        </form>
        <?php
        $alertMessage="";

        if (isset($_POST["update"])) {
            $doc = $_POST["documento"];
            $nom = $_POST["nombre"];
            $dir = $_POST["direccion"];
            $tel = $_POST["telefono"];
            $ciu = $_POST["ciudad"];
            $dep = $_POST["departamento"];
            $cod = $_POST["codigoPostal"];
            $seg = $_POST["seguridadSocial"];
            $mat=$_POST["matriculaProfesional"];
            $tip = $_POST["tipo"];
            $est = $_POST["estadoVacaciones"];

            $medico_obj->update($doc,$doc, $nom, $dir, $tel, $ciu, $dep, $cod, $seg, $mat, $tip, $est);
            
            // Establecer el mensaje de la alerta
            $alertMessage = 'Medico actualizado exitosamente';
        }
        // Verificar si se debe redirigir al index
        if (!empty($alertMessage)) {
            echo "<script>alert('$alertMessage'); window.location.href = 'index.php';</script>";
            exit();
        }
        ?>
    </div>
</body>

</html>