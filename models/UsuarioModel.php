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
        $this->nombre  = $valor;
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
        $this->nif  = $valor;
    }
    public function getTelefono ()
    {
        return $this->telefono;
    }
    public function setEmail ( $valor )
    {
        $this->email  = $valor;
    }
 




    public function getByNif( $codigo )
    {
       
        $gsent = $this->db->prepare('SELECT * FROM citas_usuarios where nif = ?');
        $gsent->bindParam( 1, $codigo ); 
        $gsent->execute();
 
        $gsent->setFetchMode(PDO::FETCH_CLASS, "UsuarioModel");
        $resultado = $gsent->fetch();
        
        
        return $resultado;
    }
    
    public function save()
    {
        
        if( ! isset( $this->usuario_id ) )
        {
            $consulta = $this->db->prepare('INSERT INTO citas_usuarios (nif, nombre, apellidos, telefono, email ) VALUES (?,?,?,?,?)');
            
            $consulta->bindParam( 1,  $this->nif );
            $consulta->bindParam( 2,  $this->nombre );
            $consulta->bindParam( 3,  $this->apellidos );
            $consulta->bindParam( 4,  $this->telefono );
            $consulta->bindParam( 5,  $this->email );
            
            $resultado = $consulta->execute();
            $this->usuario_id = $this->db->lastInsertId();
        }
        else
        {
            $consulta = $this->db->prepare('UPDATE citas_usuarios SET nif = ?, nombre = ?, apellidos = ?, telefono = ? , email = ? WHERE citas_usuarios.usuario_id = ?');
            
            $consulta->bindParam( 1,  $this->nif );
            $consulta->bindParam( 2,  $this->nombre );
            $consulta->bindParam( 3,  $this->apellidos );
            $consulta->bindParam( 4,  $this->telefono );
            $consulta->bindParam( 5,  $this->email );
            
            $consulta->bindParam( 6,  $this->usuario_id );
            
            $resultado = $consulta->execute();
        }
        
        return $resultado;
    }
    
     
}
?>