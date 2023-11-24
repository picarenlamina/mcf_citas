<?php
class ReservaModel
{
    protected $db;
 
    private $reserva_id;
    private $cita_id;
    private $usuario_id;
    
    
    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }
    public function setUsuario_id( $value )
    {
        return $this->usuario_id = $value;
    }
 
    public function setCita_id( $value )
    {
        return $this->cita_id = $value;
    }
    
    
    public function save()
    {
        
        if( ! isset( $this->reserva_id ) )
        {
            $consulta = $this->db->prepare('INSERT INTO citas_reservas (cita_id, usuario_id) VALUES ( ?, ?)');
            
            $consulta->bindParam( 1,  $this->cita_id );
            $consulta->bindParam( 2,  $this->usuario_id );
            
            $resultado = $consulta->execute();
            $this->reserva_id = $this->db->lastInsertId();
        }
        else
        {
            $consulta = $this->db->prepare('update citas_reservas set cita_id = ?, usuario_id = ?where reserva_id = ?');
            
            $consulta->bindParam( 1,  $this->cita_id );
            $consulta->bindParam( 2,  $this->usuario_id );
            $consulta->bindParam( 2,  $this->reserva_id );
           
            $resultado = $consulta->execute();
        }
        
        return $resultado;
    }
    
    
      
    
    

}
?>