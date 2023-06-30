<?php
    include '../header.php';
    include_once '../../controllers/sustitutosController.php';

    // Verificar si se ha proporcionado la llave primaria del empleado a eliminar
if (isset($_GET['delete'])) {
    $documento = $_GET['delete'];

    // Crear instancia del controlador y eliminar el empleado
    $sustituto_obj = new SustitutoController();
    $eliminado = $sustituto_obj->delete($documento);

    if ($eliminado) {
        // Redirigir a la página de lista después de la eliminación exitosa
        header("Location: index.php");
        exit();
    }
}

// Se crea una instancia de la clase EmpleadoController
$sustituto_obj = new SustitutoController();
// Se llama al método que lista a todos los empleados
$sustitutos = $sustituto_obj->list();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicos Sustitutos</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
    <div class="container">
        <h1>Gestionar Medicos Sustitutos</h1>
        
        <div class="row">
            <div class="col">
                <a class='btn btn-success' href='create.php' role='button'>
                    Crear nuevo medico sustituto
                </a>
            </div>
        </div><br>
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope>Documento</th>
                <th scope>Nombre</th>
                <th scope>Telefono</th>
                <th style="text-align:center" colspan="3">Opciones</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    foreach($sustitutos as $item)
                    {
                        echo "<tr>";
                        echo "<td>".$item->documento_sus."</td>";
                        echo "<td>".$item->nombre_sus."</td>";
                        echo "<td>".$item->telefono_sus."</td>";
                        echo "<td>
                                <a class='btn btn-warning mr-0' href='view.php?documento=".$item->documento_sus."' role='button'>
                                Ver
                                <img src='../../images/ver.png' width='18'>
                                </a>
                            </td>";
                        echo"<td>
                                <a class='btn btn-info' href='update.php?documento=".$item->documento_sus."' role='button'>
                                Editar
                                <img src='../../images/editar.png' width='18'>  
                                </a>
                            </td>";
                        echo"<td>
                                <a class='btn btn-danger' href='index.php?delete=" . $item->documento_sus. "' role='button'
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
            return confirm("¿Estás seguro de que deseas eliminar este medico sustituto?");
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