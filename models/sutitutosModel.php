<?php
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/core/Connection.php';

class Sustituto extends Connection
{
    private $documento;
    private $nombre;
    private $direccion;
    private $telefono;
    private $ciudad;
    private $departamento;
    private $codigoPostal;
    private $seguridadSocial;
    private $matriculaProfesional;
    private $fechaAlta;
    private $fechaBaja;
    private $estadoVacaciones;

    public function __construct($doc=null,$nom=null,$dir=null,$tel=null,$ciu=null,$dep=null,$cod=null,$seg=null,$mat=null,$fea=null,$feb=null,$est=null)
    {
        $this->documento=$doc;
        $this->nombre=$nom;
        $this->direccion=$dir;
        $this->telefono=$tel;
        $this->ciudad=$ciu;
        $this->departamento=$dep;
        $this->codigoPostal=$cod;
        $this->seguridadSocial=$seg;
        $this->matriculaProfesional=$mat;
        $this->fechaAlta=$fea;
        $this->fechaBaja=$feb;
        $this->estadoVacaciones=$est;
        parent::__construct();
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
    public function getMatriculaProfesional()
    {
        return $this->matriculaProfesional;
    }
    public function setMatriculaProfesional($mat)
    {
        $this->matriculaProfesional=$mat;
        return $this;
    }
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }
    public function setFechaAlta($fea)
    {
        $this->fechaAlta=$fea;
        return $this;
    }
    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }
    public function setFechaBaja($feb)
    {
        $this->fechaBaja=$feb;
        return $this;
    }
    public function getEstadoVacaciones()
    {
        return $this->estadoVacaciones;
    }
    public function setEstadoVacaciones($est)
    {
        $this->estadoVacaciones=$est;
        return $this;
    }

    //metodo para mostrar todos los medicos sustitutos en una lista en el index
    public function list()
    {
        try
        {
            // FETCH_OBJ
            $sql=$this->dbConnection->prepare("SELECT * FROM sustitutos ORDER BY nombre_sus");

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

    //metodo para insertar medicos sustitutos
    public function create()
    {
        try
        {
            $sql = $this->dbConnection->prepare("INSERT INTO sustitutos(documento_sus,nombre_sus,direccion_sus,
            telefono_sus,ciudad_sus,departamento_sus,codigoPostal_sus,seguridadSocial_sus,matriculaProfesional_sus,
            fechaAlta_sus,fechaBaja_sus,estadoVacaciones_sus)values(?,?,?,?,?,?,?,?,?,?,?,?)");
            $sql->bindParam(1, $this->documento);
            $sql->bindParam(2, $this->nombre);
            $sql->bindParam(3, $this->direccion);
            $sql->bindParam(4, $this->telefono);
            $sql->bindParam(5, $this->ciudad);
            $sql->bindParam(6, $this->departamento);
            $sql->bindParam(7, $this->codigoPostal);
            $sql->bindParam(8, $this->seguridadSocial);
            $sql->bindParam(9, $this->matriculaProfesional);
            $sql->bindParam(10, $this->fechaAlta);
            $sql->bindParam(11, $this->fechaBaja);
            $sql->bindParam(12, $this->estadoVacaciones);
            //ejecutamos
            $sql->execute();
            return $sql;
        }catch(PDOException $ex){
            echo $ex->getMessage();
            die();
        }
    }

    //metodo para actualizar medico sustituto
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
            $matriculaProfesional = $this->matriculaProfesional;
            $fechaAlta = $this->fechaAlta;
            $fechaBaja = $this->fechaBaja;
            $estadoVacaciones = $this->estadoVacaciones;
            $sql = $this->dbConnection->prepare("UPDATE sustitutos SET documento_sus=:doc_nuevo,
            nombre_sus=:nombre,direccion_sus=:direccion,telefono_sus=:telefono,ciudad_sus=:ciudad,
            departamento_sus=:departamento,codigoPostal_sus=:codigoPostal,seguridadSocial_sus=:seguridadSocial,
            matriculaProfesional_sus=:matriculaProfesional,fechaAlta_sus=:fechaAlta,fechaBaja_sus=:fechaBaja,
            estadoVacaciones_sus=:estadoVacaciones WHERE documento_sus=:documento");
            $sql->bindParam(":doc_nuevo", $doc_nuevo);
            $sql->bindParam(":documento", $documento);
            $sql->bindParam(":nombre", $nombre);
            $sql->bindParam(":direccion", $direccion);
            $sql->bindParam(":telefono", $telefono);
            $sql->bindParam(":ciudad", $ciudad);
            $sql->bindParam(":departamento", $departamento);
            $sql->bindParam(":codigoPostal", $codigoPostal);
            $sql->bindParam(":seguridadSocial", $seguridadSocial);
            $sql->bindParam(":matriculaProfesional", $matriculaProfesional);
            $sql->bindParam(":fechaAlta", $fechaAlta);
            $sql->bindParam(":fechaBaja", $fechaBaja);
            $sql->bindParam(":estadoVacaciones", $estadoVacaciones);

            $sql->execute();
            return $sql;
        } catch (PDOException $ex) {
            echo $ex->getMessage();

            die();
        }

    }

    //metodo para eliminar medico sustituto
    public function delete()
    {
        try
        {
            $sql = $this->dbConnection->prepare("DELETE FROM sustitutos where documento_sus=?");
            $sql->bindParam(1, $this->documento);
            $sql->execute();
            return $sql;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }

    }

    //metodo para ver todos los atributos del medico sustituto
    public function view()
    {
        try {
            $sql = $this->dbConnection->prepare("SELECT * FROM sustitutos WHERE documento_sus =?");
            $sql->bindParam(1, $this->documento);
            $sql->execute();
            $resultSet = null;
            while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $resultSet = $row;
            }
            return $resultSet;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

}