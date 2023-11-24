<?php
class UsuarioController
{
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
 
 
    
    public function entrada()
    {
        

		//Incluye el modelo que corresponde
        require 'models/UsuarioModel.php';
		
		
		if( isset($_SESSION[ 'logueado'] )) 
			session_unset();
		
		
        if( isset( $_REQUEST["submit"] )&& $_REQUEST["submit"] == "Aceptar" )
        {
			
			$errores = array();
                
			if(empty($_REQUEST["usuario"])){
					$errores['usuario'] = "* Evento: Error";
			}
			if(empty($_REQUEST["password"])){
					$errores['password'] = "* Password: Error";
			}
			
			if( empty($errores) )
			{ 
            		$item = new UsuarioModel();
					$usuario = $item->getByCredenciales( $_REQUEST["usuario"], $_REQUEST["password"] );
				
					if( $usuario )
					{
						$_SESSION[ "logueado"] = true;
						header( "Location: index.php?controlador=evento&accion=listar");
					}
					else
					{	
						$errores[ "Credenciales"] = "* Error Credenciales";
						$this->view->show("usuario/entradaView.php", array("errores" => $errores)  );
					}	
			}
			else{ 
				$this->view->show("usuario/entradaView.php", array( "errores"=>$errores ));
			}
        }
        elseif( isset( $_REQUEST["submit"] )&& $_REQUEST["submit"] == "Cancelar")
        {
              
                header( "Location: index.php?controlador=usuario&accion=entrada");
                
        }
        else
        {
            $this->view->show("usuario/entradaView.php" );
        }
      
    }
    

	
     
    
    
}
?>