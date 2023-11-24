<?php
class CitaController
{
    public $view;
	
	function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
 
 
   
 
    public function listado()
    {
        //Incluye el modelo que corresponde
        require 'models/CitaModel.php';
		
        //Creamos una instancia de nuestro "modelo"
        $cita = new CitaModel();
		
        //Le pedimos al modelo todos los items
		$citas = $cita->getAll();
		
        //Finalmente presentamos nuestra plantilla
        $this->view->show("cita/listadoView.php", [ "citas" => $citas ] );
    }
    
    public function reservar()
    {
        
		require 'models/CitaModel.php';
		$citaModel = new CitaModel();
		$cita = $citaModel->getById( $_REQUEST[ 'cita_id' ] );
		
		//if( isset( $_REQUEST['cita_id']) && $cita = $citaModel->getById( $_REQUEST[ 'cita_id' ] ) )
		if( isset( $_REQUEST['cita_id'])  ) 
		
		{
			$_SESSION[ "cita_id" ] = $_REQUEST['cita_id'];
		}	
		else
			$this->view->show("errorView.php", array( "error" =>"No existe codigo", "enlace" => "index.php"));
		
			
			
		
        if( isset( $_REQUEST["submit"] )&& $_REQUEST["submit"] == "Aceptar" )
        {
            $errores = array();
                
			if(empty($_REQUEST["nombre"])){
					$errores['nombre'] = "* Nombre: Error";
			}
			if(empty($_REQUEST["apellidos"])){
					$errores['apellidos'] = "* Apellidos: Error";
			}
			if(empty($_REQUEST["telefono"]) || ! validateTelefono($_REQUEST["telefono"])){
					$errores['telefono'] = "* Telefono: Error";
			}
			if(empty($_REQUEST["email"]) || ! validateEmail($_REQUEST["email"])){
					$errores['email'] = "* Email: Error ";
			}
			
				
			if( empty($errores) )
			{     
				$usuarioModel = new UsuarioModel();

				if( ! $usuario = $usuarioModel->getByNif( $_REQUEST[ 'email' ] ) )
					$usuario  = new UsuarioModel();

				$usuario->setNombre( $_REQUEST[ 'nombre' ]);
				$usuario->setApellidos( $_REQUEST[ 'apellidos' ]);
				$usuario->setTelefono( $_REQUEST[ 'telefono' ]);
				$usuario->setEmail( $_REQUEST[ 'email' ]);
				$usuario->setNif( $_REQUEST[ 'nif' ]);
				
				$usuario->save();
				
				$reserva = new Reserva();
				$reserva->setCita_id( $_SESSION[ "cita_id"] );
				$reserva->setUsuario_id( $usuario->getUsuario_id() );

				$reservao->save();
				header( "Location: index.php?controlador=evento&accion=listar");
			}
            else{ 
				$this->view->show("evento/editarView.php", array( "evento" => $evento,"entidades" => $entidades,  "categorias" => $categorias, "errores"=>$errores ));
            }
        }
        else
            $this->view->show("cita/reservaView.php", array( "cita" => $cita ));
        
    }
    
    
}
?>