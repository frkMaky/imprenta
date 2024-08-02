<?php
    //debuguear($servicio);

?>
<main>
    <h1 class="text-center">Editar Servicio</h1> 
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
                        <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" value="<?php echo $servicio->nombre;?>"/>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">    
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="descripcion">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control form-control-lg"><?php echo $servicio->descripcion;?></textarea>
                    </div>
                </div>


                <div class="col-md-6 mb-4">    
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="precio">Precio</label>
                        <input type="number" step="0.01" id="precio" name="precio" min="0" class="form-control form-control-lg" value="<?php echo (float)$servicio->precio;?>"/>
                    </div>
                </div>


                <div class="col-md-6 mb-4">    
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="medios">Imagen </label>
                        <input type="file" id="urlmedios" name="medios" class="form-control form-control-lg" value=""/>
                        <div class="thumbnail m-3 p-1">
                            <img src="/build/medios/<?php echo $servicio->medios; ?>" alt="Imagen <?PHP echo $servicio->titulo ?? ''; ?>">
                        </div>
                    </div>
                </div>
                <input type="submit" value="Actualizar Servicio" class="btn btn-warning text-dark link-light">
            </div>
    </form>

</main>