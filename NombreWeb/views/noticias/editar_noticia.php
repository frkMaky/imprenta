<main>
    <h1 class="text-center">Editar Noticia</h1> 
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
                        <label class="form-label" for="titulo">Título</label>
                        <input type="text" id="titulo" name="titulo" class="form-control form-control-lg" value="<?PHP echo $noticia->titulo;?>"/>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">    
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="cuerpo">Cuerpo</label>
                        <textarea id="cuerpo" name="cuerpo" class="form-control form-control-lg"><?PHP echo $noticia->cuerpo;?></textarea>
                    </div>
                </div>

                <div class="col-md-6 mb-4">    
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="categoria">Categoria</label>
                        <select id="categoria" name="categoria" class="form-control form-control-lg">
                            <?php foreach ($categorias as $categoria) { ?>
                                <option value="<?php echo $categoria->id;?>"><?php echo $categoria->nombre;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6 mb-4">    
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="medios">Imagen </label>
                        <input type="file" id="urlmedios" name="medios" class="form-control form-control-lg" value=""/>
                        <div class="thumbnail m-3 p-1">
                            <img src="/build/medios/<?php echo $noticia->medios; ?>" alt="Imagen <?PHP echo $noticia->titulo ?? ''; ?>">
                        </div>
                    </div>
                </div>
                <input type="submit" value="Actualizar Noticia" class="btn btn-warning text-dark link-light">
            </div>
    </form>

</main>