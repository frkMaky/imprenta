<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Conexión a la base de datos 
    $conn = obetenerConexion();

    $alertas = [];

    // Recuperar noticia
    $idNoticia = $_GET['id'];   // array assoc con los datos de los servicios 
    $query = "SELECT * FROM noticias WHERE id={$idNoticia}";
    $result = $conn->query($query);
    $noticia = $result->fetch_assoc();
    
    if ($noticia) {
        try {
            // Eliminar medios antiguos del servicio
            $noticiaAntiguo = __DIR__ . SEPARADOR . '..'. SEPARADOR . '..'. SEPARADOR . 'build'. SEPARADOR . 'medios' . SEPARADOR . $noticia['medios'];
            // Eliminar imagen 
            unlink($noticiaAntiguo);
            //debuguear($medio);
            $query = "DELETE FROM noticias WHERE id={$idNoticia}";
            $result = $conn->query($query);
        } catch (\Throwable $th) {
            debuguear($th);
        }
    }
    header('Location: /dashboard');
  