<?php

// debuguear($categoria);

?>

<!-- ---------------------- MAIN ---------------------- -->
<main>

    <h3 class="text-center  display-3"><?php echo $noticia->titulo; ?></h3>
    <h4 class="container-sd mb- bg-light text-dark p-2 m-4 rounded text-center lead">
        <?php echo $categoria->nombre; ?>
    </h4>
    <div class="container-md">
        <p class="text-left lead  display-6">Fecha publicación: <?php echo $noticia->fecha_publicacion; ?></p>
    </div>

    <div class="bd-example d-flex flex-column justify-content-center container-md">
    <?php if (!is_null($noticia->medios)&&($noticia->medios != '') ) { ?>
        <img class="bd-placeholder-img bd-placeholder-img-lg img-fluid" src="/build/medios/<?php echo $noticia->medios; ?>" alt="Imagen Noticia">
    <?php } else { ?>
        <img class="bd-placeholder-img bd-placeholder-img-lg img-fluid" src="/build/medios/imagenDefault.png" alt="Imagen Noticia">    
    <?php } ?>
    </div>

    <div class="container-md">
        <p class="text-justify display-4"><?php echo $noticia->cuerpo; ?></p>
        <p class="text-left lead  display-6">Autor: <?php echo $usuario->nombre . " " . $usuario->apellidos; ?></p>
    </div>


</main>
