<?php
class UsuarioModel
{
    protected $db;
 
    private $usuario_id;
    private $nif;
	private $nombre;
	private $apellidos;
	private $telefono;
    private $email;
	
    
    
    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }
 
    public function getUsuario_id ()
    {
        return $this->usuario_id;
    }
    
    public function getNombre ()
    {
        return $this->nombre;
    }

    public function setNombre ( $valor )
    {
        $this->nombre = $valor;
    }



    public function getByCredenciales( $usuario, $password )
    {
       
        $gsent = $this->db->prepare('SELECT * FROM agenda_usuarios where usuario = ? and password = ?');
        $gsent->bindParam( 1, $usuario ); 
		$gsent->bindParam( 2, $password );
        $gsent->execute();
 
        $gsent->setFetchMode(PDO::FETCH_CLASS, "UsuarioModel");
        $resultado = $gsent->fetch();
        
        
        return $resultado;
    }
    
    
 
}
?>