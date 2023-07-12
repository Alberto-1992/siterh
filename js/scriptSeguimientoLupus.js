// Habilita tipo biopsia 
$(document).ready(function() {
    $('#biopsiaRenalseguimiento').change(function(e) {
        if ($(this).val() === "Si") {
            $('#idtipobiopsiaseguimiento').prop("hidden", false);
        } else if ($(this).val() === "No") {
            $('#idtipobiopsiaseguimiento').prop("hidden", true);
        }
    })
});
$(function() {
    $('#idtipobiopsiaseguimiento').prop("hidden", true);
})


// Habilita Valor anticuerpos

$(document).ready(function() {
    $('#seganticardioigm').change(function(e) {
        if ($(this).val() === "Positivo") {
            $('#segvalorigm').prop("hidden", false);
        } else if ($(this).val() === "Negativo") {
            $('#segvalorigm').prop("hidden", true);
        }
    })
});
$(document).ready(function() {
    $('#seganticardioigg').change(function(e) {
        if ($(this).val() === "Positivo") {
            $('#segvalorigg').prop("hidden", false);
        } else if ($(this).val() === "Negativo") {
            $('#segvalorigg').prop("hidden", true);
        }
    })
});

$(document).ready(function() {
    $('#segb2gpi').change(function(e) {
        if ($(this).val() === "Positivo") {
            $('#segvalorgpi').prop("hidden", false);
        } else if ($(this).val() === "Negativo") {
            $('#segvalorgpi').prop("hidden", true);
        }
    })
});

$(document).ready(function() {
    $('#segb2gpiIGM').change(function(e) {
        if ($(this).val() === "Positivo") {
            $('#segvalorgpiIGM').prop("hidden", false);
        } else if ($(this).val() === "Negativo") {
            $('#segvalorgpiIGM').prop("hidden", true);
        }
    })
});
$(function() {
    $('#segvalorigm').prop("hidden", true);
    $('#segvalorigg').prop("hidden", true);
    $('#segvalorgpi').prop("hidden", true);
    $('#segvalorgpiIGM').prop("hidden", true);
})


//FUNCIONES PARA DESHABILITAR LOS CHECK AL SELECCIONAR NO

$(function () {
    $('#sdosisSemanalmetro').prop("disabled", true);
    $('#sdosisDiariaHidro').prop("disabled", true);
    $('#sdosisDiariaAzatioprina').prop("disabled", true);
    $("#sdosisDiariaPrednisona").prop("disabled", true);
    $("#sdosisDiariaMicofenolato").prop("disabled", true);
    $("#sdosisMensualCiclofosfamida").prop("disabled", true);
    $("#sdosisSemanalmetro").val('0');
    $("#sdosisDiariaHidro").val('0');
    $("#sdosisDiariaAzatioprina").val('0');
    $("#sdosisDiariaPrednisona").val('0');
    $("#sdosisDiariaMicofenolato").val('0');
    $("#sdosisMensualCiclofosfamida").val('0');
})
//ACCIÓN METROTEXATE
function metrotexatesi(){
    let smetrotexate = $("#smetrotexate1").val();
    if(smetrotexate == 'si'){
        $("#sdosisSemanalmetro").prop('disabled', false);
        $("#sdosisSemanalmetro").val('');
    };
    
}
function smetrotexateno(){
    let smetrotexate = $("#smetrotexate2").val();
    if(smetrotexate == 'no'){
        $("#sdosisSemanalmetro").prop('disabled', true);
        $("#sdosisSemanalmetro").val('0');
s
    };
    
}


//ACCIÓN Hidroxicloroquina
function sHidroxicloroquinasi(){
    let sHidroxicloroquina = $("#sHidroxicloroquina1").val();
    if(sHidroxicloroquina == 'si'){
        $("#sdosisDiariaHidro").prop('disabled', false);
        $("#sdosisDiariaHidro").val('');
    };
    
}
function sHidroxicloroquinano(){
    let sHidroxicloroquina = $("#sHidroxicloroquina2").val();
    if(sHidroxicloroquina == 'no'){
        $("#sdosisDiariaHidro").prop('disabled', true);
        $("#sdosisDiariaHidro").val('0');

    };
    
}


//ACCIÓN Azatioprina
function sAzatioprinasi(){
    let sAzatioprina = $("#sAzatioprina1").val();
    if(sAzatioprina == 'si'){
        $("#sdosisDiariaAzatioprina").prop('disabled', false);
        $("#sdosisDiariaAzatioprina").val('');
    };
    
}
function sAzatioprinano(){
    let sAzatioprina = $("#sAzatioprina2").val();
    if(sAzatioprina == 'no'){
        $("#sdosisDiariaAzatioprina").prop('disabled', true);
        $("#sdosisDiariaAzatioprina").val('0');

    };
    
}


//ACCIÓN Prednisona
function sPrednisonasi(){
    let sPrednisona = $("#sPrednisona1").val();
    if(sPrednisona == 'si'){
        $("#sdosisDiariaAzatioprina").prop('disabled', false);
        $("#sdosisDiariaAzatioprina").val('');
    };
    
}
function sPrednisonano(){
    let sPrednisona = $("#sPrednisona2").val();
    if(sPrednisona == 'no'){
        $("#sdosisDiariaPrednisona").prop('disabled', true);
        $("#sdosisDiariaPrednisona").val('0');

    };
    
}




//ACCIÓN Micofenolato
function sMicofenolatosi(){
    let sMicofenolato = $("#sMicofenolato1").val();
    if(sMicofenolato == 'si'){
        $("#sdosisDiariaMicofenolato").prop('disabled', false);
        $("#sdosisDiariaMicofenolato").val('');
    };
    
}
function sMicofenolatono(){
    let sMicofenolato = $("#sMicofenolato2").val();
    if(sMicofenolato == 'no'){
        $("#sdosisDiariaMicofenolato").prop('disabled', true);
        $("#sdosisDiariaMicofenolato").val('0');

    };
    
}


//ACCIÓN Micofenolato
function siclofosfamidasi(){
    let sCiclofosfamida = $("#sCiclofosfamida1").val();
    if(sCiclofosfamida == 'si'){
        $("#sdosisMensualCiclofosfamida").prop('disabled', false);
        $("#sdosisMensualCiclofosfamida").val('');
    };
    
}
function sCiclofosfamidano(){
    let sCiclofosfamida = $("#sCiclofosfamida2").val();
    if(sCiclofosfamida == 'no'){
        $("#sdosisMensualCiclofosfamida").prop('disabled', true);
        $("#sdosisMensualCiclofosfamida").val('0');

    };
    
}

