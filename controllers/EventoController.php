<?php
class EventoController
{
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
 
 
    public function index()
    {
        //Incluye el modelo que corresponde
        require 'models/EventoModel.php';
		
 
        //Creamos una instancia de nuestro "modelo"
        $evento = new EventoModel();
 
        //Le pedimos al modelo todos los items
        $listado = $evento->getAll();
 
        //Pasamos a la vista toda la información que se desea representar
        $data['eventos'] = $listado;
 
        
        //Finalmente presentamos nuestra plantilla
        $this->view->show("evento/listarView.php", $data);
    }
 
    public function listado()
    {
        //Incluye el modelo que corresponde
        require 'models/EventoModel.php';
		require 'models/CategoriaModel.php';
		require 'models/EntidadModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $evento = new EventoModel();
		$categoria = new CategoriaModel();
		$entidad = new EntidadModel();
 
        //Le pedimos al modelo todos los items
		$eventos = $evento->getAll();
		$categorias = $categoria->getAll();
		$entidades = $entidad->getAll();
		
		
        //Pasamos a la vista toda la información que se desea representar
        $data['eventos'] = $eventos;
		$data['categorias'] = $categorias;
		$data['entidades'] = $entidades;
 
        
        //Finalmente presentamos nuestra plantilla
        $this->view->show("evento/listadoView.php", $data);
    }
     public function detalle()
    {
        //Incluye el modelo que corresponde
        require 'models/EventoModel.php';
		require 'models/CategoriaModel.php';
		require 'models/EntidadModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $evento = new EventoModel();
		$categoria = new CategoriaModel();
		$entidad = new EntidadModel();
 
        //Le pedimos al modelo todos los items
		$evento = $evento->getByID( $_REQUEST['codigo']);
		$categoria = $categoria->getByID( $evento->getCategoria_id());
		$entidad = $entidad->getByID( $evento->getEntidad_id());
		
		
        //Pasamos a la vista toda la información que se desea representar
        $data['evento'] = $evento;
		$data['categoria'] = $categoria;
		$data['entidad'] = $entidad;
 
        
        //Finalmente presentamos nuestra plantilla
        $this->view->show("evento/detalleView.php", $data);
    }
    
	public function listar()
    {
        
		if( ! $_SESSION['logueado' ] )
			header( "Location: index.php?controlador=usuario&accion=entrada");
			
		//Incluye el modelo que corresponde
        require 'models/EventoModel.php';
		require 'models/CategoriaModel.php';
		require 'models/EntidadModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $evento = new EventoModel();
		$categoria = new CategoriaModel();
		$entidad = new EntidadModel();
 
        //Le pedimos al modelo todos los items
		$eventos = $evento->getAll();
		$categorias = $categoria->getAll();
		$entidades = $entidad->getAll();
		
		
        //Pasamos a la vista toda la información que se desea representar
        $data['eventos'] = $eventos;
		$data['categorias'] = $categorias;
		$data['entidades'] = $entidades;
 
        
        //Finalmente presentamos nuestra plantilla
        $this->view->show("evento/listarView.php", $data);
    }
    
    public function editar()
    {
        if( ! $_SESSION['logueado' ] )
			header( "Location: index.php?controlador=usuario&accion=entrada"); //Incluye el modelo que corresponde
        require 'models/EventoModel.php';
		require 'models/CategoriaModel.php';
		require 'models/EntidadModel.php';
		
		require 'libs/libreria.php';
		
		//Iinstancia modelos
       	$categoria = new CategoriaModel();
		$entidad = new EntidadModel();
 
        //Le pedimos al modelo todos los items
		$categorias = $categoria->getAll();
		$entidades = $entidad->getAll();
		
		$item = new EventoModel();
		$evento = $item->getById( $_REQUEST[ 'codigo' ] );
        if( $evento != true )
			 $this->view->show("errorView.php", array( "error" =>"No existe codigo", "enlace" => "index.php?controlador=evento&action=listar"));
			
		
        if( isset( $_REQUEST["submit"] )&& $_REQUEST["submit"] == "Aceptar" )
        {
            $errores = array();
                
			if(empty($_REQUEST["evento"])){
					$errores['evento'] = "* Evento: Error";
			}
			if(empty($_REQUEST["ubicacion"])){
					$errores['ubicacion'] = "* Ubicacion: Error";
			}
			if(empty($_REQUEST["fecha"]) || ! validateDate($_REQUEST["fecha"])){
					$errores['fecha'] = "* Fecha: Error YYYY-MM-DD";
			}
			if(empty($_REQUEST["hora"]) || ! validateTime($_REQUEST["hora"])){
					$errores['hora'] = "* Hora: Error HH:MM";
			}
			$categoria = new CategoriaModel();
			if(empty($_REQUEST["categoria_id"]) || ! $categoria->getById( $_REQUEST["categoria_id"])){
					$errores['categoria_id'] = "* Categoria: Error";
			}
			
			$entidad = new EntidadModel();
			if(empty($_REQUEST["entidad_id"]) || ! $entidad->getById( $_REQUEST["entidad_id"])){
					$errores['entidad_id'] = "* Entidad: Error";
			}
				
			if( empty($errores) )
			{     
				$evento->setEvento( $_REQUEST[ 'evento' ]);
				$evento->setUbicacion( $_REQUEST[ 'ubicacion' ]);
				$evento->setHora( $_REQUEST[ 'hora' ]);
				$evento->setFecha( $_REQUEST[ 'fecha' ]);
				$evento->setCategoria_id( $_REQUEST[ 'categoria_id' ]);
				$evento->setEntidad_id( $_REQUEST[ 'entidad_id' ]);
				$evento->save();
				header( "Location: index.php?controlador=evento&accion=listar");
			}
            else{ 
				$this->view->show("evento/editarView.php", array( "evento" => $evento,"entidades" => $entidades,  "categorias" => $categorias, "errores"=>$errores ));
            }
        }
        elseif( isset( $_REQUEST["submit"] )&& $_REQUEST["submit"] == "Cancelar")
			header( "Location: index.php?controlador=evento&accion=listar");
        else
            $this->view->show("evento/editarView.php", array( "evento" => $evento, "categorias" => $categorias, "entidades" => $entidades ));
        
    }
    
