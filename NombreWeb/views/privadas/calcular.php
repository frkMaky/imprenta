
<main>

<div class="container-sm">

<!-- FORMULARIO -->
<h2 class="text-center mt-5">Calcula tu presupuesto</h2>
<form id="formPresupuesto" class="row g-3 needs-validation d-flex flex-column justify-content-center align-items-center gx-2" method='POST'>

    <!-- PRESUPUESTO -------------------------->
    
    <!-- Servicio -->
     <div class="m-2 p-2">
         <label for="selectServicio">Servicio</label>
         <select class="form-select display-3" id="selectServicio" name="selectServicio">
             
             <option value=0> Escoge tu servicio </option> 
                <?php foreach ($servicios as $servicio) { ?>
                    <option selected="selected" class="display-6" value="<?php echo $servicio->precio;?>"><?php echo $servicio->nombre . ' (' . $servicio->precio . ' €)';?></option>
                <?php } ?>
         </select>
         <div class="invalid-feedback" id="validarServicio"></div>
     </div>

    <!-- PLAZOS -->
    <div class="m-2 p-2 d-flex justify-content-center align-items-center">
        <label for="plazo" class="m-2">Plazo (meses): </label>
        <!--  DEFAULT 1 -->
        <input type="number" class="form-control-lg" id="plazo" name="plazo" value="1" min=0 max=5>
        <div class="invalid-feedback" id="validarPlazo"></div>
    </div>

    <!-- EXTRAS --> 
    <div class="checksExtras m-2 p-2 wrap">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="flexCheckDefault1" id="flexCheckDefault1">
            <label class="form-check-label" for="flexCheckDefault">
                Extra 1 (15€)
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="2" name="flexCheckDefault2" id="flexCheckDefault2">
            <label class="form-check-label" for="flexCheckDefault">
                Extra 2 (15€)
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="3" name="flexCheckDefault3" id="flexCheckDefault3">
            <label class="form-check-label" for="flexCheckDefault">
                Extra 3 (15€)
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="4" name="flexCheckDefault4" id="flexCheckDefault4">
            <label class="form-check-label" for="flexCheckDefault">
                Extra 4 (15€)
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="5" name="flexCheckDefault5" id="flexCheckDefault5">
            <label class="form-check-label" for="flexCheckDefault">
                Extra 5 (15€)
            </label>
        </div>
    </div>

    <!-- Presupuesto Estimado -->
    <div class="m-2 p-2 d-flex justify-content-center align-items-center">
        <label for="presupuestoEstimado" class="lead m-2">Total presupuesto: </label>
        <input type="number" class="form-control-lg" name="presupuestoEstimado" id="presupuestoEstimado" value=10 readonly>
        <label for="presupuestoEstimado" class="m-2">€</label>
    </div>

    <div class="invalid-feedback" id="validarFormulario"></div>

    <button type="submit" id="botonEnviar" class="btn btn-warning display-5 p-3 rounded text-dark link-light">Enviar Presupuesto</button>
</form>

</div>

</main>