<?php
include '../header.php';
include_once '../../controllers/horariosController.php';
include_once '../../controllers/medicosController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar nuevo horario</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <?php
    // Se crea una instancia de la clase EmpleadoController
    $horario_obj = new HorarioController();
    //Instancio la clase medicos para poder verlos en el select medico
    $medico_obj = new MedicoController();
    $medicos = $medico_obj->list();
    ?>
    <div class="container">
        <h2>Cargar Horario</h2>
        <a class='btn btn-danger m-3' href='index.php' role='button'>Cancelar</a>
        <form method="post">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="id">ID: Este se crea automatico</label>
                        <input type="number" class="form-control" name="documento" placeholder="ID">
                    </div>
                    <div class="form-group">
                        <label for="medicoID">Medico</label>
                        <select name="medicoID" class="form-control">
                            <option selected>Seleccione un médico</option>
                            <?php
                            foreach ($medicos as $item) {
                                echo "<option value='" . $item->documento_med . "'>" . $item->nombre_med . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dia">Dia</label>
                        <select name="dia" class="form-control">
                            <option selected>Seleccione el día</option>
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miercoles">Miercoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                            <option value="Sabado">Sabado</option>
                            <option value="Domingo">Domingo</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="horaInicio">Hora de inicio del turno. Formato: 24h</label>
                        <input type="time" class="form-control" name="horaInicio">
                    </div>
                    <div class="form-group">
                        <label for="horaFinal">Hora de fin del turno. Formato: 24h</label>
                        <input type="time" class="form-control" name="horaFinal">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for=""></label>
                        <button type="submit" class="btn btn-primary" name="create">Cargar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
    $alertMessage="";

    if (isset($_POST["create"])) {
        $id = $_POST["id"];
        $med = $_POST["medicoID"];
        $dia = $_POST["dia"];
        $hoi = $_POST["horaInicio"];
        $hof = $_POST["horaFinal"];

        $horario_obj->create($id,$med,$dia,$hoi,$hof);
        $alertMessage = 'Horario cargado exitosamente';

        // Verificar si se debe redirigir al index
        if (!empty($alertMessage)) {
            echo "<script>alert('$alertMessage'); window.location.href = 'index.php';</script>";
            exit();
        }
    }
    ?>
</body>

</html>