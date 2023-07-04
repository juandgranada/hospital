<?php
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/core/Connection.php';

class Horario extends Connection
{
    private $id;
    private $medicoID;
    private $dia;
    private $horaInicio;
    private $horaFinal;

    public function __construct($id=null,$med=null,$dia=null,$hoi=null,$hof=null)
    {
        $this->id=$id;
        $this->medicoID=$med;
        $this->dia=$dia;
        $this->horaInicio=$hoi;
        $this->horaFinal=$hof;
        parent:: __construct();
    }

    //getters y setters
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id=$id;
        return $this;
    }
    public function getMedicoID()
    {
        return $this->medicoID;
    }
    public function setMedicoID($med)
    {
        $this->medicoID=$med;
        return $this;
    }
    public function getDia()
    {
        return $this->dia;
    }
    public function setDia($dia)
    {
        $this->dia=$dia;
        return $this;
    }
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }
    public function setHoraInicio($hoi)
    {
        $this->horaInicio=$hoi;
        return $this;
    }
    public function getHoraFinal()
    {
        return $this->horaFinal;
    }
    public function setHoraFinal($hof)
    {
        $this->horaFinal=$hof;
        return $this;
    }

    //metodo para listar los horarios de la base de datos
    public function list()
    {
        try
        {
            // FETCH_OBJ
            $sql=$this->dbConnection->prepare("SELECT * FROM horarios ORDER BY dia");

            //ejecutamos
            $sql->execute();
            $resultSet=null;

            //Ahora indicamos el fetch mode cuando llamamos a fetch:
            while($row=$sql->fetch(PDO::FETCH_OBJ))
            {
                $resultSet[]=$row;
            }

            return $resultSet;
        }catch(PDOException $ex){   
            echo $ex->getMessage();
            die();
        }
    }

    //metodo para crear horarios
    public function create()
    {
        try
        {
            $sql = $this->dbConnection->prepare("INSERT INTO horarios(id,medicoID,dia,hora_inicio,hora_fin)
            VALUES (?,?,?,?,?)");
            $sql->bindParam(1, $this->id);
            $sql->bindParam(2, $this->medicoID);
            $sql->bindParam(3, $this->dia);
            $sql->bindParam(4, $this->horaInicio);
            $sql->bindParam(5, $this->horaFinal);

            //ejecutamos
            $sql->execute();
            return $sql;
        }catch(PDOException $ex){
            $ex->getMessage();
            die();
        }
    }

    //metodo para ver el horario
    public function view()
    {
        try
        {
            $sql=$this->dbConnection->prepare("SELECT * FROM horarios WHERE id=?");
            $sql->bindParam(1, $this->id);

            //ejecutamos
            $sql->execute();
            $resultSet = null;
            while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $resultSet = $row;
            }
            return $resultSet;
        }catch(PDOException $ex){
            $ex->getMessage();
            die();
        }
    }

    //metodo para actualizar horario
    public function update($id_nuevo)
    {
        try
        {
            $id = $this->id;
            $medicoID = $this->medicoID;
            $dia = $this->dia;
            $horaInicio = $this->horaInicio;
            $horaFinal = $this->horaFinal;
            $sql = $this->dbConnection->prepare("UPDATE horarios SET id=:id_nuevo,
            medicoID=:medicoID,dia=:dia,hora_inicio=:horaInicio,hora_fin=:horaFinal
            WHERE id=:id");
            $sql->bindParam(":id_nuevo", $id_nuevo);
            $sql->bindParam(":id", $id);
            $sql->bindParam(":medicoID", $medicoID);
            $sql->bindParam(":dia", $dia);
            $sql->bindParam(":horaInicio", $horaInicio);
            $sql->bindParam(":horaFinal", $horaFinal);

            $sql->execute();
            return $sql;
        } catch (PDOException $ex) {
            echo $ex->getMessage();

            die();
        }

    }

    //metodo para eliminar
    public function delete()
    {
        try
        {
            $sql = $this->dbConnection->prepare("DELETE FROM horarios where id=?");
            $sql->bindParam(1, $this->id);
            $sql->execute();
            return $sql;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

}

?>