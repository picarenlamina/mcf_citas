<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>
<body>


Reserva Cita <br>

Dia: <?php echo $cita->getFecha()?> <br>
Hora: <?php echo $cita->getHora()?> <br>

<form method="get" action="index.php?controlador=cita&action=reservar">
<input type="hidden" name="controlador" value="cita">
<input type="hidden" name="accion" value="reservar">

<?php echo isset( $errores[ "nif" ] ) ? "*":"" ?>
<label for="nif" >NIF</label>
<input type="text" name="nif" value="<?php echo isset( $_REQUEST[ 'nif'] ) ?$_REQUEST[ 'nif'] :"" ?>">
</br>

<?php echo isset( $errores[ "nombre" ] ) ? "*":"" ?>
<label for="nombre" >Nombre</label>
<input type="text" name="nombre" value="<?php echo isset( $_REQUEST[ 'nombre'] ) ?$_REQUEST[ 'nombre'] :"" ?>">
</br>
<?php echo isset( $errores[ "apellidos" ] ) ? "*":"" ?>
<label for="apellidos" >Apellidos</label>
<input type="text" name="apellidos" value="<?php echo isset( $_REQUEST[ 'apellidos'] ) ?$_REQUEST[ 'apellidos'] :"" ?>">
</br>

<?php echo isset( $errores[ "email" ] ) ? "*":"" ?>
<label for="email" >email</label>
<input type="text" name="email" value="<?php echo isset( $_REQUEST[ 'email'] ) ?$_REQUEST[ 'email'] :"" ?>">
</br>

<?php echo isset( $errores[ "telefono" ] ) ? "*":"" ?>
<label for="telefono" >Telefono</label>
<input type="text" name="telefono" value="<?php echo isset( $_REQUEST[ 'telefono'] ) ?$_REQUEST[ 'telefono'] :"" ?>">
</br>
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

</body>
</html>