function soloLetras(e) {
    textoArea = document.getElementById("curplupus").value;
    var total = textoArea.length;
    if (total == 0) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ"; //Se define todo el abecedario que se quiere que se muestre.
        especiales = [8, 9, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

        tecla_especial = false
        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            alertify.error('No puedes iniciar escribiendo numeros');
            return false;
        }
    }
}
function Edad(FechaNacimiento) {

    var fechaNace = new Date(FechaNacimiento);
    var fechaActual = new Date()

    var mes = fechaActual.getMonth();
    var dia = fechaActual.getDate();
    var año = fechaActual.getFullYear();

    fechaActual.setDate(dia);
    fechaActual.setMonth(mes);
    fechaActual.setFullYear(año);

    edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));

    return edad;


}

function calcularEdadlupus() {
    var fecha = document.getElementById('fechalupus').value;


    var edad = Edad(fecha);
    document.formulariolupus.edadlupus.value = edad;

}
function curp2datelupus(curp) {
    var miCurp = document.getElementById('curplupus').value.toUpperCase();
    var sexo = miCurp.substr(-8, 1);
    var m = miCurp.match(/^\w{4}(\w{2})(\w{2})(\w{2})/);
    //miFecha = new Date(año,mes,dia) 
    var anyo = parseInt(m[1], 10) + 1900;
    if (anyo < 1940) anyo += 100;
    var mes = parseInt(m[2], 10) - 1;
    var dia = parseInt(m[3], 10);
    document.formulariolupus.fechalupus.value = (new Date(anyo, mes, dia));
    if (sexo == 'M') {
        document.formulariolupus.sexolupus.value = 'Femenino';
    } else if (sexo == 'H') {
        document.formulariolupus.sexolupus.value = 'Masculino';
    } else if (sexo != 'M' || 'H') {
        alert('Error de CURP');
    }
    calcularEdadlupus();
    

}
Date.prototype.toString = function() {
    var anyo = this.getFullYear();
    var mes = this.getMonth() + 1;
    if (mes <= 9) mes = "0" + mes;
    var dia = this.getDate();
    if (dia <= 9) dia = "0" + dia;
    return anyo + "-" + mes + "-" + dia;
}
window.addEventListener('DOMContentLoaded', (evento) => {
    const hoy_fecha = new Date().toISOString().substring(0, 10);
    document.querySelector("input[name='fechalupus']").max = hoy_fecha;

});
function calculaIMClupus() {

    let talla = document.getElementById('tallalupus').value;
    let peso = document.getElementById('pesolupus').value;


    imccalculo = Math.pow(talla, 2);
    let limitimcalculo = imccalculo.toFixed(2);
    let calculoimc = peso / limitimcalculo;
    let limitcalculofinal = calculoimc.toFixed(1);

    document.formulariolupus.imclupus.value = limitcalculofinal;

}
$(document).ready(function() {
 
    $(document).on('click keyup','.form-check-input,',function() {
        calcularsledai();
    });

    });

    function calcularsledai() {
        var tot = $('#valorfinalresultadosledai');
        tot.val(0);
        $('.form-check-input').each(function() {
            if($(this).hasClass('form-check-input')) {
                tot.val(($(this).is(':checked') ? parseFloat($(this).attr('tu-attr-valor')) : 0) + parseFloat(tot.val()));  
        }
            else {
                tot.val(parseFloat(tot.val()) + (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val())));
        }
    });
            var totalParts = parseFloat(tot.val()).toFixed(0).split('.');
            tot.val(totalParts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '' +  (totalParts.length > 1 ? totalParts[1] :''));  
}

$(document).ready(function() {
    $('#msapp').change(function(e) { 
    }).multipleSelect({
        width: '100%'
    });
});

$(document).ready(function() {
    $('#biopsiaRenal').change(function(e) {
        if ($(this).val() === "Si") {
            $('#tipodebiopsia').prop("hidden", false);
        } else if ($(this).val() === "No") {
            $('#tipodebiopsia').prop("hidden", true);
            $("#tipobiopsia").prop('selectedIndex', 0);
        }
    })
});
$(function() {
    $('#tipodebiopsia').prop("hidden", true);
})

$(document).ready(function() {
    $('#anticardioigm').change(function(e) {
        if ($(this).val() === "Positivo") {
            $('#valorigm').prop("hidden", false);
        } else if ($(this).val() === "Negativo") {
            $('#valorigm').prop("hidden", true);
            $('#valorigm1').val('');
        }
    })
});
$(document).ready(function() {
    $('#anticardioigg').change(function(e) {
        if ($(this).val() === "Positivo") {
            $('#valorigg').prop("hidden", false);
        } else if ($(this).val() === "Negativo") {
            $('#valorigg').prop("hidden", true);
            $('#valorigg1').val('');
        }
    })
});

$(document).ready(function() {
    $('#b2gpi').change(function(e) {
        if ($(this).val() === "Positivo") {
            $('#valorgpi').prop("hidden", false);
        } else if ($(this).val() === "Negativo") {
            $('#valorgpi').prop("hidden", true);
            $('#valorgpi1').val('');
        }
    })
});

