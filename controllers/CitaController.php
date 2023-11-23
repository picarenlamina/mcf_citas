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
		$cita = new CitaModel();
		 
		if( isset( $_REQUEST['cita_id']) && $cita->getById( $_REQUEST[ 'cita_id' ] ) )
			$_SESSION[ "cita_id"] == $_REQUEST['cita_id'];
		else
			$this->view->show("errorView.php", array( "error" =>"No existe codigo", "enlace" => "index.php"));
		
			
			
		
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
        else
            $this->view->show("cita/reservaView.php", array( "cita" => $cita ));
        
    }
    
    
}
?>