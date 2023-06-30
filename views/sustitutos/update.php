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
    <title>Editar sustituto Sustituto</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <?php
    //instanciamos el controlador
    $sustituto_obj = new SustitutoController();
    ?>
    <div class="container">
        <h2>Editar sustituto Sustituto</h2>
        <a class='btn btn-danger m-3' href='index.php' role='button'>Cancelar</a>
        <form method="post">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="documento">Documento</label>
                        <input type="number" class="form-control" name="documento" value="<?php echo $sustituto->documento_sus; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" name="direccion" value="<?php echo $sustituto->direccion_sus; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" value="<?php echo $sustituto->ciudad_sus; ?>">
                    </div>
                    <div class="form-group">
                        <label for="codigoPostal">Codigo Postal</label>
                        <input type="text" class="form-control" name="codigoPostal" value="<?php echo $sustituto->codigoPostal_sus; ?>">
                    </div>
                    <div class="form-group">
                        <label for="matriculaProfesional">Matricula Profesional</label>
                        <input type="number" class="form-control" name="matriculaProfesional" value="<?php echo $sustituto->matriculaProfesional_sus; ?>">
                    </div>
                    <div class="form-group">
                        <label for="fechaBaja">Fecha de Baja</label>
                        <input type="date" class="form-control" name="fechaBaja" value="<?php echo $sustituto->fechaBaja_sus ?>">

                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $sustituto->nombre_sus; ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" name="telefono" value="<?php echo $sustituto->telefono_sus; ?>">
                    </div>
                    <div class="form-group">
                        <label for="departamento">Departamento</label>
                        <input type="text" class="form-control" name="departamento" value="<?php echo $sustituto->departamento_sus; ?>">
                    </div>
                    <div class="form-group">
                        <label for="seguridadSocial">Numero de seguridad social</label>
                        <input type="number" class="form-control" name="seguridadSocial" value="<?php echo $sustituto->seguridadSocial_sus; ?>">
                    </div>
                    <div class="form-group">
                        <label for="fechaAlta">Fecha de Alta</label>
                        <input type="date" class="form-control" name="fechaAlta" value="<?php echo $sustituto->fechaAlta_sus ?>">
                    </div>
                    <div class="form-group">
                        <label for="estadoVacaciones">Seleccione el estado de vacaciones</label>
                        <select name="estadoVacaciones" class="form-control">
                            <option selected><?php echo $sustituto->estadoVacaciones_sus; ?></option>
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
            $mat=$_POST["matriculaProfesional"];
            $fea = $_POST["fechaAlta"];
            $feb = $_POST["fechaBaja"];
            $est = $_POST["estadoVacaciones"];

            $sustituto_obj->update($doc,$doc, $nom, $dir, $tel, $ciu, $dep, $cod, $seg, $mat, $fea, $feb, $est);
            
            // Establecer el mensaje de la alerta
            $alertMessage = 'Medico sustituto actualizado exitosamente';
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