$(document).ready(function() {
    $('#b2gpiIGM').change(function(e) {
        if ($(this).val() === "Positivo") {
            $('#valorgpiIGM').prop("hidden", false);
        } else if ($(this).val() === "Negativo") {
            $('#valorgpiIGM').prop("hidden", true);
            $('#valorgpiIGM1').val('');
        }
    })
});
$(function() {
    $('#valorigm').prop("hidden", true);
    $('#valorigm').val('');
    $('#valorigg').prop("hidden", true);
    $('#valorigg1').val('');
    $('#valorgpi').prop("hidden", true);
    $('#valorgpi1').val('');
    $('#valorgpiIGM').prop("hidden", true);
    $('#valorgpiIGM1').val('');
})

$(function () {
    $('#dosisSemanalmetro').prop("disabled", true);
    $('#dosisDiariaHidro').prop("disabled", true);
    $('#dosisDiariaAzatioprina').prop("disabled", true);
    $("#dosisDiariaPrednisona").prop("disabled", true);
    $("#dosisDiariaMicofenolato").prop("disabled", true);
    $("#dosisMensualCiclofosfamida").prop("disabled", true);
    $("#dosisSemanalmetro").val('0');
    $("#dosisDiariaHidro").val('0');
    $("#dosisDiariaAzatioprina").val('0');
    $("#dosisDiariaPrednisona").val('0');
    $("#dosisDiariaMicofenolato").val('0');
    $("#dosisMensualCiclofosfamida").val('0');
    $("#tipodeindice").prop('hidden', true);
});
$(document).ready(function() {
    $('#indice').change(function(e) {
        if ($(this).val() === "Si") {
            $('#tipodeindice').prop("hidden", false);
        } else if ($(this).val() === "No") {
            $('#tipodeindice').prop("hidden", true);
            $("#tipoindice").prop("selectedIndex", 0);
        }
    })
});
//ACCIÓN METROTEXATE
function metrotexasi(){
    let metrotexate = $("#metrotexate1").val();
    if(metrotexate == 'si'){
        $("#dosisSemanalmetro").prop('disabled', false);
        $("#dosisSemanalmetro").val('');
    };
    
}
function metrotexateno(){
    let metrotexate = $("#metrotexate2").val();
    if(metrotexate == 'no'){
        $("#dosisSemanalmetro").prop('disabled', true);
        $("#dosisSemanalmetro").val('0');
    };
    
}


//ACCIÓN Hidroxicloroquina
function Hidroxicloroquinasi(){
    let Hidroxicloroquina = $("#Hidroxicloroquina1").val();
    if(Hidroxicloroquina == 'si'){
        $("#dosisDiariaHidro").prop('disabled', false);
        $("#dosisDiariaHidro").val('');
    };
    
}
function Hidroxicloroquinano(){
    let Hidroxicloroquina = $("#Hidroxicloroquina2").val();
    if(Hidroxicloroquina == 'no'){
        $("#dosisDiariaHidro").prop('disabled', true);
        $("#dosisDiariaHidro").val('0');
    };
    
}

//ACCIÓN Azatioprina
function Azatioprinasi(){
    let Azatioprina = $("#Azatioprina1").val();
    if(Azatioprina == 'si'){
        $("#dosisDiariaAzatioprina").prop('disabled', false);
        $("#dosisDiariaAzatioprina").val('');
    };
    
}
function Azatioprinano(){
    let Azatioprina = $("#Azatioprina2").val();
    if(Azatioprina == 'no'){
        $("#dosisDiariaAzatioprina").prop('disabled', true);
        $("#dosisDiariaAzatioprina").val('0');
    };
    
}
//ACCIÓN Prednisona
function Prednisonasi(){
    let Prednisona = $("#Prednisona1").val();
    if(Prednisona == 'si'){
        $("#dosisDiariaPrednisona").prop('disabled', false);
        $("#dosisDiariaPrednisona").val('');
    };
    
}
function Prednisonano(){
    let Prednisona = $("#Prednisona2").val();
    if(Prednisona == 'no'){
        $("#dosisDiariaPrednisona").prop('disabled', true);
        $("#dosisDiariaPrednisona").val('0');
    };
    
}
//ACCIÓN Micofenolato
function Micofenolatosi(){
    let Micofenolato = $("#Micofenolato1").val();
    if(Micofenolato == 'si'){
        $("#dosisDiariaMicofenolato").prop('disabled', false);
        $("#dosisDiariaMicofenolato").val('');
    };  
}
function Micofenolatono(){
    let Micofenolato = $("#Micofenolato2").val();
    if(Micofenolato == 'no'){
        $("#dosisDiariaMicofenolato").prop('disabled', true);
        $("#dosisDiariaMicofenolato").val('0');
    };
    
}
//ACCIÓN Micofenolato
function Ciclofosfamidasi(){
    let Ciclofosfamida = $("#Ciclofosfamida1").val();
    if(Ciclofosfamida == 'si'){
        $("#dosisMensualCiclofosfamida").prop('disabled', false);
        $("#dosisMensualCiclofosfamida").val('');
    };
    
}
function Ciclofosfamidano(){
    let Ciclofosfamida = $("#Ciclofosfamida2").val();
    if(Ciclofosfamida == 'no'){
        $("#dosisMensualCiclofosfamida").prop('disabled', true);
        $("#dosisMensualCiclofosfamida").val('0');
    };
    
}

