<?php
$db = mysqli_connect(
    $_ENV['DB_HOST'] ?? '',
    $_ENV['DB_USER'] ?? '', 
    $_ENV['DB_PASS'] ?? '', 
    $_ENV['DB_NAME'] ?? ''
);

if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "errno de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}

function obetenerConexion () {
    $host = $_ENV['DB_HOST'] ?? '';            // Direccion del host
    $user = $_ENV['DB_USER'] ?? '';                 // Usuario Base de Datos
    $password = $_ENV['DB_PASS'] ?? '';             // Password Base de Datos
    $dbName= $_ENV['DB_NAME'] ?? '';  // Nombre Base de Datos
    
    $conn = new mysqli();
    $conn->connect($host,$user,$password,$dbName);

    return $conn;
}

$conn = $db;