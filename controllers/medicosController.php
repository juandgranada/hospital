<?php
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT'] . "/" . $rutaProyecto[1] . '/models/medicosModel.php';

class MedicoController extends Connection
{
    public function create($doc,$nom,$dir,$tel,$ciu,$dep,$cod,$seg,$mat,$tip,$est)
    {
    $medico_obj = new Medico($doc,$nom,$dir,$tel,$ciu,$dep,$cod,$seg,$mat,$tip,$est);
    $medico = $medico_obj->create();
    return $medico;
    }

    public function update($doc,$doc_nuevo,$nom,$dir,$tel,$ciu,$dep,$cod,$seg,$mat,$tip,$est)
    {
        $medico_obj = new Medico($doc,$nom,$dir,$tel,$ciu,$dep,$cod,$seg,$mat,$tip,$est);
        $medico = $medico_obj->update($doc_nuevo);
        return $medico;
    }

    public function delete($doc)
    {
       $medico_obj = new Medico($doc);
       $medico=$medico_obj->delete();
       return $medico;
    }

    public function view($doc)
    {
        $medico_obj = new Medico($doc);
        $medico = $medico_obj->view();
        return $medico;
    }

    public function list()
    {
        $medico_obj = new Medico();
        $medicos = $medico_obj->list();
        return $medicos;
    }

    public function select($doc)
    {
        // FETCH_OBJ
        $sql = $this->dbConnection->prepare("SELECT * FROM medicos WHERE documento_med = ?");
        $sql->bindParam(1, $doc);
        // Ejecutamos
        $sql->execute();

        // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
        if ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            // Creacion de objeto de la clase paciente
            $medico_obj = new Medico($row->documento, $row->nombre, $row->direccion, $row->telefono, $row->ciudad,
        $row->departamento,$row->codigoPostal,$row->seguridadSocial,$row->matriculaProfesional,$row->tipo,$row->estadoVacaciones);
        } else {
            $medico_obj = null;
        }
        return $medico_obj; // Se retorna el objeto de empleados
    }
}

?>