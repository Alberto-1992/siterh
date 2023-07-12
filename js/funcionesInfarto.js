function factoresriesgo(){
    $.ajax({
        url: "modals/graficofactoresinfarto.php",
        
    success: function(data) {
        $("#tabla_graficos").html(data);
        }
        
});
    }
    function angioplastiacoronaria(){
        $.ajax({
            url: "modals/graficoangiocoronariainfarto.php",
            
        success: function(data) {
            $("#tabla_graficos").html(data);
            }
            
    });
        }
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
            url: 'aplicacion/editarRegistroInfarto.php',
            type: 'post',
            success: function(datos) {
                                                $("#mensaje").html(datos);
                                                let id = $("#idcurp").val();
                                                let ob = {
                                                            id: id
                                                            };
                                                    $.ajax({
                                                            type: "POST",
                                                            url: "consultaPacienteBusqueda.php",
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
            url: 'aplicacion/finalizarEdicionInfarto.php',
            type: 'post',
        
            success: function(datos) {
                                                $("#mensaje").html(datos);
                                                let id = $("#idcurp").val();
                                                let ob = {
                                                            id: id
                                                            };
                                                    $.ajax({
                                                            type: "POST",
                                                            url: "consultaPacienteBusqueda.php",
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
    function editardatospersonalesinfarto() {

        let id = $("#idcurp").val();
        let ob = {id:id};
        $.ajax({
            type: "POST",
            url: "modals/editardatospersonalesinfarto.php",
            data: ob,
        success: function(data) {
            $("#editardatospersonalesinfarto").html(data);
            }
            
    });
    }
    function editarfactoresriesgo(){
        let id = $("#idcurp").val();
        let ob = {id:id};
        $.ajax({
            type: "POST",
            url: "modals/editarfactoresriesgoinfarto.php",
            data: ob,
        success: function(data) {
            $("#editarfactoresriesgo").html(data);
            }
            
    });
        }
        function editaratencionclinicainfarto(){
            let id = $("#idcurp").val();
            let ob = {id:id};
            $.ajax({
                type: "POST",
                url: "modals/editaratencionclinicainfarto.php",
                data: ob,
            success: function(data) {
                $("#editaratencionclinicainfarto").html(data);
                }
                
        });
            }
            function editarparaclinicosinfarto(){
                let id = $("#idcurp").val();
                let ob = {id:id};
                $.ajax({
                    type: "POST",
                    url: "modals/editarparaclinicosinfarto.php",
                    data: ob,
                success: function(data) {
                    $("#editarparaclinicosinfarto").html(data);
                    }
                    
            });
        }
                function editartratamientotromboinfarto(){
                    let id = $("#idcurp").val();
                    let ob = {id:id};
                    $.ajax({
                        type: "POST",
                        url: "modals/editartratamientotromboinfarto.php",
                        data: ob,
                    success: function(data) {
                        $("#editartratamientotromboinfarto").html(data);
                        }
                        
                });
            }
            function editarangiocoronariainfarto(){
                let id = $("#idcurp").val();
                let ob = {id:id};
                $.ajax({
                    type: "POST",
                    url: "modals/editarangiocoronariainfarto.php",
                    data: ob,
                success: function(data) {
                    $("#editarangiocoronariainfarto").html(data);
                    }
                    
            });
        }
        function editarlitotriciainfarto(){
            let id = $("#idcurp").val();
            let ob = {id:id};
            $.ajax({
                type: "POST",
                url: "modals/editarlitotriciainfarto.php",
                data: ob,
            success: function(data) {
                $("#editarlitotriciainfarto").html(data);
                }
                
        });
    }
    function editarmarcapasosinfarto(){
        let id = $("#idcurp").val();
        let ob = {id:id};
        $.ajax({
            type: "POST",
            url: "modals/editarmarcapasosinfarto.php",
            data: ob,
        success: function(data) {
            $("#editarmarcapasosinfarto").html(data);
            }
            
    });
}
function editarsomatometriainfarto(){
    let id = $("#idcurp").val();
    let ob = {id:id};
    $.ajax({
        type: "POST",
        url: "modals/editarsomatometriainfarto.php",
        data: ob,
    success: function(data) {
        $("#editarsomatometriainfarto").html(data);
        }
        
});
}
    $(document).ready(function () {

        $('#msfactoreseditar').change(function (e) {
    
    
        }).multipleSelect({
            width: '100%'
        });
    });

