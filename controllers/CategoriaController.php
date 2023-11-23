<?php
class CategoriaController
{
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
 
 
    public function index()
    {
        //Incluye el modelo que corresponde
        require 'models/CategoriaModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $categoria = new CategoriaModel();
 
        //Le pedimos al modelo todos los items
        $listado = $categoria->getAll();
 
        //Pasamos a la vista toda la información que se desea representar
        $data['categorias'] = $listado;
 
        
        //Finalmente presentamos nuestra plantilla
        $this->view->show("categoria/listarView.php", $data);
    }
 
    public function listar()
    {
        //Incluye el modelo que corresponde
        require 'models/CategoriaModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $categoria = new CategoriaModel();
 
        //Le pedimos al modelo todos los items
        $listado = $categoria->getAll();
 
        //Pasamos a la vista toda la información que se desea representar
        $data['categorias'] = $listado;
 
        
        //Finalmente presentamos nuestra plantilla
        $this->view->show("categoria/listarView.php", $data);
    }
    
    public function editar()
    {
        //Incluye el modelo que corresponde
        require 'models/CategoriaModel.php';
                
        if( isset( $_REQUEST["submit"] )&& $_REQUEST["submit"] == "Aceptar" )
        {
                
                // falta session de codigo para evitar que quiera cambiar otro
                $categoria = new CategoriaModel();
                $categoria = $categoria->getById( $_REQUEST[ 'codigo' ] );
                if( $categoria != false )
                {
                        // falta validar
                        //$categoria->setCodigo( $_REQUEST[ 'codigo' ]);
						
						
                        $categoria->setCategoria( $_REQUEST[ 'categoria' ]);
                        $categoria->save();
                        header( "Location: index.php?controlador=categoria&accion=listar");
                }
                else 
                        $this->view->show("errorView.php", array( "error" =>"No existe codigo", "enlace" => "index.php?controlador=categoria&action=listar"));
            
        }
        elseif( isset( $_REQUEST["submit"] )&& $_REQUEST["submit"] == "Cancelar")
        {
              
                header( "Location: index.php?controlador=categoria&accion=listar");
                
        }
        else
        {
            
         
                //Creamos una instancia de nuestro "modelo"
                $item = new CategoriaModel();
         
                //Le pedimos al modelo todos los items
                $categoria = $item->getById( $_REQUEST[ 'codigo' ] );
                
                //Finalmente presentamos nuestra plantilla
                if( $categoria != false )
                        $this->view->show("categoria/editarView.php", array( "categoria" => $categoria ));
                else 
                        $this->view->show("errorView.php", array( "error" =>"No existe codigo", "enlace" => "index.php?controlador=categoria&action=listar"));
        }
      
    }
    
    
     
    public function new()
    {
        //Incluye el modelo que corresponde
        require 'models/CategoriaModel.php';
                
        if( isset( $_REQUEST["submit"] )&& $_REQUEST["submit"] == "Aceptar" )
        {
                $errores = array();
                
				
                if(empty($_REQUEST["categoria"])){
                        $errores['categoria'] = "* Categoria: Error";
                }
                
                
                if( empty($errores) )
                {    
                        $categoria = new CategoriaModel();
                        $categoria->setCategoria( $_REQUEST[ 'categoria' ]);
                        $categoria->save();
                        header( "Location: index.php?controlador=categoria&accion=listar");
                }  
                else
                {
                    $this->view->show("categoria/newView.php", array( "errores"=>$errores));
                }
                
                        
            
        }
        elseif( isset( $_REQUEST["submit"] )&& $_REQUEST["submit"] == "Cancelar")
        {
                header( "Location: index.php?controlador=categoria&accion=listar");
                
        }
        else
        {
               $this->view->show("categoria/newView.php");
        }
      
    }
    
    public function delete()
    {
        //Incluye el modelo que corresponde
        require 'models/CategoriaModel.php';
                
    
        // falta session de codigo para evitar que quiera cambiar otro
        $categoria = new CategoriaModel();
        $categoria = $categoria->getById( $_REQUEST[ 'codigo' ] );
        if( $categoria != false )
        {
                $categoria->delete();
                header( "Location: index.php?controlador=categoria&accion=listar");
        }
        else 
        {
            $this->view->show("errorView.php", array( "error" =>"No existe codigo", "enlace" => "index.php?controlador=categoria&action=listar"));
        }       
      
      
        
      
    }
    
    public function buscar()
    {
        //Incluye el modelo que corresponde
        require 'models/CategoriaModel.php';
                
    
        // falta session de codigo para evitar que quiera cambiar otro
        $categoria = new CategoriaModel();
        
        
        $listado = $categoria->getByNombre( $_REQUEST[ 'valor' ] );
        
        
       
 
        //Pasamos a la vista toda la información que se desea representar
        $data['categorias'] = $listado;
 
        
        //Finalmente presentamos nuestra plantilla
        $this->view->show("categoria/listarView.php", $data);
        //$this->view->show("categoria/listarView.php", array( "categorias" => $listado ));
        
      
        
      
    }
    
   
    
 
   
}
?>