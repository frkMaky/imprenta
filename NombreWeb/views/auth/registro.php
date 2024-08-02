<?php

// debuguear($alertas['error']);

?>
<!-- ---------------------- MAIN ---------------------- -->
<main>
    <h1 class="text-center">Registrarse</h1> 
    <p class="text-center">Rellena el formulario con tus datos para registrarte y acceder a nuestros servicios</p>




    <section class="w-100 px-4 py-5 bg-warning bg-opacity-50" style="border-radius: .5rem .5rem 0 0;">
    <style>
        .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
        }

        .card-registration .select-arrow {
        top: 13px;
        }
    </style>
    <form method="post" id="formularioRegistro" name="formularioRegistro">
        <div class="row">
            <div class="col">
                <div class="card card-registration">
                    <div class="row g-0">
                        <div class="col-xl-6 d-flex justify-content-center align-items-center d-xl-block">
                            <img src="build/img/reunion.avif" alt="Reunión" class="img-fluid"/>
                        </div>
                        <div class="col-xl-6">
                            <div class="card-body p-md-5">
                                <h4 class="mb-5 text-uppercase">Formulario de registro:</h4>
                                <?php if (!empty($alertas)) { ?>
                                    <div class="container-md error">
                                        <?PHP foreach ($alertas['error'] as $alerta) {
                                            echo "<p class='text-center bg-danger text-light'>{$alerta}</p>";
                                        } ?>
                                    </div>
                                <?PHP } ?>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="nombre">Nombre</label>
                                            <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="apellidos">Apellidos</label>
                                            <input type="text" id="apellidos" name="apellidos" class="form-control form-control-lg" />
                                        </div>
                                    </div>
                                </div>
       
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="password2">Repetir Password</label>
                                    <input type="password" id="password2" name="password2" class="form-control form-control-lg" />
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="direccion">Dirección</label>
                                    <input type="text" id="direccion" name="direccion" class="form-control form-control-lg" />
                                </div>

                                
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="telefono">Teléfono</label>
                                    <input type="tel" id="telefono" name="telefono" class="form-control form-control-lg" />
                                </div>

                                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                    <h6 class="mb-0 me-4">Sexo: </h6>

                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="sexo" id="mujer" value="mujer" />
                                        <label class="form-check-label" for="mujer">Mujer</label>
                                    </div>

                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="sexo" id="hombre" value="hombre" />
                                        <label class="form-check-label" for="hombre">Hombre</label>
                                    </div>

                                    <div class="form-check form-check-inline mb-0">
                                        <input class="form-check-input" type="radio" name="sexo" id="otro" value="otro" />
                                        <label class="form-check-label" for="otro">Otro</label>
                                    </div>

                                </div>

                               
                                <div class="d-flex justify-content-end pt-3">
                                    <button  type="reset" data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg">Reset </button>
                                    <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning text-dark link-light btn-lg ms-2">Registrarse</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </section>
    
</main>