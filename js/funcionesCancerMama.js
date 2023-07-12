function eliminarRegistro() {
    var id = $("#idcurp").val();
    var cancer = $("#cancer").val();
    var nombrepaciente = $("#nombrepaciente").val();
    var mensaje = confirm("el registro se eliminara");
    let parametros = {
        id: id, cancer:cancer, nombrepaciente:nombrepaciente
    }
    if (mensaje == true) {
        $.ajax({
            data: parametros,
            url: 'aplicacion/eliminarRegistroCancer.php',
            type: 'post',
        
            success: function(response) {
                $("#mensaje").html(response);
                $("#tabla_resultadobus").load('consultacancerdemama.php');
                $("#tabla_resultado").load('consultaCancerdeMamaBusqueda.php');

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
function abandonopaciente() {
    var id = $("#idcurp").val();
    var cancer = $("#cancer").val();
    var nombrepaciente = $("#nombrepaciente").val();
    var datoabandono = $("#datoabandono").val();
    var mensaje = confirm("Paciente ya no acudio a consulta?");
    let parametros = {
        id: id, cancer:cancer, nombrepaciente:nombrepaciente, datoabandono:datoabandono
    }
    if (mensaje == true) {
        $.ajax({
            data: parametros,
            url: 'abandonoPacienteCancerMama.php',
            type: 'post',
        
            success: function(datos) {

                                                $("#mensaje").html(datos);
                                                let id = $("#idcurp").val();
                                                let ob = {
                                                            id: id
                                                            };

                                                    $.ajax({
                                                            type: "POST",
                                                            url: "consultaCancerdeMamaBusqueda.php",
                                                            data: ob,
                                                    
                                                        success: function(data) {

                                                            $("#tabla_resultado").html(data);
                                                            $("#tabla_resultadobus").load('consultacancerdemama.php');
                                                            
                                                            
                                                            }
                                                            
                                                    });
                                                
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
function cancelarabandonopaciente() {
    var id = $("#idcurp").val();
    var cancer = $("#cancer").val();
    var nombrepaciente = $("#nombrepaciente").val();
    var datoabandono = $("#datoabandonocancela").val();
    var mensaje = confirm("Cancelar nota de abandono de paciente?");
    let parametros = {
        id: id, cancer:cancer, nombrepaciente:nombrepaciente, datoabandono:datoabandono
    }
    if (mensaje == true) {
        $.ajax({
            data: parametros,
            url: 'abandonoPacienteCancerMama.php',
            type: 'post',
        
            success: function(datos) {

                                                $("#mensaje").html(datos);
                                                let id = $("#idcurp").val();
                                                let ob = {
                                                            id: id
                                                            };

                                                    $.ajax({
                                                            type: "POST",
                                                            url: "consultaCancerdeMamaBusqueda.php",
                                                            data: ob,
                                                    
                                                        success: function(data) {

                                                            $("#tabla_resultado").html(data);
                                                            $("#tabla_resultadobus").load('consultacancerdemama.php');
                                                            
                                                            
                                                            }
                                                            
                                                    });
                                                
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
function editarRegistro(){
        var id = $("#idcurp").val();
    var cancer = $("#cancer").val();
    var nombrepaciente = $("#nombrepaciente").val();
    var mensaje = confirm("Desea continuar con la edición de los datos");
    let parametros = {
        id:id, cancer:cancer, nombrepaciente:nombrepaciente
    }
            if(mensaje == true){
                $.ajax({
            data: parametros,
            url: 'aplicacion/editarRegistroCancer.php',
            type: 'post',
            success: function(datos) {
                                                $("#mensaje").html(datos);
                                                let id = $("#idcurp").val();
                                                let ob = {
                                                            id: id
                                                            };
                                                    $.ajax({
                                                            type: "POST",
                                                            url: "consultaCancerdeMamaBusqueda.php",
                                                            data: ob,
                                                    
                                                        success: function(data) {

                                                            $("#tabla_resultado").html(data);
                                                            //$("#editarDatosPersonalescancerdeMama").modal('show');
                                                            
                                                            
                                                            }
                                                            
                                                    });
                                                
                                            }
        });
            }else{
                
            }
    }
    function finalizarEdicion(){
        var id = $("#idcurp").val();
    var cancer = $("#cancer").val();
    var nombrepaciente = $("#nombrepaciente").val();
    var mensaje = confirm("Desea finalizar con la edición de los datos");
    let parametros = {
        id: id, cancer:cancer, nombrepaciente:nombrepaciente
    }
            if(mensaje == true){
                $.ajax({
            data: parametros,
            url: 'aplicacion/finalizarEdicion.php',
            type: 'post',
        
            success: function(datos) {
                                                $("#mensaje").html(datos);
                                                let id = $("#idcurp").val();
                                                let ob = {
                                                            id: id
                                                            };
                                                    $.ajax({
                                                            type: "POST",
                                                            url: "consultaCancerdeMamaBusqueda.php",
                                                            data: ob,
                                                    
                                                        success: function(data) {

                                                            $("#tabla_resultado").html(data);
                                                            //$("#editarDatosPersonalescancerdeMama").modal('show');
                                                            
                                                            
                                                            }
                                                            
                                                    });
                                                
                                            }
        });
            }else{
                alert('proceso cancelado')
            }
    }

function AplicarSeguimiento() {
    $("#seguimientocancerdemama").modal('show');  
}
function graficos() {
    window.open('graficosCm');
}
function excel() {
    window.location.href='excelcancerdemama.php';
    }
function editardatos() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarDatosPaciente.php",
        data: ob,
    
    success: function(data) {

        $("#editadatospersonales").html(data);
        
        
        }
        
});
}
function editardatoscancer() {

    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editardatoscancer.php",
        data: ob,
    
    success: function(data) {

        $("#editadatoscancer").html(data);
        }
        
});
}
function editardatospersonalespatologicos(){
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarantecedentespatocm.php",
        data: ob,
    
    success: function(data) {

        $("#editadatosantedecentescm").html(data);
        }
        
});
}
function editardatosantecedentesgineco(){
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarantecedentesginecocm.php",
        data: ob,
    
    success: function(data) {
        $("#editarantecedentesgineco").html(data);
        }
        
});
}
function editardatosatencionclinica(){
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editardatosatencionclinica.php",
        data: ob,
    
    success: function(data) {

        $("#editaratencionclinica").html(data);
        }
        
});
}
function editardatosreferencia(){
    let clues = $("#clues").val();
    let id = $("#idcurp").val();
    let ob = {clues:clues, id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarunidadrfcm.php",
        data: ob,
    
    success: function(data) {

        $("#editadatospersonalesunidadrf").html(data);
        }
        
});
}
function editardatoshistopatomamaderecha(){
    let clues = $("#clues").val();
    let id = $("#idcurp").val();
    let ob = {clues:clues, id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarhistopatologiamamaderechacm.php",
        data: ob,
    
    success: function(data) {

        $("#editadatoshistopatommd").html(data);
        }
        
});
}
function editardatoshistopatorgmamader() {
    $("#editarDatosRgMamaDer").modal('show');
    
}
function editardatoshistopatomamaiz(){
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarhistopatologiamamaizquierdacm.php",
        data: ob,
    
    success: function(data) {

        $("#editadatoshistopatommiz").html(data);
        }
        
});
}
function editardatoshistopatorgmamaiz() {
    $("#editarDatosRgmamaIz").modal('show');
    
}
function editardatosinmunomamaderecha() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarinmunohistoquimicammdcm.php",
        data: ob,
    
    success: function(data) {

        $("#editadatosinmunohistoquimicammd").html(data);
        }
        
});
}
function editardatosinmunorgdmamaderecha() {
    $("#editarInmunohistorgdMamaDer").modal('show');
}
function editardatosinmunomamaiz() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarinmunohistoquimicammizcm.php",
        data: ob,
    
    success: function(data) {

        $("#editadatosinmunohistoquimicammiz").html(data);
        }
        
});
}
function editardatosinmunorgimamaiz(){
    $("#editarInmunohistoRgizMamaIz").modal('show');
}
function editarquimioterapia() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editardatosquimiocm.php",
        data: ob,
    
    success: function(data) {

        $("#editardatosquimioterapia").html(data);
        }
        
});
}
function defuncionpaciente() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editardatosdefuncioncm.php",
        data: ob,
    
    success: function(data) {

        $("#editardatosdefuncion").html(data);
        }
        
});
}
function editaradioterapia() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editardatosradioterapia.php",
        data: ob,
    
    success: function(data) {

        $("#editardatosradioterapia").html(data);
        }
        
});
}
function editarmolecularmamaderecha() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editardatosmolecularcm.php",
        data: ob,
    
    success: function(data) {

        $("#editadatosmolecularmmd").html(data);
        }
        
});
}
function editarmolecularmamaizquierda() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editardatosmolecularmmiz.php",
        data: ob,
    
    success: function(data) {

        $("#editadatosmolecularmamaiz").html(data);
        }
        
});
}
function editardatostratamiento() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editartratamientocancer.php",
        data: ob,
    
    success: function(data) {

        $("#editartratamientocancer").html(data);
        }
        
});
}
function editardatosmastectomia() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editardatosmastectomia.php",
        data: ob,
    
    success: function(data) {

        $("#editarmastectomia").html(data);
        }
        
});
}
function editardatosganglionar() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editardatosganglionar.php",
        data: ob,
    
    success: function(data) {

        $("#editarganglionar").html(data);
        }
        
});
}
function editardatosreconstruccionmastectomia() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarreconstruccionmastecto.php",
        data: ob,
    
    success: function(data) {

        $("#editarreconstruccion").html(data);
        }
        
});
}
function bradsreferencia(){
    $("#grafico1").modal('show');
}
function bradsreferencia(){

    $.ajax({
   
        url: "modals/graficobradsreferencia.php",
        

    success: function(data) {

        $("#tabla_graficos").html(data);
        }
        
});
    }

