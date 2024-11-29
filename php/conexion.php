<?php
// Datos de conexión
$host = "localhost";
$username = "vash";
$password = "123vashito123";
$database = "tyche2";

// Crear la conexión
$conn = new mysqli($host, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Mensaje opcional para confirmar conexión exitosa
// echo "Conexión exitosa a la base de datos";
?>
