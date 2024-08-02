
<!-- ---------------------- MAIN ---------------------- -->
<main>
    <h1 class="text-center">Ver Usuario</h1> 

    <form method="post" enctype="multipart/form-data">
            <div class="container-md d-flex flex-column justify-content-center align-items-center">
            
                <div class="col-md-6 mb-4">    
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="nombre">Nombre</label>
                        <input type="text" disabled id="nombre" name="nombre" class="form-control form-control-lg text-center" value="<?PHP echo $usuario->nombre; ?>"/>
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="apellidos">Apellidos</label>
                        <input type="text" disabled id="apellidos" name="apellidos" class="form-control form-control-lg text-center" value="<?PHP echo $usuario->apellidos; ?>"/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">    
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="telefono">Teléfono</label>
                        <input type="text" disabled id="telefono" name="telefono" class="form-control form-control-lg text-center" value="<?PHP echo $usuario->telefono; ?>"/>
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="text" disabled id="email" name="email" class="form-control form-control-lg text-center" value="<?PHP echo $usuario->email; ?>"/>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="direccion">Dirección</label>
                        <input type="text" disabled id="direccion" name="direccion" class="form-control form-control-lg text-center" value="<?PHP echo $usuario->direccion; ?>"/>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">    
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="rol">Rol</label>
                        <input type="text" disabled id="rol" name="rol" class="form-control form-control-lg text-center" value="<?PHP echo $usuario->rol; ?>"/>
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="confirmado">Confirmado</label>
                        <input type="text" disabled id="confirmado" name="confirmado" class="form-control form-control-lg text-center" value="<?PHP echo $usuario->confirmado?'SI':'NO'; ?>"/>
                    </div>
                </div>
            </div>
    </form>
    
</main>
