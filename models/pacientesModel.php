<?php
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/core/Connection.php';

class Paciente extends Connection
{
    private $documento;
    private $nombre;
    private $direccion;
    private $telefono;
    private $ciudad;
    private $departamento;
    private $codigoPostal;
    private $seguridadSocial;
    private $medicoID;

    public function __construct($doc=null,$nom=null,$dir=null,$tel=null,$ciu=null,$dep=null,$cod=null,$seg=null,$med=null)
    {
        $this->documento=$doc;
        $this->nombre=$nom;
        $this->direccion=$dir;
        $this->telefono=$tel;
        $this->ciudad=$ciu;
        $this->departamento=$dep;
        $this->codigoPostal=$cod;
        $this->seguridadSocial=$seg;
        $this->medicoID=$med;
        parent:: __construct();
    }

    //getters y setters
    public function getDocumento()
    {
        return $this->documento;
    }
    public function setDocumento($doc)
    {
        $this->documento=$doc;
        return $this;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nom)
    {
        $this->nombre=$nom;
        return $this;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($dir)
    {
        $this->direccion=$dir;
        return $this;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($tel)
    {
        $this->telefono=$tel;
        return $this;
    }
    public function getCiudad()
    {
        return $this->ciudad;
    }
    public function setCiudad($ciu)
    {
        $this->ciudad=$ciu;
        return $this;
    }
    public function getDepartamento()
    {
        return $this->departamento;
    }
    public function setDepartamento($dep)
    {
        $this->departamento=$dep;
        return $this;
    }
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }
    public function setCodigoPostal($cod)
    {
        $this->codigoPostal=$cod;
        return $this;
    }
    public function getSeguridadSocial()
    {
        return $this->seguridadSocial;
    }
    public function setSeguridadSocial($seg)
    {
        $this->seguridadSocial=$seg;
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

    //metodo para listar los pacientes de la base de datos
    public function list()
    {
        try
        {
            // FETCH_OBJ
            $sql=$this->dbConnection->prepare("SELECT * FROM pacientes ORDER BY nombre_pac");

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

    //metodo para crear pacientes
    public function create()
    {
        try
        {
            $sql = $this->dbConnection->prepare("INSERT INTO pacientes(documento_pac,nombre_pac,direccion_pac,
            telefono_pac,ciudad_pac,departamento_pac,codigoPostal_pac,seguridadSocial_pac,medicoID)
            VALUES (?,?,?,?,?,?,?,?,?)");
            $sql->bindParam(1, $this->documento);
            $sql->bindParam(2, $this->nombre);
            $sql->bindParam(3, $this->direccion);
            $sql->bindParam(4, $this->telefono);
            $sql->bindParam(5, $this->ciudad);
            $sql->bindParam(6, $this->departamento);
            $sql->bindParam(7, $this->codigoPostal);
            $sql->bindParam(8, $this->seguridadSocial);
            $sql->bindParam(9, $this->medicoID);

            //ejecutamos
            $sql->execute();
            return $sql;
        }catch(PDOException $ex){
            $ex->getMessage();
            die();
        }
    }

    //metodo para ver paciente
    public function view()
    {
        try
        {
            $sql=$this->dbConnection->prepare("SELECT * FROM pacientes WHERE documento_pac=?");
            $sql->bindParam(1, $this->documento);

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

    //metodo para actualizar paciente
    public function update($doc_nuevo)
    {
        try
        {
            $documento = $this->documento;
            $nombre = $this->nombre;
            $direccion = $this->direccion;
            $telefono = $this->telefono;
            $ciudad = $this->ciudad;
            $departamento = $this->departamento;
            $codigoPostal = $this->codigoPostal;
            $seguridadSocial = $this->seguridadSocial;
            $medicoID = $this->medicoID;
            $sql = $this->dbConnection->prepare("UPDATE pacientes SET documento_pac=:doc_nuevo,
            nombre_pac=:nombre,direccion_pac=:direccion,telefono_pac=:telefono,ciudad_pac=:ciudad,
            departamento_pac=:departamento,codigoPostal_pac=:codigoPostal,seguridadSocial_pac=:seguridadSocial,
            medicoID=:medicoID WHERE documento_pac=:documento");
            $sql->bindParam(":doc_nuevo", $doc_nuevo);
            $sql->bindParam(":documento", $documento);
            $sql->bindParam(":nombre", $nombre);
            $sql->bindParam(":direccion", $direccion);
            $sql->bindParam(":telefono", $telefono);
            $sql->bindParam(":ciudad", $ciudad);
            $sql->bindParam(":departamento", $departamento);
            $sql->bindParam(":codigoPostal", $codigoPostal);
            $sql->bindParam(":seguridadSocial", $seguridadSocial);
            $sql->bindParam(":medicoID", $medicoID);

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
            $sql = $this->dbConnection->prepare("DELETE FROM pacientes where documento_pac=?");
            $sql->bindParam(1, $this->documento);
            $sql->execute();
            return $sql;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

}

?>