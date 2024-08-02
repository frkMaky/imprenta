<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Conexión a la base de datos 
    $conn = obetenerConexion();

    $alertas = [];

    // Recuperar noticia
    $idCategoria = $_GET['id'];   // array assoc con los datos de los servicios 
    $query = "SELECT * FROM categorias WHERE id={$idCategoria}";
    $result = $conn->query($query);
    $categoria = $result->fetch_assoc();
    
    if ($categoria) {
        try {
            $query = "DELETE FROM categorias WHERE id={$idCategoria}";
            $result = $conn->query($query);
        } catch (\Throwable $th) {
            debuguear($th);
        }
    }
    header('Location: /dashboard');
  