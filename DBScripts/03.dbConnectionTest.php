 <?php

 	/*
	*
	*	Script verifica estado de la conexión a base de datos 'Birds'.
	*
 	*/ 	

 	// Se incluye Script ConnectionData.php
	include '00.dbConnection.php';

	// Se crea conexion
	$conn = new mysqli($hostname, $username, $password,$dbname);

	// Se verifica estado de la conexión.
	if ($conn->connect_error) {
	    die("Conexion fallida: " . $conn->connect_error);
	}
	echo "Conexion exitosa";

	// Se cierra conexion de prueba.
	$conn->close(); 
?> 