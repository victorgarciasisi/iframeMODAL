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
<h1>Playas de Gijón</h1>
<?php
    //bucle para recorrer los elementos del array
    for ($i = 0; $i<count($listaItems); $i++) {
        ?>
	<p>
		<?php echo '<a class="link" href="playa.php?id=' . $i . '">' . $listaItems[$i]["nombre"]["content"]. '</a>'; ?>
</p>

<?php
    } //cerramos bucle
?>

<!-- Load jQuery, SimpleModal and Basic JS files -->
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic.js'></script>

</html>
