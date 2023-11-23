<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>
<body>
<form method="GET" action="index.php?controlador=usuario&action=entrada">
<input type="hidden" name="controlador" value="usuario">
<input type="hidden" name="accion" value="entrada">
<?php echo isset( $errores[ "usuario" ] ) ? "*":"" ?>
<label for="usuario" >Usuario</label>
<input type="text" name="usuario" >
</br>
<?php echo isset( $errores[ "password" ] ) ? "*":"" ?>
<label for="password" >Password</label>
<input type="text" name="password" >
</br>
<input type="submit" name="submit" value="Aceptar">
<input type="submit" name="submit" value="Cancelar">
</form>
<?php 
if( isset( $errores ) ):
foreach( $errores as $key => $error ):
?>
</br> 
<?php 
echo $error;
endforeach; 
endif;
?>


</body>
</html>