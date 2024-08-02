<?php 

//debuguear($categoria)
?>
<!-- ---------------------- MAIN ---------------------- -->
<main>
    <h1 class="text-center">Editar Categoria</h1> 
    <?php if (!empty($alertas)) { ?>
        <div class="container-md error">
            <?PHP foreach ($alertas['error'] as $alerta) {
                echo "<p class='text-center bg-danger text-light'>{$alerta}</p>";
            } ?>
        </div>
    <?PHP } ?>
    <form method="post" enctype="multipart/form-data">
            <div class="container-md d-flex flex-column justify-content-center align-items-center">
            
                <div class="col-md-6 mb-4">    
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" value="<?php echo $categoria->nombre; ?>"/>
                    </div>
                </div>

                <input type="submit" value="Actualizar Categoría" class="btn btn-warning text-dark link-light">
            </div>
    </form>
    
</main>