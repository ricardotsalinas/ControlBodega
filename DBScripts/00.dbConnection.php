 <?php
 
 	/*
	*
	*	Script realiza conexión a base de datos 'Birds'.
	*
 	*/ 	

 	// Se incluye Script ConnectionData.php
	include '00.ConnectionData.php';

	// Se crea conexion
	$conn = new mysqli($hostname, $username, $password,$dbname);
	
?> 