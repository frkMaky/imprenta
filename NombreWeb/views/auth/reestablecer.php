
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
                        <div class="col-xl-6 d-none d-xl-block">
                            <img src="build/img/reunion.avif" alt="Reunión" class="img-fluid"/>
                        </div>
                        <div class="col-xl-6">
                            <div class="card-body p-md-5">
                                <h4 class="mb-5 text-uppercase">Reestablece tu password:</h4>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
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