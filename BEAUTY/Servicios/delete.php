<?php
	include_once('../db/db_utilities.php');

	//En caso de que se encuentre el id al llamar esta funcion se disparara el evento de eliminar el registro en la base de datos.
	if(isset($_GET['id'])){
		borrarServicio($_GET['id']);
		header("location: Actualizar.php");
	}

?>