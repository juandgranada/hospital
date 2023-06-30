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
    <title>Editar Empleado</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <?php
    //instanciamos el controlador
    $empleado_obj = new EmpleadoController();
    ?>
    <div class="container">
        <h2>Editar Empleado</h2>
        <a class='btn btn-danger m-3' href='index.php' role='button'>Cancelar</a>
        <form method="post">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="documento">Documento</label>
                        <input type="number" class="form-control" name="documento" value="<?php echo $empleado->documento_emp; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" name="direccion" value="<?php echo $empleado->direccion_emp; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" value="<?php echo $empleado->ciudad_emp; ?>">
                    </div>
                    <div class="form-group">
                        <label for="codigoPostal">Codigo Postal</label>
                        <input type="text" class="form-control" name="codigoPostal" value="<?php echo $empleado->codigoPostal_emp; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo de empleado</label>
                        <select name="tipo" class="form-control">
                            <option selected><?php echo $empleado->tipo_emp ?></option>
                            <option value="ATS">ATS</option>
                            <option value="ATS de zona">ATS de zona</option>
                            <option value="Auxiliar de enfermeria">Auxiliar de enfermeria</option>
                            <option value="Celador">Celador</option>
                            <option value="Aministrativo">Aministrativo</option>
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $empleado->nombre_emp; ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" name="telefono" value="<?php echo $empleado->telefono_emp; ?>">
                    </div>
                    <div class="form-group">
                        <label for="departamento">Departamento</label>
                        <input type="text" class="form-control" name="departamento" value="<?php echo $empleado->departamento_emp; ?>">
                    </div>
                    <div class="form-group">
                        <label for="seguridadSocial">Numero de seguridad social</label>
                        <input type="number" class="form-control" name="seguridadSocial" value="<?php echo $empleado->seguridadSocial_emp; ?>">
                    </div>
                    <div class="form-group">
                        <label for="estadoVacaciones">Seleccione el estado de vacaciones del empleado</label>
                        <select name="estadoVacaciones" class="form-control">
                            <option selected><?php echo $empleado->estadoVacaciones_emp; ?></option>
                            <option value="No disponbles">No disponibles</option>
                            <option value="Programadas">Programadas</option>
                            <option value="Ya disfrutadas">Ya disfrutadas</option>
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
            $tip = $_POST["tipo"];
            $est = $_POST["estadoVacaciones"];

            $empleado_obj->update($doc,$doc, $nom, $dir, $tel, $ciu, $dep, $cod, $seg, $tip, $est);
            
            // Establecer el mensaje de la alerta
            $alertMessage = 'Empleado actualizado exitosamente';
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