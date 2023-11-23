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
   
	<th>Categoria</th>
	<th>Fecha</th>
	<th>Hora</th>
	<th>Evento</th>
	<th>Ubicacion</th>
	<th></th>
	</tr>
    
	
			<tr>
				<td><?php echo $categoria->getCategoria()?></td>
				<td><?php echo $evento->getFecha()?></td>
				<td><?php echo $evento->getHora()?></td>
				<td><?php echo $evento->getEvento()?></td>
				<td><?php echo $evento->getUbicacion()?></td>
				<td><?php echo $entidad->getEntidad()?></td>
				
			</tr>
			
</table>

<a href="index.php?controlador=evento&accion=listado">Volver</a>


</body>
</html>