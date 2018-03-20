 <?php

 	/*
	*
	*	Script verifica estado de la conexión a servidor.
	*
 	*/ 	

 	// Se incluye Script ConnectionData.php
	include '00.sConnection.php';

	// Se verifica estado de la conexión.
	if ($conn->connect_error) {
	    die("Conexion fallida: " . $conn->connect_error);
	}
	echo "Conexion exitosa";

	// Se cierra conexion de prueba.
	$conn->close(); 
?> 