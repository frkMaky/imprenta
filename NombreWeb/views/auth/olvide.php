<!-- ---------------------- MAIN ---------------------- -->
<main>
    <h1 class="text-center">Recuperar tu contraseña</h1> 
    <?php if (!empty($alertas)) { ?>
        <div class="container-md error">
            <?PHP foreach ($alertas['error'] as $alerta) {
                echo "<p class='text-center bg-danger text-light'>{$alerta}</p>";
            } ?>
        </div>
    <?PHP } ?>
    <p class="text-center">Rellena el formulario y te enviaremos un EMAIL con las INSTRUCCIONES para resetear tu contraseña</p>
    <section class="w-100 p-4 d-flex justify-content-center pb-4">
        <form style="width: 22rem;" method="post">
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control" />
                <label class="form-label" for="email">Email </label>
            </div>

            <!-- Submit button -->
            <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning text-dark link-danger">Enviar EMAIL con INSTRUCCIONES</button>

        </form>
    </section>

</main>