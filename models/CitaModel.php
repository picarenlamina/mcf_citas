<?php
class CitaModel
{
    protected $db;

    private $cita_id;
    private $fecha;
    private $hora;

    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }

    public function getCita_id()
    {
        return $this->cita_id;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function getById($codigo)
    {

        $consulta = $this->db->prepare('SELECT * FROM citas_citas where cita_id = ?');
        $consulta->bindParam(1, $codigo);
        $consulta->setFetchMode(PDO::FETCH_CLASS, "CitaModel");
        $consulta->execute();
        $resultado = $consulta->fetch();

        return $resultado;
    }

    public function getAll()
    {

        $consulta = $this->db->prepare('select * from citas_citas where cita_id not in ( select cita_id from citas_reservas )');

        $consulta->setFetchMode(PDO::FETCH_CLASS, "CitaModel");
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        return $resultado;
    }

    public function isLibre($codigo)
    {

        $consulta = $this->db->prepare('select cita_id from citas_reservas where cita_id = ?');

        $consulta->setFetchMode(PDO::FETCH_CLASS, "CitaModel");
        $consulta->execute();
        $consulta->bindParam(1, $codigo);
        $resultado = $consulta->fetch();
       
        if ($resultado) {
            return true;
        } else {
            return false;
        }

    }

}
