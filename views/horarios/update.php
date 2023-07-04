<?php
include '../header.php';
include_once '../../controllers/horariosController.php';
include_once '../../controllers/medicosController.php';
//verificamos si se ha proporcionado el id del horario
$id = $_GET['id'];

//instanciamos el controlador para llamar la funcion de ver
$horario_obj = new HorarioController();
$horario = $horario_obj->view($id);

//Instancio la clase medicos para poder verlos en el select medico
$medico_obj = new MedicoController();
$medicos = $medico_obj->list();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Horarios</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <?php
    //instanciamos el controlador
    $horario_obj = new HorarioController();
    ?>
    <div class="container">
        <h2>Editar Horario</h2>
        <a class='btn btn-danger m-3' href='index.php' role='button'>Cancelar</a>
        <form method="post">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="documento">ID</label>
                        <input type="number" class="form-control" name="id" value="<?php echo $horario->id; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dia</label>
                        <select name="dia" class="form-control">
                            <option selected><?php echo $horario->dia; ?></option>
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miercoles">Miercoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                            <option value="Sabado">Sabado</option>
                            <option value="Domingo">Domingo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Hora de fin del turno: Formato 24h</label>
                        <input type="time" class="form-control" name="horaFinal" value="<?php echo $horario->hora_fin; ?>">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="medicoID">Medico</label>
                        <select name="medicoID" class="form-control">
                            <option selected><?php echo $horario->medicoID ?></option>
                            <?php
                            foreach ($medicos as $item) {
                                echo "<option value='" . $item->documento_med . "'>" . $item->nombre_med . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="horaFinal">Hora de inicio del turno: Formato 24h</label>
                        <input type="time" class="form-control" name="horaFinal" value="<?php echo $horario->hora_inicio; ?>">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" name="update">Editar</button>
        </form>
        <?php
        $alertMessage = "";

        if (isset($_POST["update"])) {
            $id = $_POST["id"];
            $med = $_POST["medicoID"];
            $dia = $_POST["dia"];
            $hoi = $_POST["horaInicio"];
            $hof = $_POST["horaFinal"];

            $paciente_obj->update($id, $id, $med, $dia, $hoi, $hof);

            // Establecer el mensaje de la alerta
            $alertMessage = 'Horario actualizado exitosamente';
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