<?php
	//Configuración de la BD
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "id21134804_bd_ipte_empleo";

	//Crear la conexión a la BD
	$con = new mysqli($hostname, $username, $password, $dbname);

	//Verificar la conexión
	if ($con->connect_error) {
		die("Conexion fallida: " . $con->connect_error);
	}
?>