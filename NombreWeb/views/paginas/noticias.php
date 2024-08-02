
<!-- ---------------------- MAIN ---------------------- -->
<main>
    <section class="bg-light py-3 py-md-5 py-xl-8">
        
        <!--  Cabecera Noticias --> 
        <div class="p-4 p-md-5 mb-4 d-flex flex-row justify-content-center align-items-center rounded ">
            <div class="col-lg-6 px-0 d-flex flex-column justify-content-center align-items-center">
                <h1 class="mb-4 display-5 text-center">Noticias</h1>
                <p class="text-secondary mb-5 text-center lead fs-4">Infórmate de las últimas novedades en nuestra sección de noticias</p>
            </div>
        </div>

        <!--  Lista de Entradas -->
        <div class="container-md text-centerrow mb-2">
            <?php if ($sin_noticias) { ?>
                <p class="text-center">No hay noticias actualmente</p>
            <?php } else { ?>
            <div class="col-md-12"> <!-- Cada entrada en una fila / 12 columnas -->
                <?php foreach ($noticias as $noticia) { ?>
                
                    <!--  ENTRADA --> 
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-light border-warning">
                        <div class="col text-light p-4 d-flex flex-column position-static">
                        <h3 class="mb- bg-warning text-dark p-2 rounded text-center"><?php echo $noticia['titulo']; ?></h3>
                        <h4 class="container-sd mb- bg-light text-dark p-2 m-4 rounded text-center lead"">
                            <?php
                                foreach($categorias as $categoria) {
                                    if ($categoria->id == (int)$noticia['id_categoria']) {
                                        echo $categoria->nombre;
                                    }
                                }
                            ?>
                        </h4>
                        <div class="mb-1 text-dark lead">Fecha: <?php echo $noticia['fecha_publicacion']; ?></div>
                        <p class="card-text mb-auto text-dark"><?php echo $noticia['cuerpo']; ?></p>
                        <a href="/noticia?id=<?php echo $noticia['id']; ?>" class="icon-link gap-1 text-decoration-none icon-link-hover stretched-link text-dark link-danger bg-warning opacity-50 p-3 rounded ">
                            Continua Leyendo (link a noticia completa)
                            <svg class="bi"><use xlink:href="#chevron-right"/></svg>
                        </a>
                        </div>
                        <?PHP 
                        //debuguear($noticias);
                        if ( strlen($noticia['medios']) > 0  ) { ?>
                            <div class="thumbnail">
                                <img width="300" height="300" src="build/medios/<?php echo $noticia['medios']; ?>" alt="<?php echo $noticia['titulo']; ?>">
                            </div>
                        <?php } ?>
                    </div> <!--  /ENTRADA --> 
                    
                <?php   } // foreach ($noticias as $noticia)?>
        
         
            </div> <!-- /Contenedor entradas -->
            <?php } // if ($sin_noticias)?>
        </div>

    </section>
</main>