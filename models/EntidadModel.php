<?php
class EntidadModel
{
    protected $db;
 
    private $ENTIDAD_ID;
    private $ENTIDAD;

    
    
    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }
 
    public function getEntidad_id()
    {
        return $this->ENTIDAD_ID;
    }
    public function setEntidad_id( $codigo )
    {
        return $this->ENTIDAD_ID = $codigo;
    }
    
    public function getEntidad()
    {
        return $this->ENTIDAD;
    }
    public function setEntidad( $value )
    {
        return $this->ENTIDAD = $value;
    }
    
    public function getAll()
    {
        $consulta = $this->db->prepare('SELECT * FROM agenda_entidades');
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS, "EntidadModel");
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    
    
    public function getById( $codigo )
    {
       
        
        
        $gsent = $this->db->prepare('SELECT * FROM agenda_entidades where entidad_ID = ?');
        $gsent->bindParam( 1, $codigo );
        $gsent->execute();

        
        $gsent->setFetchMode(PDO::FETCH_CLASS, "EntidadModel");
        $resultado = $gsent->fetch();
        
        
        return $resultado;
    }
    
    public function save()
    {
        
        if( ! isset( $this->ENTIDAD_ID ) )
        {
            $consulta = $this->db->prepare('insert into agenda_entidades ( entidad ) values ( ? )');
            
            $consulta->bindParam( 1,  $this->entidad );
            
            
            $resultado = $consulta->execute();
            $this->entidad_ID = $this->db->lastInsertId();
        }
        else
        {
            $consulta = $this->db->prepare('update agenda_entidades set entidad = ? where entidad_ID = ?');
            
            $consulta->bindParam( 1,  $this->entidad );
            $consulta->bindParam( 2,  $this->entidad_ID );
            
            $resultado = $consulta->execute();
        }
        
        return $resultado;
    }
    
     public function delete()
    {
        
        if( isset( $this->entidad_ID ) )
        {
            $consulta = $this->db->prepare('delete from agenda_entidades where entidad_ID = ?');
            
            $consulta->bindParam( 1,  $this->entidad_ID );
            
            
            $resultado = $consulta->execute();
            return $resultado;
            
        }
       
        
      
    }
    
    
    public function getByNombre( $value )
    {
        
       
            $gsent = $this->db->prepare('select * from agenda_entidades where entidad like  ?');
            $value = "%" . $value . "%";
            $gsent->bindParam( 1, $value );
            $gsent->execute();
            $gsent->setFetchMode(PDO::FETCH_CLASS, "EntidadModel");
            $resultado = $gsent->fetchAll();
            return $resultado;
      
    }
}
?>