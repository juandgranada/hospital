<?php
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT'] . "/" . $rutaProyecto[1] . '/models/pacientesModel.php';

class PacienteController extends Connection
{
    public function create($doc,$nom,$dir,$tel,$ciu,$dep,$cod,$seg,$med)
    {
    $paciente_obj = new Paciente($doc,$nom,$dir,$tel,$ciu,$dep,$cod,$seg,$med);
    $paciente = $paciente_obj->create();
    return $paciente;
    }

    public function update($doc,$doc_nuevo,$nom,$dir,$tel,$ciu,$dep,$cod,$seg,$med)
    {
        $paciente_obj = new Paciente($doc,$nom,$dir,$tel,$ciu,$dep,$cod,$seg,$med);
        $paciente = $paciente_obj->update($doc_nuevo);
        return $paciente;
    }

    public function delete($doc)
    {
       $paciente_obj = new Paciente($doc);
       $paciente=$paciente_obj->delete();
       return $paciente;
    }

    public function view($doc)
    {
        $paciente_obj = new Paciente($doc);
        $paciente = $paciente_obj->view();
        return $paciente;
    }

    public function list()
    {
        $paciente_obj = new Paciente();
        $pacientes = $paciente_obj->list();
        return $pacientes;
    }

    public function select($doc)
    {
        // FETCH_OBJ
        $sql = $this->dbConnection->prepare("SELECT * FROM pacientes WHERE documento_pac = ?");
        $sql->bindParam(1, $doc);
        // Ejecutamos
        $sql->execute();

        // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
        if ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            // Creacion de objeto de la clase paciente
            $pac_obj = new Paciente($row->documento, $row->nombre, $row->direccion, $row->telefono, $row->ciudad,
        $row->departamento,$row->codigoPostal,$row->seguridadSocial,$row->medicoID);
        } else {
            $pac_obj = null;
        }
        return $pac_obj; // Se retorna el objeto de pacientes
    }
}

?>