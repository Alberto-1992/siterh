function editarRegistro(){
    var id = $("#idcurp").val();
var infarto = $("#infartopaciente").val();
var nombrepaciente = $("#nombrepaciente").val();
var mensaje = confirm("Desea continuar con la edición de los datos");
let parametros = {
    id:id, infarto:infarto, nombrepaciente:nombrepaciente
}
        if(mensaje == true){
            $.ajax({
        data: parametros,
        url: 'aplicacion/editarRegistroLupus.php',
        type: 'post',
        success: function(datos) {
                                            $("#mensaje").html(datos);
                                            let id = $("#idcurp").val();
                                            let ob = {
                                                        id: id
                                                        };
                                                $.ajax({
                                                        type: "POST",
                                                        url: "consultalupusbusqueda.php",
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
var infarto = $("#infartopaciente").val();
var nombrepaciente = $("#nombrepaciente").val();
var mensaje = confirm("Desea finalizar con la edición de los datos");
let parametros = {
    id: id, infarto:infarto, nombrepaciente:nombrepaciente
}
        if(mensaje == true){
            $.ajax({
        data: parametros,
        url: 'aplicacion/finalizarEdicionLupus.php',
        type: 'post',
    
        success: function(datos) {
                                            $("#mensaje").html(datos);
                                            let id = $("#idcurp").val();
                                            let ob = {
                                                        id: id
                                                        };
                                                $.ajax({
                                                        type: "POST",
                                                        url: "consultalupusbusqueda.php",
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
function editardatospersonaleslupus() {

    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editardatospersonaleslupus.php",
        data: ob,
    success: function(data) {
        $("#editardatospersonaleslupus").html(data);
        }
        
});
}
function editardatosapplupus() {

    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarapplupus.php",
        data: ob,
    success: function(data) {
        $("#editarapplupus").html(data);
        }
        
});
}
function editardatosactividadlupicalupus() {

    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editaractividadlupicalupus.php",
        data: ob,
    success: function(data) {
        $("#editaractividadlupicalupus").html(data);
        }
        
});
}
function editarcalculadorasledailupus() {

    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarcalculadorasledailupus.php",
        data: ob,
    success: function(data) {
        $("#editarcalculadorasledailupus").html(data);
        }
        
});
}
function editarlaboratorioslupus() {

    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarlaboratorioslupus.php",
        data: ob,
    success: function(data) {
        $("#editarlaboratorioslupus").html(data);
        }
        
});
}
function editaranticuerposlupus() {

    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editaranticuerposlupus.php",
        data: ob,
    success: function(data) {
        $("#editaranticuerposlupus").html(data);
        }
        
});
}
function editarbiopsiarenallupus() {

    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarbiopsiarenallupus.php",
        data: ob,
    success: function(data) {
        $("#editarbiopsiarenallupus").html(data);
        }
        
});
}
function editarmarcadoresmalpronosticolupus() {

    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarmarcadoresmalpronosticolupus.php",
        data: ob,
    success: function(data) {
        $("#editarmarcadoresmalpronosticolupus").html(data);
        }
        
});
}
function editardefuncionlupus() {

    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editardefuncionlupus.php",
        data: ob,
    success: function(data) {
        $("#editardefuncionlupus").html(data);
        }
        
});
}