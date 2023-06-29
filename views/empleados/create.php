<?php
include '../header.php';
include_once '../../controllers/empleadosController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <?php
    // Se crea una instancia de la clase EmpleadoController
    $empleado_obj = new EmpleadoController();
    ?>
    <div class="container">
        <h2>Crear Empleado</h2>
    </div>
    <div class="container ml-5">
        <a class='btn btn-danger m-3' href='index.php' role='button'>Cancelar</a>
        <form method="post">
            <div class="form-group">
                <label for="documento">Documento</label>
                <input type="number" class="form-control" name="documento" placeholder="Ingrese el documento">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre">
            </div>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" class="form-control" name="direccion" placeholder="Ingrese la direccion">
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" class="form-control" name="telefono" placeholder="Ingrese el telefono">
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" placeholder="Ingrese la ciudad">
            </div>
            <div class="form-group">
                <label for="departamento">Departamento</label>
                <input type="text" class="form-control" name="departamento" placeholder="Ingrese el departamento">
            </div>
            <div class="form-group">
                <label for="codigoPostal">Codigo Postal</label>
                <input type="text" class="form-control" name="codigoPostal" placeholder="Ingrese el codigo postal">
            </div>
            <div class="form-group">
                <label for="seguridadSocial">Numero de seguridad social</label>
                <input type="number" class="form-control" name="seguridadSocial" placeholder="Ingrese el numero de la seguridad social">
            </div>
            <div class="form-group">
                <label for="tipo">Tipo de empleado</label>
                <select name="tipo" class="form-control">
                    <option selected>Seleccione una opcion</option>
                    <option value="ATS">ATS</option>
                    <option value="ATS de zona">ATS de zona</option>
                    <option value="Auxiliar de enfermeria">Auxiliar de enfermeria</option>
                    <option value="Celador">Celador</option>
                    <option value="Aministrativo">Aministrativo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estadoVacaciones">Seleccione el estado de vacaciones del empleado</label>
                <select name="estadoVacaciones" class="form-control">
                    <option selected>Seleccione una opcion</option>
                    <option value="Programadas">Programadas</option>
                    <option value="Ya disfrutadas">Ya disfrutadas</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="create">Crear</button>
        </form>
    </div>
    <?php
        if(isset($_POST["create"]))
        {
            $doc=$_POST["documento"];
            $nom=$_POST["nombre"];
            $dir=$_POST["direccion"];
            $tel=$_POST["telefono"];
            $ciu=$_POST["ciudad"];
            $dep=$_POST["departamento"];
            $cod=$_POST["codigoPostal"];
            $seg=$_POST["seguridadSocial"];
            $tip=$_POST["tipo"];
            $est=$_POST["estadoVacaciones"];

            $empleado_obj->create($doc,$nom,$dir,$tel,$ciu,$dep,$cod,$seg,$tip,$est);
            echo "<script>alert('Empleado creado exitosamente')</script>";
        }
    ?>

    <div class="container-fluid backg1">FOOTER</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>

</html>