<?php
    include '../header.php';
    include_once '../../controllers/empleadosController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
    <?php
        // Se crea una instancia de la clase EmpleadoController
        $empleado_obj = new EmpleadoController();
        // Se llama al método que lista a todos los empleados
        $empleados = $empleado_obj->list();
    ?>
    <div class="container">
        <h1>Gestionar Empleados</h1>
        
        <div class="row">
            <div class="col">
                <a class='btn btn-success' href='create.php' role='button'>
                    Crear nuevo empleado
                </a>
            </div>
        </div><br>
    </div>
        
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope>Documento</th>
                <th scope>Nombre</th>
                <th scope>Direccion</th>
                <th scope>Telefono</th>
                <th scope>Ciudad</th>
                <th scope>Departamento</th>
                <th scope>Codigo Postal</th>
                <th scope>Seguridad Social</th>
                <th scope>Tipo</th>
                <th scope>Vacaciones</th>
                <th colspan="2">Opciones</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    foreach($empleados as $item)
                    {
                        echo "<tr>";
                        echo "<td>".$item->documento_emp."</td>";
                        echo "<td>".$item->nombre_emp."</td>";
                        echo "<td>".$item->direccion_emp."</td>";
                        echo "<td>".$item->telefono_emp."</td>";
                        echo "<td>".$item->ciudad_emp."</td>";
                        echo "<td>".$item->departamento_emp."</td>";
                        echo "<td>".$item->codigoPostal_emp."</td>";
                        echo "<td>".$item->seguridadSocial_emp."</td>";
                        echo "<td>".$item->tipo_emp."</td>";
                        echo "<td>".$item->estadoVacaciones_emp."</td>";
                        echo"<td>
                                <a class='btn btn-primary' href='#' role='button'>
                                    <img src='../../images/editar.png' width='18'>
                                </a>
                            </td>";
                        echo"<td>
                                <a class='btn btn-danger' href='#' role='button'>
                                    <img src='../../images/basura.png' width='18'>
                                </a>
                            </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

    
    <br>
    <div class="container-fluid backg1">FOOTER</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>