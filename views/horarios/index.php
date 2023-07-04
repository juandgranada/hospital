<?php
include '../header.php';
include_once '../../controllers/horariosController.php';

// Verificar si se ha proporcionado la llave primaria del horario a eliminar
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Crear instancia del controlador y eliminar el horario
    $horario_obj = new HorarioController();
    $eliminado = $horario_obj->delete($id);

    if ($eliminado) {
        // Redirigir a la página de lista después de la eliminación exitosa
        header("Location: index.php");
        exit();
    }
}

// Se crea una instancia de la clase HorarioController
$horario_obj = new HorarioController();
// Se llama al método que lista a todos los empleados
$horarios = $horario_obj->list();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horarios</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <div class="container">
        <h1>Gestionar Horarios</h1>

        <div class="row">
            <div class="col">
                <a class='btn btn-success' href='create.php' role='button'>
                    Cargar nuevo horario
                </a>
            </div>
        </div><br>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope>ID</th>
                    <th scope>Medico</th>
                    <th scope>Dia</th>
                    <th scope>Hora de Inicio</th>
                    <th scope>Hora de Fin</th>
                    <th style="text-align:center" colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($horarios as $item) {
                    echo "<tr>";
                    echo "<td>" . $item->id . "</td>";
                    echo "<td>" . $item->medicoID . "</td>";
                    echo "<td>" . $item->dia . "</td>";
                    echo "<td>" . $item->hora_inicio . "</td>";
                    echo "<td>" . $item->hora_fin . "</td>";
                    echo "<td style='text-align:right;'>
                                <a class='btn btn-info' href='update.php?documento=" . $item->id . "' role='button'>
                                Editar
                                <img src='../../images/editar.png' width='18'>  
                                </a>
                            </td>";
                    echo "<td style='text-align:right;'>
                                <a class='btn btn-danger' href='index.php?delete=" . $item->id . "' role='button'
                                onclick='return confirmarEliminacion()'>
                                    Eliminar
                                    <img src='../../images/basura.png' width='18'>
                                </a>
                            </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        function confirmarEliminacion() {
            return confirm("¿Estás seguro de que deseas eliminar este medico?");
        }
    </script>
    <br>
    <div class="footer"></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>

</html>