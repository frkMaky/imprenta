(function(){

    $('#botonEnviar').click(function(e){
        e.preventDefault();
        let servicioEscogido = 100; // Servicio por defecto
        let plazoEscogido = 1; // Plazo por defecto
        let extrasSeleccionados = new Array(); // 0 no seleccionado - 1 seleccionado

        const presupuestoEstimado = document.querySelector('#presupuestoEstimado'); 
        //presupuestoEstimado.value = 10; // Presupuesto por defecto
            // Comprobar servicio escogido 
            if ($("#selectServicio").val() != 100) {
                servicioEscogido = $("#selectServicio").val();
            }
            // Comprobar servicio escogido 
            if ($("#plazo").val() != 1) {
                plazoEscogido = $("#plazo").val();
            }
    
            // Comprobar extras
            $(".form-check-input").each(function () {
                if ($(this).is(':checked')) {
                    extrasSeleccionados.push(15); // 15€ cada extra
                }
            })
            // CALCULO DE LOS PRESUPUESTOS
            
            let presupuesto = {
                producto:$("#selectServicio").val(),
                plazo:$("#plazo").val(),
                extras: extrasSeleccionados,
                total: 10 + parseFloat(servicioEscogido) + parseFloat(plazoEscogido * 20) + (extrasSeleccionados.length * 15)
            }
            $('#formPresupuesto').submit();
       
    });
    calcularPresupuesto();

    // Eventos de cambio 
    $("#selectServicio").change(()=>{
        calcularPresupuesto();
    });

    $("#plazo").change(()=>{
        calcularPresupuesto();
    });

    // Comprobar cambios CHECK
    $('.form-check-input').change( function() {
        $('.form-check-input').each(function () {
            calcularPresupuesto();
        }); 
    });
})();

function calcularPresupuesto() {
    let presupuestoEstimado = 10; // presupuesto por defecto
    
    presupuestoEstimado += parseFloat($("#selectServicio").val());
    presupuestoEstimado += parseFloat($("#plazo").val()) * 20;

    // Comprobar extras seleccionados
    $('.form-check-input').each(function () {
        if ($(this).is(':checked')) {
            presupuestoEstimado += 15;
        }
    });

    $("#presupuestoEstimado").val(presupuestoEstimado);
}
