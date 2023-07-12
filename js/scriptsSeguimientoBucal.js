//***SEGUIMIENTO DEL PACIENTE***




// COMPLICACIONES RT
$(document).ready(function() {
    $('#msnuevascomplicacionesrt').change(function(e) { 
    }).multipleSelect({
        width: '100%'
    });
});

// Habilita Fecha Dx Progresión:
$(document).ready(function() {
    $('#progresionenfermedad').change(function(e) {
        if ($(this).val() === "Si") {
            $('#idfechaprogresion').prop("hidden", false);
            
        } else if ($(this).val() === "No") {
            $('#idfechaprogresion').prop("hidden", true);
            
        }
    })
});

$(function() {
    $('#idfechaprogresion').prop("hidden", true);
})


// Habilita Recurrencia de la Enfermedad:
$(document).ready(function() {
    $('#recurrencianenfermedad').change(function(e) {
        if ($(this).val() === "Si") {
            $('#recurrenciadate').prop("hidden", false);
            
        } else if ($(this).val() === "No") {
            $('#recurrenciadate').prop("hidden", true);
            
        }
    })
});

$(function() {
    $('#recurrenciadate').prop("hidden", true);
})


// Habilita Recurrencia de la Enfermedad:
$(document).ready(function () {

    $('#ameritareintervencion').change(function (e) {
        if ($(this).val() === "Si") {

            $('#datereintervencion').prop("hidden", false);
            $('#lateralidadqt').prop("hidden", false);
        } else {
            $('#datereintervencion').prop("hidden", true);
            $('#lateralidadqt').prop("hidden", true);
            $('#fechareintenvencion').val('');
            $('#lateralidadreintervencion').prop("selectedIndex", 0);
        }
    })
});

$(function() {
    $('#datereintervencion').prop("hidden", true);
    $('#lateralidadqt').prop("hidden", true);
})




// SELECT MÚLTIPLE PARA ESQUEMA DE QT
$(document).ready(function() {
    $('#msnuevaquimio').change(function(e) { 
    }).multipleSelect({
        width: '100%'
    });
});

// Habilita NUEVA QT:
$(document).ready(function() {
    $('#ameritanuevaqt').change(function(e) {
        if ($(this).val() === "Si") {
            $('#idnuevaqt').prop("hidden", false);
            $('#idnuevomomentoQT').prop("hidden", false);
            
        } else if ($(this).val() === "No") {
            $('#idnuevaqt').prop("hidden", true);
            $('#idnuevomomentoQT').prop("hidden", true);
            
        }
    })
});

$(function() {
    $('#idnuevaqt').prop("hidden", true);
    $('#idnuevomomentoQT').prop("hidden", true);
})



// Habilita las opciones de RADIOTERAPIA en el modal de seguimiento
$(document).ready(function() {
    $('#ameritaradioterapia').change(function(e) {
        if ($(this).val() === "Si") {
            $('#idfechanueva').prop("hidden", false);
            $('#idnuevomomentoRT').prop("hidden", false);
            $('#idnuevadosisradio').prop("hidden", false);
            $('#idnuevasfraccionesRT').prop("hidden", false);
            $('#idnuevonofraccionesRT').prop("hidden", false);
            $('#idnuevatecnica').prop("hidden", false);
            $('#idnuevascomplicaciones').prop("hidden", false);


        } else if ($(this).val() === "No") {
            $('#idfechanueva').prop("hidden", true);
            $('#idnuevomomentoRT').prop("hidden", true);
            $('#idnuevadosisradio').prop("hidden", true);
            $('#idnuevasfraccionesRT').prop("hidden", true);
            $('#idnuevonofraccionesRT').prop("hidden", true);
            $('#idnuevatecnica').prop("hidden", true);
            $('#idnuevascomplicaciones').prop("hidden", true);


            $('#fechanueva').val('');
            $('#nuevomomentoRT').prop('selectedIndex',0);
            $('#nuevadosis').val('');
            $('#nuevasfraccionesRT').val('');
            $('#nuevonofraccionesRT').val('');
            $('#nuevatecticaRT').prop('selectedIndex', 0);

        }
    })
});



$(function() {
    $('#idfechanueva').prop("hidden", true);
    $('#idnuevomomentoRT').prop("hidden", true);
    $('#idnuevadosisradio').prop("hidden", true);
    $('#idnuevasfraccionesRT').prop("hidden", true);
    $('#idnuevonofraccionesRT').prop("hidden", true);
    $('#idnuevatecnica').prop("hidden", true);
    $('#idnuevascomplicaciones').prop("hidden", true);
})




// Habilita CUIDADOS PALIATIVOS
$(document).ready(function() {
    $('#cuidadospaliativos').change(function(e) {
        if ($(this).val() === "Si") {
            $('#paliativaclinica').prop("hidden", false);
            
        } else if ($(this).val() === "No") {
            $('#paliativaclinica').prop("hidden", true);
            
        }
    })
});

$(function() {
    $('#paliativaclinica').prop("hidden", true);
})