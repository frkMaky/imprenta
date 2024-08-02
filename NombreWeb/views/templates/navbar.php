<?php
    require_once( __DIR__ . '/../../includes/database.php');

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    //debuguear(RUTA_INICIAL . "noticias.php");
?>
<!-- --------------- NAVBAR --------------- -->
<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
    <li><a href="/" class="nav-link px-2 link-warning text-dark">Inicio</a></li>
    <li><a href="/noticias" class="nav-link px-2 link-warning text-dark">Noticias</a></li>
    <li><a href="/servicios" class="nav-link px-2 link-warning text-dark">Servicios</a></li>
    <li><a href="/contacto" class="nav-link px-2 link-warning text-dark">Contacto</a></li>
    <?php if (isset($_SESSION['rol'])) {  ?>
        <li><a href="/area_cliente" class="nav-link px-2 link-warning text-dark">Área Cliente</a></li>
        <?php if ($_SESSION['rol']=='admin') { ?>
            <li><a href="/dashboard" class="nav-link px-2 link-warning text-dark">Dashboard</a></li>
        <?php } // if ($_SESSION['rol']=='admin')  ?>
    <?php } // if (isset($_SESSION))  ?>
</ul>

<div class="col-md-3 text-end botonesNavbar">
    <?php if (isset($_SESSION['rol'])) {  ?>
        <div class="d-grid  gx-2 align-items-center">
            <p><span><?php echo $_SESSION['email']; ?></span></p>
            <form method="post" action="/logout">
                <button type="submit" class="btn btn-warning text-light link-dark" id="botonCerrarSesion">Cerrar Session</button> 
            </form>
        </div>
    <?php } else { // if (isset($_SESSION))  ?>
        <div class="d-grid-3  gx-2 align-items-center">
            <p class="text-center"><span>Invitado</span></p>
            <a href="/login" class="btn btn-outline-warning me-2" id="botonIniciarSesion">Iniciar Sesión</a>
            <a href="/registro" class="btn btn-warning text-light link-dark" id="botonRegistrarse">REGISTRATE</a>
        </div>
    <?php } // if (isset($_SESSION))  ?>
</div>