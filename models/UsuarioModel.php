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

    public function setApellidos ( $valor )
    {
        $this->apellidos  = $valor;
    }
    public function getApellidos ()
    {
        return $this->apellidos;
    }

    public function setNif ( $valor )
    {
        $this->nif  = $valor;
    }
    public function getNif ()
    {
        return $this->nif;
    }
    public function setTelefono ( $valor )
    {
        $this->nif  = $telefono;
    }
    public function getTelefono ()
    {
        return $this->telefono;
    }
 
 




    public function getByNif( $codigo )
    {
       
        $gsent = $this->db->prepare('SELECT * FROM cita_usuarios where nif = ?');
        $gsent->bindParam( 1, $codigo ); 
        $gsent->execute();
 
        $gsent->setFetchMode(PDO::FETCH_CLASS, "UsuarioModel");
        $resultado = $gsent->fetch();
        
        
        return $resultado;
    }
    
    
 
}
?>