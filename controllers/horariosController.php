<?php
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT'] . "/" . $rutaProyecto[1] . '/models/horariosModel.php';

class HorarioController extends Connection
{
    public function create($id,$med,$dia,$hoi,$hof)
    {
    $horario_obj = new Horario($id,$med,$dia,$hoi,$hof);
    $horario = $horario_obj->create();
    return $horario;
    }

    public function update($id,$id_nuevo,$med,$dia,$hoi,$hof)
    {
        $horario_obj = new Horario($id,$med,$dia,$hoi,$hof);
        $horario = $horario_obj->update($id_nuevo);
        return $horario;
    }

    public function delete($id)
    {
       $horario_obj = new Horario($id);
       $horario=$horario_obj->delete();
       return $horario;
    }

    public function view($id)
    {
        $horario_obj = new Horario($id);
        $horario = $horario_obj->view();
        return $horario;
    }

    public function list()
    {
        $horario_obj = new Horario();
        $horarios = $horario_obj->list();
        return $horarios;
    }

    public function select($id)
    {
        // FETCH_OBJ
        $sql = $this->dbConnection->prepare("SELECT * FROM horarios WHERE id = ?");
        $sql->bindParam(1, $id);
        // Ejecutamos
        $sql->execute();

        // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
        if ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            // Creacion de objeto de la clase paciente
            $hor_obj = new Horario($row->id, $row->medicoID, $row->dia,$row->horaInicio, $row->horaFinal);
        } else {
            $hor_obj = null;
        }
        return $hor_obj; // Se retorna el objeto de pacientes
    }
}

?>