function graficosvistaquimio(){
    $.ajax({
   
        url: "modals/graficoquimio.php",
        

    success: function(data) {

        $("#tabla_graficos").html(data);
        }
        
});
    }
    function graficosvistaradio(){
        $.ajax({
       
            url: "modals/graficoradioterapia.php",
            
    
        success: function(data) {
    
            $("#tabla_graficos").html(data);
            }
            
    });
        }
function graficosfallecio(){
    $.ajax({
   
        url: "modals/graficofalleciocm.php",
        

    success: function(data) {

        $("#tabla_graficos").html(data);
        }
        
});
    }
function antecedentesheredofamiliares() {
    $.ajax({

        url: "modals/graficoahfcm.php",
        

    success: function(data) {

        $("#tabla_graficos").html(data);
        }
        
});
}
function antecedentesheredofamiliaresco() {
    $.ajax({

        url: "modals/graficoahfco.php",
        

    success: function(data) {

        $("#tabla_graficos").html(data);
        }
        
});
}
function pacientesembarazadas() {
    $.ajax({

        url: "modals/graficoembarazadascm.php",
        

    success: function(data) {

        $("#tabla_graficos").html(data);
        }
        
});
}
function pacientesabandonaron() {

    $.ajax({
   
        url: "modals/graficoabandonaroncm.php",
        

    success: function(data) {

        $("#tabla_graficos").html(data);
        }
        
});
}
function antecedentespersonalespatologicos() {
    $.ajax({

        url: "modals/graficoappcm.php",
        

    success: function(data) {

        $("#tabla_graficos").html(data);
        }
        
});
}
function mastectomiagrfico() {
    $.ajax({

        url: "modals/graficomastectomiacm.php",
        

    success: function(data) {

        $("#tabla_graficos").html(data);
        }
        
});
}