<?php

	/*
	*
	*	Script elimina base de datos 'controlBodega'.
	*
 	*/
 	

 	// Se incluye Script ConnectionData.php
	include '00.sConnection.php';

	// Se verifica estado de la conexión.
	if ($conn->connect_error) {
	    die("Conexion fallida: " . $conn->connect_error);
	}

	// sql to delete a record
	$sql = "DROP DATABASE controlbodega";

	if ($conn->query($sql) === TRUE) {
	    echo "Se ha eliminado base de datos 'controlBodega' sin problemas";
	} else {
	    echo "Se ha producido un error al eliminar base de datos 'controlBodega': " . $conn->error;
	}

	$conn->close();
?> 