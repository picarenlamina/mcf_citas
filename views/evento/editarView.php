<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>
<body>



<form method="get" action="index.php?controlador=evento&action=editar">
<input type="hidden" name="controlador" value="evento">
<input type="hidden" name="accion" value="editar">
<label for="codigo" >Codigo</label>
<input type="text" name="codigo" value="<?php echo $evento->getEvento_ID()?>" readonly>
</br>
<?php echo isset( $errores[ "evento" ] ) ? "*":"" ?>
<label for="evento" >Evento</label>
<input type="text" name="evento" value="<?php echo $evento->getEvento()?>">
</br>
<?php echo isset( $errores[ "fecha" ] ) ? "*":"" ?>
<label for="fecha" >Fecha</label>
<input type="text" name="fecha" value="<?php echo $evento->getFecha()?>">
</br>
<?php echo isset( $errores[ "hora" ] ) ? "*":"" ?>
<label for="hora" >Hora</label>
<input type="text" name="hora" value="<?php echo $evento->getHora()?>">
</br>
<?php echo isset( $errores[ "categoria" ] ) ? "*":"" ?>
<label for="ubicacion" >Ubicacion</label>
<input type="text" name="ubicacion" value="<?php echo $evento->getUbicacion()?>">
</br><label for="categoria_id" >Categoria</label>
<select name="categoria_id">
  <?php
  
  foreach( $categorias as $categoria ):
	?>
	<option value="<?=$categoria->getCategoria_id()?>" <?=$evento->getCategoria_id()==$categoria->getCategoria_ID()?"selected":""?>> <?=$categoria->getCategoria()?></option>
	<?php
  endforeach;
	?>
</select>

</br>
<?php echo isset( $errores[ "entidad" ] ) ? "*":"" ?>
<label for="entidad_id" >Entidad</label>
<select name="entidad_id">
  <?php
  
  foreach( $entidades as $entidad ):
	?>
	<option value="<?=$entidad->getEntidad_id()?>" <?=$evento->getEntidad_id()==$entidad->getEntidad_id()?"selected":""?>> <?=$entidad->getEntidad()?></option>
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
</br>
</br>
</br>
<a href="index.php?controlador=usuario&accion=entrada">Salir</a>
</body>
</html>