<!-- ---------------------- MAIN ---------------------- -->
<main>

    <!-- Service 9 - Bootstrap Brain Component -->
<section class="bg-light py-3 py-md-5 py-xl-8">
  <div class="container ">
    <div class="row justify-content-md-center ">
      <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
        <h2 class="mb-4 display-5 text-center">Nuestros Servicios</h2>
        <p class="text-secondary mb-5 text-center lead fs-4">Una breve descripción de los servicios que ofrecemos</p>
        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="container-fluid">
        <?php  
        $nuevafila = true; // bandera para las filas
        ?>
        <div class='row gy-3 gy-md-4'> <!-- FILA -->
        <?php
        foreach ($servicios as $servicio) { 
            if ( $nuevafila ) { 
                $nuevafila = false;
                ?>
                    <?php   if ($num_columnas >  0) { ?>
                    <div class='col-12 col-md-6 col-lg-4'><!-- 3 COLUMNAS POR FILA --> 
                        <div class="card border-warning m-2"> <!-- Tarjeta -->
                            <div class="card-body text-center text-dark p-4 p-xxl-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-box-fill text-warning mb-4" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z" />
                                </svg>
                                <h4 class="mb-4"><?php echo $servicio->nombre; ?></h4>
                                <p class="mb-4 text-dark"><?php echo $servicio->descripcion; ?></p>
                                <p class="mb-4 text-dark"><?php echo $servicio->precio; ?> €</p>
                        
                                <a href="./servicio?id=<?php echo $servicio->id;?>" class="btn btn-outline-warning bsb-btn-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi text-dark  link-light bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                    </svg>
                                </a>
                            </div>
                        </div> <!-- /Tarjeta -->
                    </div> <!-- /columna --> 
                    <?php
                    $num_columnas -=1;
                    } else { //   if ($num_columnas > 0)
                        $num_columnas = 3;
                        $nuevafila = true;
                    ?>
                    <div class='col-12 col-md-6 col-lg-4'><!-- 3 COLUMNAS POR FILA --> 
                        <div class="card border-warning m-2"> <!-- Tarjeta -->
                            <div class="card-body text-center text-dark p-4 p-xxl-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-box-fill text-warning mb-4" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z" />
                                </svg>
                                <h4 class="mb-4"><?php echo $servicio->nombre; ?></h4>
                                <p class="mb-4 text-dark"><?php echo $servicio->descripcion; ?></p>
                                <p class="mb-4 text-dark"><?php echo $servicio->precio; ?> €</p>
                        
                                <a href="./servicio?id=<?php echo $servicio->id;?>" class="btn btn-outline-warning bsb-btn-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi text-dark  link-light bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                    </svg>
                                </a>
                            </div>
                        </div> <!-- /Tarjeta -->
                    </div> <!-- /columna -->
                </div> <!-- /fila -->
            <?php  }  // if ($num_columnas > 0) 
            } else { ?>
            <?php   if ($num_columnas > 0) {
                        $num_columnas -=1; 
                    ?>
                    <div class='col-12 col-md-6 col-lg-4'><!-- 3 COLUMNAS POR FILA --> 
                        <div class="card border-warning m-2"> <!-- Tarjeta -->
                            <div class="card-body text-center text-dark p-4 p-xxl-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-box-fill text-warning mb-4" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z" />
                                </svg>
                                <h4 class="mb-4"><?php echo $servicio->nombre; ?></h4>
                                <p class="mb-4 text-dark"><?php echo $servicio->descripcion; ?></p>
                                <p class="mb-4 text-dark"><?php echo $servicio->precio; ?> €</p>
                        
                                <a href="./servicio?id=<?php echo $servicio->id;?>" class="btn btn-outline-warning bsb-btn-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi text-dark  link-light bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                    </svg>
                                </a>
                            </div>
                        </div> <!-- /Tarjeta -->
                    </div> <!-- /columna --> 
                    <?php
                    } else { //   if ($num_columnas > 0)

                        $num_columnas = 3;
                        $nuevafila = true; 
                    ?>
                        </div>  <!-- /fila -->
                        <div class='row gy-3 gy-md-4'> <!-- FILA -->
                        <div class='col-12 col-md-6 col-lg-4'><!-- 3 COLUMNAS POR FILA --> 
                        <div class="card border-warning m-2"> <!-- Tarjeta -->
                            <div class="card-body text-center text-dark p-4 p-xxl-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-box-fill text-warning mb-4" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z" />
                                </svg>
                                <h4 class="mb-4"><?php echo $servicio->nombre; ?></h4>
                                <p class="mb-4 text-dark"><?php echo $servicio->descripcion; ?></p>
                                <p class="mb-4 text-dark"><?php echo $servicio->precio; ?> €</p>
                        
                                <a href="./servicio?id=<?php echo $servicio->id;?>" class="btn btn-outline-warning bsb-btn-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi text-dark  link-light bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                    </svg>
                                </a>
                            </div>
                        </div> <!-- /Tarjeta -->
                    </div> <!-- /columna --> 

                  <?php  }  // if ($num_columnas > 0)
                    ?>
                
        <?php    }
        } // foreach ($servicios as $servicio) ?>
        </div> <!--  <div class="container-fluid"> --> 
      </div>
    </div>
  </div>
</section>

</main>