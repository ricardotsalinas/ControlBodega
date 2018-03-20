 <?php

	/*
	*	Escrito por: Nicolás Machuca
	*	Fecha: 01-06-2016
	*
	*	Script inserta data inicial de prueba en tablas 'Book' y 'User' en base de datos de prueba.
	*
 	*/
 	

 	// Se incluye Script ConnectionData.php
	include '00.dbConnection.php';

	// Se verifica estado de la conexión.
	if ($conn->connect_error) {
	    die("Conexion fallida: " . $conn->connect_error);
	}
	
	// Se definen query's para insertar data inicial en tablas
	$insertEquipo =	"INSERT INTO
						Equipo ( descripcion , marca , modelo )
					VALUES
						( 'Monitor' , 'Samsung' ,'TV555' ),
						( 'Proyector' , 'Sony' ,'PR555' )
					";

	if ($conn->query($insertEquipo) === TRUE) {
	    echo "Se ha inicializado la tabla 'Equipo' sin problemas.";
	} else {
	    echo "Se ha procido el siguiente error al inicializar la tabla 'Equipo': " . $conn->error . "<br>";
	}

	$conn->close();
?> 


