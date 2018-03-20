 <?php

 	/*
	*
	*	Script crea base de datos 'controlBodega'.
	*
 	*/
 	

 	// Se incluye Script ConnectionData.php
	include '00.sConnection.php';

	// Se verifica estado de la conexión.
	if ($conn->connect_error) {
	    die("Conexión fallida: " . $conn->connect_error);
	}

	// Se crea base de datos "controlBodega"
	$sql = "CREATE DATABASE controlBodega
			CHARACTER SET utf8mb4
			DEFAULT CHARACTER SET utf8mb4
			COLLATE utf8mb4_unicode_ci
			DEFAULT COLLATE utf8mb4_unicode_ci";
	if ($conn->query($sql) === TRUE) {
	    echo "La base de datos controlBodega se ha creado sin problemas.";
	} else {
	    echo "No se ha podido crear base de datos. Se ha producido el siguiente error: " . $conn->error;
	}

	$conn->close();
?> 