<?php
class ItemModel
{
    protected $db;
 
    private $codigo;
    private $item;
    
    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }
 
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo( $codigo )
    {
        return $this->codigo = $codigo;
    }
    
    public function getItem()
    {
        return $this->item;
    }
    public function setItem( $item )
    {
        return $this->item = $item;
    }
    
    public function getAll()
    {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT * FROM items');
        $consulta->execute();
        //devolvemos la colección para que la vista la presente.
        //return $consulta;
                
        //$return $consulta->fetchAll(PDO::FETCH_CLASS, "ItemModel");
        
        
        $gsent = $this->db->prepare('SELECT * FROM items');
        $gsent->execute();

        $resultado = $gsent->fetchAll(PDO::FETCH_CLASS, "ItemModel");
        return $resultado;
    }
    
    
     public function getById( $codigo )
    {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT * FROM items where codigo = ?');
        $consulta->bindParam( 1, $codigo );
        $consulta->execute();
        //devolvemos la colección para que la vista la presente.
        //return $consulta;
                
        //$return $consulta->fetchAll(PDO::FETCH_CLASS, "ItemModel");
        
        
        $gsent = $this->db->prepare('SELECT * FROM items where codigo = ?');
        $gsent->bindParam( 1, $codigo );
        $gsent->execute();

        //$resultado = $gsent->fetch(PDO::FETCH_CLASS, "ItemModel");
        
        $gsent->setFetchMode(PDO::FETCH_CLASS, "ItemModel");
        $resultado = $gsent->fetch();
        
        
        return $resultado;
    }
}
?>