<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>
<body>
<table>
    <tr>
        <th>Codigo</th>
        <th>Fecha</th>
        <th>Hora</th>
    </tr>
    <?php
    // $listado es una variable asignada desde el controlador ItemsController.
	
    foreach( $citas as $item )
    {
    ?>
    <tr>
        <td><?php echo $item->getCita_id()?></td>
        <td><?php echo $item->getFecha()?></td>
        <td><?php echo $item->getHora()?></td>
        <td><a href="index.php?controlador=cita&accion=reservar&cita_id=<?php echo $item->getCita_id()?>">Editar</a></td>
    </tr>
    <?php
    }
    ?>
</table>
</body>
</html>