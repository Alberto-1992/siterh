function aplicarSeguimientoBucal() {
    $("#seguimientobucal").modal('show');
}
function eliminarRegistro() {
    var id = $("#idcurp").val();
    var cancer = $("#cancer").val();
    var nombrepaciente = $("#nombrepaciente").val();
    var mensaje = confirm("el registro se eliminara");
    let parametros = {
        id: id,
        cancer: cancer,
        nombrepaciente: nombrepaciente
    }
    if (mensaje == true) {
        $.ajax({
            data: parametros,
            url: 'aplicacion/eliminarCancerbucal.php',
            type: 'post',
            beforeSend: function() {
                $("#mensaje").html("Procesando, espere por favor");
            },
            success: function(response) {
                $("#mensaje").html(response);
                $("#tabla_resultadobus").load('consultacancerbucal.php');
                $("#tabla_resultado").load('consultaCancerBucalBusqueda.php');

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
url: 'aplicacion/editarRegistroCancerBucal.php',
type: 'post',
success: function(datos) {
                                    $("#mensaje").html(datos);
                                    let id = $("#idcurp").val();
                                    let ob = {
                                                id: id
                                                };
                                        $.ajax({
                                                type: "POST",
                                                url: "consultaCancerBucalBusqueda.php",
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
url: 'aplicacion/finalizarEdicionCancerBucal.php',
type: 'post',

success: function(datos) {
                                    $("#mensaje").html(datos);
                                    let id = $("#idcurp").val();
                                    let ob = {
                                                id: id
                                                };
                                        $.ajax({
                                                type: "POST",
                                                url: "consultaCancerBucalBusqueda.php",
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
function editardatosbucal() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarDatosPacienteBucal.php",
        data: ob,
    
    success: function(data) {

        $("#editardatosbucal").html(data);
        
        
        }
        
});
}
function editardatosreferenciabucal(){
    let clues = $("#clues").val();
    let id = $("#idcurp").val();
    let ob = {clues:clues, id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarreferenciadocancerbucal.php",
        data: ob,
    
    success: function(data) {

        $("#editarreferenciacancerbucal").html(data);
        }
        
});
}
function editaranpbucal() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/edicionanpcancerbucal.php",
        data: ob,
    
    success: function(data) {

        $("#editaranpbucal").html(data);
        
        
        }
        
});
}
function editarappbucal() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarappcancerbucal.php",
        data: ob,
    
    success: function(data) {

        $("#editarappbucal").html(data);
        
        
        }
        
});
}
function editarafectacionesoralesbucal() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarafectacionoralbucal.php",
        data: ob,
    
    success: function(data) {

        $("#editarafectacionesoralbucal").html(data);
        
        
        }
        
});
}
function editarlesionoralbucal() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarlesionoralbucal.php",
        data: ob,
    
    success: function(data) {

        $("#editarlesionoralbucal").html(data);
        
        
        }
        
});
}
function editarubicacionoralbucal() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarubicacionoralbucal.php",
        data: ob,
    
    success: function(data) {

        $("#editarubicacionoralbucal").html(data);
        
        
        }
        
});
}
function editarubicacionoralderechabucal() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarubicacionoralderechabucal.php",
        data: ob,
    
    success: function(data) {

        $("#editarubicacionoralderechabucal").html(data);
        
        
        }
        
});
}
function editarubicacionoralizquierdabucal() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarubicacionoralizquierdabucal.php",
        data: ob,
    
    success: function(data) {

        $("#editarubicacionoralizquierdabucal").html(data);
        
        
        }
        
});
}
function editaratencionclinicabucal() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editaratencionclinicabucal.php",
        data: ob,
    
    success: function(data) {

        $("#editaratencionclinicabucal").html(data);
        
        
        }
        
});
}
function editarhistopatologiabucal() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarhistopatologiabucal.php",
        data: ob,
    
    success: function(data) {

        $("#editarhistopatologiabucal").html(data);
        
        
        }
        
});
}
function editarinmunohistoquimicabucal() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarinmunohistoquimicabucal.php",
        data: ob,
    
    success: function(data) {

        $("#editarinmunohistoquimicabucal").html(data);
        
        
        }
        
});
}
function editardefuncionbucal() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editardefuncionbucal.php",
        data: ob,
    
    success: function(data) {

        $("#editardefuncionbucal").html(data);
        
        
        }
        
});
}
function editarcasoexitosobucal() {
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarcasoexitosobucal.php",
        data: ob,
    
    success: function(data) {

        $("#editarcasoexitosobucal").html(data);
        
        
        }
        
});
}