<?php
// index.php

// ubicacion JSON online y local
define('JSON', 'http://datos.gijon.es/doc/turismo/playas.json');
define('JSONlocal', 'playas.json');

// leer JSON validamos si el fichero online e accesible y si no abrimos el json local
if ($data = @file_get_contents(JSON)) {
    $items = json_decode($data, true);
} else {
    $data = file_get_contents(JSONlocal);
    $items = json_decode($data, true);
}


//lista de items a recorrer
$listaItems = $items["directorios"]["directorio"];
?>

<html>


<?php
$id=$_GET['id'];
?>
	<table border="1">
		<tr>
			<td>Nombre: </td>
			<td>
				<?php echo $listaItems[$id]["nombre"]["content"]; ?>
			</td>
		</tr>
		<tr>
			<td>URL: </td>
			<td>
				<?php echo $listaItems[$id]["url"]; ?>
			</td>
		</tr>
		<tr>
			<td>Descripcion: </td>
			<td>
				<?php echo $listaItems[$id]["descripcion"]["content"]; ?>
			</td>
		</tr>
		<tr>
			<td>Direccion: </td>
			<td>
				<?php echo $listaItems[$id]["direccion"][0]; ?>
			</td>
		</tr>
		<tr>
			<td>Foto: </td>
			<td>
				<?php echo '<img src=' . $items['directorios']['directorio'][$id]['foto']['content'] . '/>'; ?>
			</td>
		</tr>
		<tr>
			<td>Localizacion: </td>
			<td>
				<?php echo '<a href="https://www.google.com/maps/place/' .
                    $items['directorios']['directorio'][$id]['localizacion']['content'] . '">' .
                    $items['directorios']['directorio'][$id]['localizacion']['content'] . '</a>'; ?>
			</td>
		</tr>
	</table><br />

</html>
