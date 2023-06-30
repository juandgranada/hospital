<?php
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT'] . "/" . $rutaProyecto[1] . '/models/sutitutosModel.php';

class SustitutoController extends Connection
{
    public function create($doc,$nom,$dir,$tel,$ciu,$dep,$cod,$seg,$mat,$fea,$feb,$est)
    {
    $sustituto_obj = new Sustituto($doc,$nom,$dir,$tel,$ciu,$dep,$cod,$seg,$mat,$fea,$feb,$est);
    $sustituto = $sustituto_obj->create();
    return $sustituto;
    }

    public function update($doc,$doc_nuevo,$nom,$dir,$tel,$ciu,$dep,$cod,$seg,$mat,$fea,$feb,$est)
    {
        $sustituto_obj = new Sustituto($doc,$nom,$dir,$tel,$ciu,$dep,$cod,$seg,$mat,$fea,$feb,$est);
        $sustituto = $sustituto_obj->update($doc_nuevo);
        return $sustituto;
    }

    public function delete($doc)
    {
       $sustituto_obj = new Sustituto($doc);
       $sustituto=$sustituto_obj->delete();
       return $sustituto;
    }

    public function view($doc)
    {
        $sustituto_obj = new Sustituto($doc);
        $sustituto = $sustituto_obj->view();
        return $sustituto;
    }

    public function list()
    {
        $sustituto_obj = new Sustituto();
        $sustitutos = $sustituto_obj->list();
        return $sustitutos;
    }

    public function select($doc)
    {
        // FETCH_OBJ
        $sql = $this->dbConnection->prepare("SELECT * FROM sustitutos WHERE documento_sus = ?");
        $sql->bindParam(1, $doc);
        // Ejecutamos
        $sql->execute();

        // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
        if ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            // Creacion de objeto de la clase sustituto
            $sustituto_obj = new Sustituto($row->documento, $row->nombre, $row->direccion, $row->telefono, 
            $row->ciudad,$row->departamento,$row->codigoPostal,$row->seguridadSocial,$row->matriculaProfesional,
            $row->fechaAlta,$row->fechaBaja,$row->estadoVacaciones);
        } else {
            $sustituto_obj = null;
        }
        return $sustituto_obj; // Se retorna el objeto de empleados
    }
}

?>