<?php
include '../header.php';
include_once '../../controllers/pacientesController.php';
include_once '../../controllers/medicosController.php';
//verificamos si se ha proporcionado el documento del paciente
$documento = $_GET['documento'];

//instanciamos el controlador para llamar la funcion de ver
$paciente_obj = new PacienteController();
$paciente = $paciente_obj->view($documento);

//Instancio la clase medicos para poder verlos en el select medico
$medico_obj=new MedicoController();
$medicos= $medico_obj->list();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <?php
    //instanciamos el controlador
    $paciente_obj = new PacienteController();
    ?>
    <div class="container">
        <h2>Editar Paciente</h2>
        <a class='btn btn-danger m-3' href='index.php' role='button'>Cancelar</a>
        <form method="post">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="documento">Documento</label>
                        <input type="number" class="form-control" name="documento" value="<?php echo $paciente->documento_pac; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" name="direccion" value="<?php echo $paciente->direccion_pac; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" value="<?php echo $paciente->ciudad_pac; ?>">
                    </div>
                    <div class="form-group">
                        <label for="codigoPostal">Codigo Postal</label>
                        <input type="text" class="form-control" name="codigoPostal" value="<?php echo $paciente->codigoPostal_pac; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tipo">Medico que lo atenderá</label>
                        <select name="medicoID" class="form-control">
                            <option value=selected><?php echo $paciente->medicoID ?></option>
                            <?php
                                foreach ($medicos as $item)
                                {
                                    echo "<option value='".$item->documento_med."'>".$item->documento_med."-".$item->nombre_med."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $paciente->nombre_pac; ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" name="telefono" value="<?php echo $paciente->telefono_pac; ?>">
                    </div>
                    <div class="form-group">
                        <label for="departamento">Departamento</label>
                        <input type="text" class="form-control" name="departamento" value="<?php echo $paciente->departamento_pac; ?>">
                    </div>
                    <div class="form-group">
                        <label for="seguridadSocial">Numero de seguridad social</label>
                        <input type="number" class="form-control" name="seguridadSocial" value="<?php echo $paciente->seguridadSocial_pac; ?>">
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
            $med = $_POST["medicoID"];

            $paciente_obj->update($doc,$doc, $nom, $dir, $tel, $ciu, $dep, $cod, $seg, $med);
            
            // Establecer el mensaje de la alerta
            $alertMessage = 'Paciente actualizado exitosamente';
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