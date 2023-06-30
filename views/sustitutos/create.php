<?php
include '../header.php';
include_once '../../controllers/sustitutosController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Medicos Sustitutos</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <?php
    // Se crea una instancia de la clase EmpleadoController
    $sustituto_obj = new SustitutoController();
    ?>
    <div class="container">
        <h2>Crear Medico Sustituto</h2>
    </div>
    <div class="container ml-5">
        <a class='btn btn-danger m-3' href='index.php' role='button'>Cancelar</a>
        <form method="post">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="documento">Documento</label>
                        <input type="number" class="form-control" name="documento" placeholder="Ingrese el documento" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" name="direccion" placeholder="Ingrese la direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" placeholder="Ingrese la ciudad" required>
                    </div>
                    <div class="form-group">
                        <label for="codigoPostal">Codigo Postal</label>
                        <input type="text" class="form-control" name="codigoPostal" placeholder="Ingrese el codigo postal" required>
                    </div>
                    <div class="form-group">
                        <label for="matriculaProfesional">Matricula Profesional</label>
                        <input type="text" class="form-control" name="matriculaProfesional" placeholder="Ingrese el numero de la matricula profesional" required>
                    
                    </div>
                    <div class="form-group">
                        <label for="fechaAlta">Fecha de Baja</label>
                        <input type="date" class="form-control" name="fechaBaja" placeholder="">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" name="telefono" placeholder="Ingrese el telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="departamento">Departamento</label>
                        <input type="text" class="form-control" name="departamento" placeholder="Ingrese el departamento" required>
                    </div>
                    <div class="form-group">
                        <label for="seguridadSocial">Numero de seguridad social</label>
                        <input type="number" class="form-control" name="seguridadSocial" placeholder="Ingrese el numero de la seguridad social" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaAlta">Fecha de Alta</label>
                        <input type="date" class="form-control" name="fechaAlta" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="estadoVacaciones">Seleccione el estado de vacaciones</label>
                        <select name="estadoVacaciones" class="form-control">
                            <option selected>Seleccione una opcion</option>
                            <option value="No disponbles">No disponibles</option>
                            <option value="Programadas">Programadas</option>
                            <option value="Ya disfrutadas">Ya disfrutadas</option>
                        </select>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary" name="create">Crear</button>
        </form>
    </div>
    <?php
    $alertMessage="";

    if (isset($_POST["create"])) {
        $doc = $_POST["documento"];
        $nom = $_POST["nombre"];
        $dir = $_POST["direccion"];
        $tel = $_POST["telefono"];
        $ciu = $_POST["ciudad"];
        $dep = $_POST["departamento"];
        $cod = $_POST["codigoPostal"];
        $seg = $_POST["seguridadSocial"];
        $mat = $_POST["matriculaProfesional"];
        $fea = $_POST["fechaAlta"];
        $feb = $_POST["fechaBaja"];
        $est = $_POST["estadoVacaciones"];

        $sustituto_obj->create($doc, $nom, $dir, $tel, $ciu, $dep, $cod, $seg, $mat, $fea, $feb, $est);
        $alertMessage = 'Medico sustituto creado exitosamente';

        // Verificar si se debe redirigir al index
        if (!empty($alertMessage)) {
            echo "<script>alert('$alertMessage'); window.location.href = 'index.php';</script>";
            exit();
        }
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