 <?php

  /*
  *
  * Script verifica estado de la conexión a base de datos 'Birds'.
  *
  */  

  // Se incluye Script ConnectionData.php
  include '00.sConnection.php';

  // Se crea conexion
  $conn = new mysqli($hostname, $username, $password,$dbname);

  // Se verifica estado de la conexión.
  if ($conn->connect_error) {
      die("Conexion fallida: " . $conn->connect_error);
  }
  // Se definen querys para insertar data inicial en tablas
  $tableEquipo = "
                  CREATE TABLE IF NOT EXISTS `ControlBodega`.`Equipo` (
                  `idEquipo` INT NOT NULL AUTO_INCREMENT,
                  `descripcion` VARCHAR(45) NOT NULL,
                  `marca` VARCHAR(45) NULL,
                  `modelo` VARCHAR(45) NULL,
                  PRIMARY KEY (`idEquipo`))
                ENGINE = InnoDB";

  $tableSolicitante = "CREATE TABLE IF NOT EXISTS `ControlBodega`.`Solicitante` (
  `idSolicitante` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `cargo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idSolicitante`))
ENGINE = InnoDB";

$tableReserva ="CREATE TABLE IF NOT EXISTS `ControlBodega`.`Reserva` (
  `idReserva` INT NOT NULL AUTO_INCREMENT,
  `fechaReserva` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idReserva`))
ENGINE = InnoDB";

$tablePedido = "CREATE TABLE IF NOT EXISTS `ControlBodega`.`Pedido` (
  `idPedido` INT NOT NULL AUTO_INCREMENT,
  `fechaEntrega` DATETIME NOT NULL,
  `fechaDevolucion` VARCHAR(45) NOT NULL,
  `comentario` VARCHAR(45) NULL,
  `isReserva` TINYINT NULL,
  `idEquipo` INT NOT NULL,
  `idSolicitante` INT NOT NULL,
  `idReserva` INT NOT NULL,
  PRIMARY KEY (`idPedido`),
  INDEX `fk_Pedido_Equipo_idx` (`idEquipo` ASC),
  INDEX `fk_Pedido_Solicitante1_idx` (`idSolicitante` ASC),
  INDEX `fk_Pedido_Reserva1_idx` (`idReserva` ASC),
  CONSTRAINT `fk_Pedido_Equipo`
    FOREIGN KEY (`idEquipo`)
    REFERENCES `ControlBodega`.`Equipo` (`idEquipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_Solicitante1`
    FOREIGN KEY (`idSolicitante`)
    REFERENCES `ControlBodega`.`Solicitante` (`idSolicitante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_Reserva1`
    FOREIGN KEY (`idReserva`)
    REFERENCES `ControlBodega`.`Reserva` (`idReserva`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB";

  //Execute Query $tableEquipo
  if ($conn->query($tableEquipo) === TRUE) {
      echo "Tabla 'tableEquipo' creada sin problemas" . "<br/>";
  } else {
      echo "Se produjo el siguiente error al crear la tabla 'tableEquipo': " . $conn->error . "<br/>";
  }

  //Execute Query $tableSolicitante
  if ($conn->query($tableSolicitante) === TRUE) {
      echo "Tabla 'tableSolicitante' creada sin problemas" . "<br/>";
  } else {
      echo "Se produjo el siguiente error al crear la tabla 'tableSolicitante': " . $conn->error . "<br/>";
  }

  //Execute Query $tableReserva
  if ($conn->query($tableReserva) === TRUE) {
      echo "Tabla 'tableReserva' creada sin problemas" . "<br/>";
  } else {
      echo "Se produjo el siguiente error al crear la tabla 'tableReserva': " . $conn->error . "<br/>";
  }

  //Execute Query $tablePedido
  if ($conn->query($tablePedido) === TRUE) {
      echo "Tabla 'tablePedido' creada sin problemas" . "<br/>";
  } else {
      echo "Se produjo el siguiente error al crear la tabla 'tablePedido': " . $conn->error . "<br/>";
  }

  // Se cierra conexion de prueba.
  $conn->close(); 
?> 

