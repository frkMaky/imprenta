
<!-- ---------------------- MAIN ---------------------- -->
<main class="dashboard">
    <h1 class="text-center">Dashboard</h1> 
    <div class="d-flex justify-content-center flex-wrap">
        <section class="pedidos container-md text-center border border-5 border-warning rounded m-5 p-3">
            <h3>Administrar Noticias</h3>
            <table class="table table-striped">
            <thead>
                <tr class="fila">
                    <div class="campos">
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Fecha</th>
                    </div>
                </tr>
            </thead>
            <tbody>
            <form action="/noticia_nueva">
            <button class="btn btn-warning text-light link-dark" type="submit" value="Eliminar">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
            </svg><span class="display-6">Nueva Noticia</span>
            </button>
        </form>
            <?php foreach ($noticias as $noticia) { ?>
                <tr class="fila">
                            <div class="campos">
                                
                                <td><?php echo $noticia->id; ?></th>
                                <td><?php echo $noticia->titulo; ?></td>
                                <td><?php echo $noticia->id_autor; ?></td>
                                <td>
                                    <?php 
                                        foreach ($categorias as $categoria) {
                                            if ($categoria->id == $noticia->id_categoria) {
                                                echo $categoria->nombre; 
                                            }
                                        }
                                    ?>
                                </td>
                                <td class="img-thumbnail"><img src="build/medios/<?php echo $noticia->medios; ?>" alt="imagen"></td>
                                <td><?php echo $noticia->fecha_publicacion; ?></td>
                                <div class="acciones">
                                <td class="d-flex justify-content-around">
                                    <a class="btn btn-outline-warning me-2" href="/noticia?id=<?php echo $noticia->d; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-eye text-dark link-light" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                    </a>
                                    <a class="btn btn-outline-warning me-2" href="/noticia_editar?id=<?PHP echo  $noticia->id; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash text-dark link-light" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                    </a>
                                    <form action="/noticia_eliminar">
                                        <button class="btn btn-warning text-light link-dark" name="id" id="id" type="submit" value="<?PHP echo $noticia->id; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash text-light link-dark" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </div>
                          
                </tr>
            <?php } // foreach ($servicios as $servicio) ?>
            </tbody>
            </table>
        </section>
     
        <section class="pedidos container-md text-center border border-5 border-warning rounded m-5 p-3">
            <h3>Administrar Categorias</h3>
            <table class="table table-striped">
            <thead>
                <tr class="fila">
                    <div class="campos">
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                    </div>    
                </tr>
            </thead>
            <tbody>
            <form action="/categoria_nueva">
            <button class="btn btn-warning text-light link-dark" type="submit" value="Eliminar">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
            </svg><span class="display-6">Nueva Categoría</span>
            </button>
            <?php foreach ($categorias as $categoria) { ?>
                <tr>
                 <div class="fila">
                     </div>
                        <div class="campos">
                            <td><?php echo $categoria->id; ?></th>
                            <td><?php echo $categoria->nombre; ?></td>
                        </div>
                        <div class="acciones">
                            <td>
                                <a class="btn btn-outline-warning me-2" href="/categoria_editar?id=<?php echo $categoria->id; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash text-dark link-light" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                                </a>
                                <a class="btn btn-outline-warning me-2 bg-warning" href="/categoria_eliminar?id=<?php echo $categoria->id; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash text-light link-dark" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                                </a>
                             </td>
                        </div>

                    </tr>
            <?PHP } ?>
            </table>
        </section>
     
        <section class="datosPersonales container-md text-center border border-5 border-warning rounded m-5 p-3">
            <h3>Administrar Presupuestos</h3>
            <table class="table table-striped">
            <thead>
                <tr class="fila">
                    <div class="campos">
                        <th scope="col">#</th>
                        <th scope="col">ID USUARIO</th>
                        <th scope="col">Total</th>
                        <th scope="col">Fecha Presupuesto</th>
                        <th scope="col">Medios</th>
                        <th scope="col">Estado </th>
                        <th scope="col">Acciones</th>
                    </div>    
                </tr>
            </thead>
            <tbody>
            <?php foreach ($presupuestos as $presupuesto) { ?>
                <tr>
                 <div class="fila">
                     </div>
                        <div class="campos">
                            <td><?php echo $presupuesto->id; ?></th>
                            <td><?php echo $presupuesto->id_usuario; ?></td>
                            <td><?php echo $presupuesto->total; ?> €</td>
                            <td><?php echo $presupuesto->fecha_presupuesto; ?></td>
                            <td><?php echo $presupuesto->medios; ?></th>
                            <td class=" <?PHP echo ($presupuesto->estado=='CANCELADO')?'bg-danger text-light':''; ?> 
                            <?PHP echo ($presupuesto->estado=='ACEPTADO')?'bg-success text-light':''; ?>">
                                <?php echo $presupuesto->estado; ?></td>
                        </div>
                        <div class="acciones">
                            <td>
                                <a class="btn btn-outline-warning me-2" href="/presupuesto_aceptar?id=<?php echo $presupuesto->id; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2 text-info link-light" viewBox="0 0 16 16">
                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                                </svg>
                                </a>
                                <a class="btn btn-outline-warning me-2" href="/presupuesto_cancelar?id=<?php echo $presupuesto->id; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x text-danger link-light" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                </svg>
                                </a>
                                <a class="btn btn-outline-warning me-2" href="/presupuesto_pendiente?id=<?php echo $presupuesto->id; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-question-lg  text-warning link-light" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.475 5.458c-.284 0-.514-.237-.47-.517C4.28 3.24 5.576 2 7.825 2c2.25 0 3.767 1.36 3.767 3.215 0 1.344-.665 2.288-1.79 2.973-1.1.659-1.414 1.118-1.414 2.01v.03a.5.5 0 0 1-.5.5h-.77a.5.5 0 0 1-.5-.495l-.003-.2c-.043-1.221.477-2.001 1.645-2.712 1.03-.632 1.397-1.135 1.397-2.028 0-.979-.758-1.698-1.926-1.698-1.009 0-1.71.529-1.938 1.402-.066.254-.278.461-.54.461h-.777ZM7.496 14c.622 0 1.095-.474 1.095-1.09 0-.618-.473-1.092-1.095-1.092-.606 0-1.087.474-1.087 1.091S6.89 14 7.496 14"/>
                                </svg>
                                </a>
                             </td>
                        </div>

                    </tr>
            <?PHP } ?>
            </table>
        </section>
        
        <section class="datosPersonales container-md text-center border border-5 border-warning rounded m-5 p-3">
            <h3>Gestionar Usuarios</h3>
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Confirmado</th>
                <th scope="col">Rol</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($usuarios as $usuario) { ?>
                <tr>
                    <td><?php echo $usuario->id; ?></th>
                    <td><?php echo $usuario->nombre; ?></td>
                    <td><?php echo $usuario->apellidos; ?></td>
                    <td><?php echo $usuario->email; ?></td>
                    <td><?php echo $usuario->telefono; ?></th>
                    <td><?php echo $usuario->confirmado?"SI":"NO"; ?></td>
                    <td class="<?PHP echo ($usuario->rol=='admin')?'bg-info text-light':''; ?> "><?php echo $usuario->rol; ?></td>
                    <td class="d-flex justify-content-around">

                        <?PHP if ($usuario->confirmado ==  "1") { ?>
                            <a class="btn btn-outline-warning me-2" href="/usuario_ver?id=<?php echo $usuario->id; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-eye text-dark link-light" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                            </svg>
                            </a>
                            <?PHP if($usuario->nombre != 'admin') { ?>
                                <?PHP if ($usuario->rol ==  "admin") { ?>
                                    <a class="btn btn-outline-warning me-2" name="id" id="botonDescenderUsuario" href="/usuario_degradar?id=<?php echo $usuario->id; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1"/>
                                    </svg>
                                    </a>
                                <?PHP } else { ?>
                                    <a class="btn btn-outline-warning me-2" name="id" id="botonPromocionarUsuario" href="/usuario_promocionar?id=<?php echo $usuario->id; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-up text-dark link-light" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5"/>
                                    </svg>
                                    </a>
                                <?PHP } ?>
                                
                                <form action="/usuario_bloquear?id=<?php echo $usuario->id; ?>" method="GET">
                                    <button class="btn btn-warning text-light link-dark" name="id" id="botonBloquearUsuario" type="submit" value="<?php echo $usuario->id; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                        <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                                    </svg>
                                    </button>
                                </form>
                            
                            <?PHP } // si no es admin ?>
                        <?PHP } else { ?>
                            <form action="/usuario_desbloquear?id=<?php echo $usuario->id; ?>" method="GET">
                                <button class="btn btn-warning text-light link-dark" name="id" id="botonDesbloquearUsuario" type="submit" value="<?php echo $usuario->id; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                                </svg>
                                </button>
                            </form>
                        <?PHP } ?>
                    </td>
                </tr>
            <?php } // foreach ($servicios as $servicio) ?>
            </tbody>
            </table>
        </section>

        <section class="pedidos container-md text-center border border-5 border-warning rounded m-5 p-3">
            <h3>Administrar Servicios</h3>
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Imagen</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <form action="/servicio_nuevo">
            <button class="btn btn-warning text-light link-dark" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
            </svg> <span class="display-6">Nuevo Servicio</span>
            </button>
            </form>
            <?php foreach ($servicios as $servicio) { ?>
                <tr>
                    <td><?php echo $servicio->id; ?></th>
                    <td><?php echo $servicio->nombre; ?></td>
                    <td><?php echo $servicio->descripcion; ?></td>
                    <td><?php echo $servicio->precio; ?> €</td>
                    <?php if ($servicio->medios == "" || is_null($servicio->medios) ) { ?>
                        <td class="img-thumbnail">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-box-fill text-warning mb-4" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z" />
                        </svg>
                        </td>
                    <?php } else { ?>
                        <td class="img-thumbnail">
                            <img src="build/medios/<?php echo $servicio->medios; ?>" alt="imagen">
                        </td>
                    <?php } ?>

                    <td class="d-flex justify-content-between">
                        <a class="btn btn-outline-warning me-2" href="/servicio?id=<?PHP echo $servicio->id; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-eye text-dark link-light" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                        </svg>
                        </a>
                        <a class="btn btn-outline-warning me-2" href="/servicio_editar?id=<?php echo $servicio->id; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash text-dark link-light" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                        </a>
                        <form action="/servicio_eliminar?id=<?php echo $servicio->id; ?>" method="get">
                            <button class="btn btn-warning text-light link-dark" id="id" name="id"  type="submit" value="<?php echo $servicio->id; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash text-light link-dark" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php } // foreach ($servicios as $servicio) ?>
            </tbody>
            </table>
        </section>
    </div>
</main>