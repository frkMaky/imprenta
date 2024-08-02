
<!-- ---------------------- MAIN ---------------------- -->
<main>
    <h1 class="text-center">Iniciar Sesión</h1> 

    <p class="text-center">Rellena el formulario con tus datos para entrar en su área privada</p>
    <?php if (!empty($alertas)) { ?>
        <div class="container-md error">
            <?PHP foreach ($alertas['error'] as $alerta) {
                echo "<p class='text-center bg-danger text-light'>{$alerta}</p>";
            } ?>
        </div>
    <?PHP } ?>
    <section class="w-100 p-4 d-flex justify-content-center pb-4">
        <form style="width: 22rem;" method="post" >
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="email">Email </label>
                <input type="email" name="email" id="email" class="form-control" />
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label"  for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" />
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input bg-warning text-dark" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label" for="form2Example31"> Recordarme </label>
                    </div>
                </div>

                <div class="col">
                    <!-- Simple link -->
                    <a href="./olvide" class="text-warning link-dark text-decoration-none">¿Olvidaste tu contraseña?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning text-dark link-danger">Entrar a tu área privada</button>

        </form>
    </section>


</main>