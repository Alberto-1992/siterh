function editarRegistro(){
    var id = $("#idcurp").val();
var artritis = $("#artritispaciente").val();
var valor = 1;
var nombrepaciente = $("#nombrepaciente").val();
var mensaje = confirm("Desea continuar con la edición de los datos");
let parametros = {
    id: id, artritis:artritis, valor:valor, nombrepaciente:nombrepaciente
}
        if(mensaje == true){
            $.ajax({
        data: parametros,
        url: 'aplicacion/editarRegistro.php',
        type: 'post',
        success: function(datos) {
                                            $("#mensaje").html(datos);
                                            let id = $("#idcurp").val();
                                            let ob = {
                                                        id: id
                                                        };
                                                $.ajax({
                                                        type: "POST",
                                                        url: "consultaArtritisBusqueda.php",
                                                        data: ob,
                                                
                                                    success: function(data) {
                                                        $("#tabla_resultado").html(data);
                                                        }
                                                        
                                                });
                                            
                                        }
    });
        }else{
            alert('proceso cancelado')
        }
}
function finalizarEdicion(){
    var id = $("#idcurp").val();
var artritis = $("#artritispaciente").val();
var valor = 0;
var nombrepaciente = $("#nombrepaciente").val();
var mensaje = confirm("Desea finalizar con la edición de los datos");
let parametros = {
    id: id, artritis:artritis, valor:valor, nombrepaciente:nombrepaciente
}
        if(mensaje == true){
            $.ajax({
        data: parametros,
        url: 'aplicacion/finalizarEdicionArtritis.php',
        type: 'post',
    
        success: function(datos) {
                                            $("#mensaje").html(datos);
                                            let id = $("#idcurp").val();
                                            let ob = {
                                                        id: id
                                                        };

                                                $.ajax({
                                                        type: "POST",
                                                        url: "consultaArtritisBusqueda.php",
                                                        data: ob,
                                                
                                                    success: function(data) {
                                                        $("#tabla_resultado").html(data);
                                                        }
                                                        
                                                });
                                            
                                        }
    });
        }else{
            alert('proceso cancelado')
        }
}
function eliminarRegistro() {
    var id = $("#idcurp").val();
    var artritis = $("#artritispaciente").val();
    var nombrepaciente = $("#nombrepaciente").val();
    var mensaje = confirm("el registro se eliminara");
    let parametros = {
        id: id,
        artritis: artritis,
        nombrepaciente: nombrepaciente
    }
    if (mensaje == true) {
        $.ajax({
            data: parametros,
            url: 'aplicacion/eliminarRegistroArtritis.php',
            type: 'post',
            beforeSend: function() {
                $("#mensaje").html("Procesando, espere por favor");
            },
            success: function(response) {
                $("#mensaje").html(response);
                $("#tabla_resultadobus").load('consultaArtritis.php');
                $("#tabla_resultado").load('consultaArtritisBusqueda.php');

            }
        });
    } else {
        swal({
            title: 'Cancelado!',
            text: 'Proceso cancelado',
            icon: 'warning',
        });
    }
}
function aplicarSeguimientoArtritis() {
$("#seguimientoArtritis").modal('show');
}
function editardatospersonales() {
let id = $("#idcurp").val();
let ob = {id:id};
$.ajax({
    type: "POST",
    url: "modals/editardatospersonalesartritis.php",
    data: ob,
success: function(data) {
    $("#editadatospersonales").html(data);
    }
    
});
}
function editarantecedentespato() {
let id = $("#idcurp").val();
let ob = {id:id};
$.ajax({
    type: "POST",
    url: "modals/editarantecedentespatologicosartritis.php",
    data: ob,

success: function(data) {

    $("#editarantecedentespatologicos").html(data);
    }
    
});
}
function editarlaboratoriosartritis() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarlaboratoriosartritis.php",
        data: ob,
    
    success: function(data) {
    
        $("#editarlaboratoriosartritis").html(data);
        
        }
        
    });
}
function artritisusghepatic() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarusghepaticoartritis.php",
        data: ob,
    
    success: function(data) {
    
        $("#editarusghepaticoartritis").html(data);
        
        }
        
    });
}
function actulizaDatosClinica() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarclinicaartritis.php",
        data: ob,
    
    success: function(data) {
    
        $("#editarclincaartritis").html(data);
        
        }
        
    });
}
function actualizaTratamiento() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editartratamientoartritis.php",
        data: ob,
    
    success: function(data) {
    
        $("#editartratameintoartritis").html(data);
        
        }
        
    });
}

    $(document).ready(function () {
    
        $('#mspato').change(function (e) {
    
    
        }).multipleSelect({
            width: '100%'
        });
    });
    
    $(document).ready(function () {
    
        $('#sitiometastasis2').change(function (e) {
    
    
        }).multipleSelect({
            width: '100%'
        });
    });
    
    $(document).ready(function () {
    
        $('#mamaseleccion').change(function (e) {
    
    
        }).multipleSelect({
            width: '100%'
        });
    });
    $(document).ready(function () {
    
        $('#mamaseleccioninmuno').change(function (e) {
    
    
        }).multipleSelect({
            width: '100%'
        });
    });
    $(document).ready(function () {
    
        $('#mamaseleccionmolecular').change(function (e) {
    
    
        }).multipleSelect({
            width: '100%'
        });
    });
    $(document).ready(function () {
    
        $('#quirurgicotipo').change(function (e) {
    
    
        }).multipleSelect({
            width: '100%'
        });
    });
    
    Date.prototype.toString = function () {
        var anyo = this.getFullYear();
        var mes = this.getMonth() + 1;
        if (mes <= 9) mes = "0" + mes;
        var dia = this.getDate();
        if (dia <= 9) dia = "0" + dia;
        return anyo + "-" + mes + "-" + dia;
    }
    window.addEventListener('DOMContentLoaded', (evento) => {
        const hoy_fecha = new Date().toISOString().substring(0, 10);
        document.querySelector("input[name='fechaedit']").max = hoy_fecha;
    
    });