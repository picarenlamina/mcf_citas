<?php
class ItemController
{
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
 
 
    public function index()
    {
        //Incluye el modelo que corresponde
        require 'models/ItemModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $items = new ItemModel();
 
        //Le pedimos al modelo todos los items
        $listado = $items->getAll();
 
        //Pasamos a la vista toda la información que se desea representar
        $data['items'] = $listado;
        
        
        //Finalmente presentamos nuestra plantilla
        //$this->view->show("listarView.php", $data);
        $this->view->show("listarView.php", array(  'items' => $listado)  );
    }
 
    public function listar()
    {
        //Incluye el modelo que corresponde
        require 'models/ItemModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $items = new ItemModel();
 
        //Le pedimos al modelo todos los items
        $listado = $items->getAll();
 
        //Pasamos a la vista toda la información que se desea representar
        $data['items'] = $listado;
 
        
        //Finalmente presentamos nuestra plantilla
        $this->view->show("listarView.php", $data);
    }
    
    public function editar()
    {
        //Incluye el modelo que corresponde
        require 'models/ItemModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $items = new ItemModel();
 
        //Le pedimos al modelo todos los items
        $listado = $items->getById( $_GET[ 'codigo' ] );
 
 
        
        //Pasamos a la vista toda la información que se desea representar
        $data['item'] = $listado;
        
        //Finalmente presentamos nuestra plantilla
        if( $listado != false )
                $this->view->show("listarView2.php", $data);
        else 
                $this->view->show("errorView.php", array( "error" =>"No existe codigo", "enlace" => "index.php?controlador=item&action=listar"));
    }
 
    public function agregar()
    {
        echo 'Aquí incluiremos nuestro formulario para insertar items';
    }
}
?>