    public function new()
    {
        if( ! $_SESSION['logueado' ] )
			header( "Location: index.php?controlador=usuario&accion=entrada"); //Incluye el modelo que corresponde
        require 'models/EventoModel.php';
		require 'models/CategoriaModel.php';
		require 'models/EntidadModel.php';
		
		require 'libs/libreria.php';
		
		//Creamos una instancia de nuestro "modelo"
       	$categoria = new CategoriaModel();
		$entidad = new EntidadModel();
 
        //Le pedimos al modelo todos los items
		$categorias = $categoria->getAll();
		$entidades = $entidad->getAll();
		
		
		
        if( isset( $_REQUEST["submit"] )&& $_REQUEST["submit"] == "Aceptar" )
        {
			
			$errores = array();
                
			if(empty($_REQUEST["evento"])){
					$errores['evento'] = "* Evento: Error";
			}
			if(empty($_REQUEST["ubicacion"])){
					$errores['ubicacion'] = "* Ubicacion: Error";
			}
			if(empty($_REQUEST["fecha"]) || ! validateDate($_REQUEST["fecha"])){
					$errores['fecha'] = "* Fecha: Error YYYY-MM-DD";
			}
			if(empty($_REQUEST["hora"]) || ! validateTime($_REQUEST["hora"])){
					$errores['hora'] = "* Hora: Error HH:MM";
			}
			$categoria = new CategoriaModel();
			//var_dump($_REQUEST["categoria_id"] ); die();
			if(empty($_REQUEST["categoria_id"]) || ! $categoria->getById( $_REQUEST["categoria_id"])){
					$errores['categoria_id'] = "* Categoria: Error";
			}
			
			$entidad = new EntidadModel();
			//var_dump($_REQUEST["entidad_id"] ); die();
			if(empty($_REQUEST["entidad_id"]) || ! $entidad->getById( $_REQUEST["entidad_id"])){
					$errores['entidad_id'] = "* Entidad: Error";
			}
				
			if( empty($errores) )
			{ 
            		$evento = new EventoModel();
					$evento->setEvento( $_REQUEST[ 'evento' ]);
					$evento->setUbicacion( $_REQUEST[ 'ubicacion' ]);
					$evento->setHora( $_REQUEST[ 'hora' ]);
					$evento->setFecha( $_REQUEST[ 'fecha' ]);
					$evento->setCategoria_id( $_REQUEST[ 'categoria_id' ]);
					$evento->setEntidad_id( $_REQUEST[ 'entidad_id' ]);
					$evento->save();
					header( "Location: index.php?controlador=evento&accion=listar");
			}
			else 
					$this->view->show("evento/newView.php", array( "entidades" => $entidades,  "categorias" => $categorias, "errores"=>$errores ));

        }
        elseif( isset( $_REQUEST["submit"] )&& $_REQUEST["submit"] == "Cancelar")
        {
              
                header( "Location: index.php?controlador=evento&accion=listar");
                
        }
        else
        {
            $this->view->show("evento/newView.php", array( "entidades" => $entidades,  "categorias" => $categorias ));
        }
      
    }
    
     
    
    public function delete()
    {
        if( ! $_SESSION['logueado' ] )
			header( "Location: index.php?controlador=usuario&accion=entrada");//Incluye el modelo que corresponde
        require 'models/EventoModel.php';
                
    
        // falta session de codigo para evitar que quiera cambiar otro
        $evento = new EventoModel();
        $evento = $evento->getById( $_REQUEST[ 'codigo' ] );
        if( $evento != false )
        {
                $evento->delete();
                header( "Location: index.php?controlador=evento&accion=listar");
        }
        else 
        {
            $this->view->show("errorView.php", array( "error" =>"No existe codigo", "enlace" => "index.php?controlador=evento&action=listar"));
        }       
      
      
        
      
    }
   
}
?>