<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>
<body>



<form method="GET" action="index.php">
<input type="hidden" name="controlador" value="articulo">
<input type="hidden" name="accion" value="new">
<label for="codigo" >Codigo</label>
<input type="text" name="codigo"  readonly>
</br>
<?php echo isset( $errores[ "nombre" ] ) ? "*":"" ?>
<label for="nombre" >Nombre</label>
<input type="text" name="nombre" >
</br>
<?php echo isset( $errores[ "precio" ] ) ? "*":"" ?>
<label for="precio" >Precio</label>
<input type="text" name="precio">
</br>
<?php echo isset( $errores[ "categoria_id" ] ) ? "*":"" ?>
<label for="categoria_id" >Categoria</label>
<select name="categoria_id">
  <?php
  
  foreach( $categorias as $categoria ):
	?>
	<option value="<?=$categoria->getCodigo()?>"><?=$categoria->getCategoria()?></option>
	<?php
  endforeach;
	?>
</select>

</br>
<input type="submit" name="submit" value="Aceptar">
<input type="submit" name="submit" value="Cancelar">
</form>
<?php 
if( isset( $errores ) ):
foreach( $errores as $key => $error ):?>
</br> 
<?php 
echo $error;
endforeach; 
endif;
?>
</body>
</html>