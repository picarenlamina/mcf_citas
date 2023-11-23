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
	<th></th>
	<th></th>
	</tr>
    <?php
	foreach( $categorias as $categoria ): 
		$first = true;
		foreach( $eventos as $evento ):
			if( $categoria->getCategoria_id() == $evento->getCategoria_id() ):
			?>
			<tr>
				<td>
				<?php 
				if( $first ): 
					
					echo $categoria->getCategoria();
					$first = false;
				endif;
				?></td>
				<td><?php echo $evento->getFecha()?></td>
				<td><?php echo $evento->getHora()?></td>
				<td><?php echo $evento->getEvento()?></td>
				<td><a href="index.php?controlador=evento&accion=editar&codigo=<?php echo $evento->getEvento_id()?>">Editar</a></td>
				<td><a href="index.php?controlador=evento&accion=delete&codigo=<?php echo $evento->getEvento_id()?>">Eliminar</a></td>
			</tr>
			<?php
			endif;
		endforeach;
	endforeach;
    ?>
</table>
<a href="index.php?controlador=evento&accion=new">Nuevo</a>
</br>
</br>
</br>
<a href="index.php?controlador=usuario&accion=entrada">Salir</a>

</body>
</html>