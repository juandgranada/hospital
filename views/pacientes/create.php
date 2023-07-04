<?php
include '../header.php';
include_once '../../controllers/pacientesController.php';
include_once '../../controllers/medicosController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Paciente</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <?php
    // Se crea una instancia de la clase EmpleadoController
    $paciente_obj = new PacienteController();
    //Instancio la clase medicos para poder verlos en el select medico
    $medico_obj=new MedicoController();
    $medicos= $medico_obj->list();
    ?>
    <div class="container">
        <h2>Crear Paciente</h2>
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
                        <label for="tipo">Medico que lo atiende</label>
                        <select name="medicoID" class="form-control">
                            <option selected>Seleccione un médico</option>
                            <?php
                                foreach ($medicos as $item)
                                {
                                    echo "<option value='".$item->documento_med."'>".$item->nombre_med."</option>";
                                }
                            ?>
                        </select>
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
        $med = $_POST["medicoID"];

        $paciente_obj->create($doc, $nom, $dir, $tel, $ciu, $dep, $cod, $seg, $med);
        $alertMessage = 'Paciente creado exitosamente';

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