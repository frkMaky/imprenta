<?php
//debuguear($presupuestos);

?>
<!-- ---------------------- MAIN ---------------------- -->
<main>
    <h1 class="text-center">Área Cliente</h1> 

    <div class="d-flex justify-content-center flex-wrap">
        <section class="pedidos container-md text-center border border-5 p-3 border-warning rounded m-5">
            <h3>Tus Presupuestos</h3>
            
            <div class="enlaces container-md d-flex m-3 rounded display-2">
                <a href="/calcular_presupuesto" class="btn btn-warning display-5 text-dark link-light p-3 m-2 rounded">Calcular Nuevo Presupuesto</a>
            </div>
            <div class="container-md">

                <?php foreach ($presupuestos as $presupuesto ) { ?>
            
                    <div class="row d-flex align-items-center justify-content-between gx-0">
                    <div class="col-md-2 mb-4 w-10">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="nombre">#</label>
                            <input type="text" id="nombre" name="nombre" class="form-control form-control-lg text-center" disabled value="<?php echo $presupuesto->id;?>" disabled/>
                        </div>
                    </div>
                    <div class="col-md-2 mb-4 w-10">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="apellidos">Total</label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control form-control-lg text-center"  disabled value="<?php echo $presupuesto->total;?>"/>
                        </div>
                    </div>
                    <div class="col-md-2 mb-4 w-10">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="nombre">Medios</label>
                            <input type="text" id="nombre" name="nombre" class="form-control form-control-lg text-center" disabled value="<?php echo $presupuesto->medios;?>"/>
                        </div>
                    </div>
                    <div class="col-md-2 mb-4 w-10">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="apellidos">Fecha</label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control form-control-lg text-center" disabled value="<?php echo $presupuesto->fecha_presupuesto;?>"/>
                        </div>
                    </div>
                    <div class="col-md-2 mb-4 w-10">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="nombre">Estado</label>
                            <input type="text" id="nombre" name="nombre" class="form-control form-control-lg text-center" disabled value="<?php echo $presupuesto->estado;?>"/>
                        </div>
                    </div>
                    
                </div>
                <?PHP } ?>
            </div>
                
        </section>
    
        <section class="datosPersonales container-md text-left border border-5 p-3 border-warning rounded m-5">
            <h3>Tus Datos Personales</h3>

            <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" value="<?php echo $usuario->nombre;?>"/>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="apellidos">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control form-control-lg" value="<?php echo $usuario->apellidos;?>"/>
                    </div>
                </div>
            </div>
            
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="direccion">Dirección</label>
                <input type="text" id="direccion" name="direccion" class="form-control form-control-lg" value="<?php echo $usuario->direccion;?>"/>
            </div>

            
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" class="form-control form-control-lg" value="<?php echo $usuario->telefono;?>"/>
            </div>

            <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                <h6 class="mb-0 me-4">Sexo: </h6>
                
                <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" name="genero" id="mujer" value="mujer" <?PHP echo ($usuario->sexo == 'mujer'?'checked':'');?> />
                    <label class="form-check-label" for="mujer">Mujer</label>
                </div>

                <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" name="genero" id="hombre" value="hombre" <?PHP echo ($usuario->sexo == 'hombre'?'checked':'');?> />
                    <label class="form-check-label" for="hombre">Hombre</label>
                </div>

                <div class="form-check form-check-inline mb-0">
                    <input class="form-check-input" type="radio" name="genero" id="otro" value="otro" <?PHP echo (($usuario->sexo != 'hombre' && $usuario->sexo != 'mujer')?'checked':'');?> />
                    <label class="form-check-label" for="otro">Otro</label>
                </div>

            </div>

            <p class="lead text-danger text-center display-5">El email no se puede modificar</p>
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control form-control-lg" disabled value="<?php echo $usuario->email;?>"/>
            </div>

            <div class="mensajes container-sd d-flex justify-content-between">
                <p class="lead text-dark text-xl-left">Para modificar la contraseña hacerlo desde "Olvide Mi Contraseña"</p>
                <a href="/olvide" class="lead text-info text-center display-6"> Link a OLVIDE MI CONTRASEÑA</a>
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="text" id="password" disabled name="password" class="form-control form-control-lg" value="<?php echo $usuario->password;?>"/>
            </div>

            <input type="submit" class="btn btn-warning text-dark link-light p-2 m-2 rounded text-center" value="Guardar Cambios">
        </form>

        </section>
    </div>
</main>
