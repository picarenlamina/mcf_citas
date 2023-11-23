<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>
<body>



<form method="get" action="index.php?controlador=categoria&action=editar">
<input type="hidden" name="controlador" value="categoria">
<input type="hidden" name="accion" value="editar">
<label for="codigo" >Codigo</label>
<input type="text" name="codigo" value="<?php echo $categoria->getCodigo()?>" readonly>
</br>
<label for="categoria" >Categoria</label>
<input type="text" name="categoria" value="<?php echo $categoria->getCategoria()?>">
</br>
<input type="submit" name="submit" value="Aceptar">
<input type="submit" name="submit" value="Cancelar">
</form>


</body>
</html>