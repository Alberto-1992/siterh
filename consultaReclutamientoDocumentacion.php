<style>
    .ver-info:hover{
        background-color: #D0D0D0;
        color: black;
        cursor: pointer;
    }

    .selected {
        background-color: grey;
        color: white;
    }
    
    </style>
<div id="lista-comentarios">
<?php 
error_reporting(0);
	require 'conexionRh.php';
    $sqlQueryComentarios  = $conexionDocumentacion->query("SELECT datospersonales.id_datopersonal FROM datospersonales where datosActualizados = 1");
    $total_registro  = mysqli_num_rows($sqlQueryComentarios);

    $query= $conexionSeleccion->prepare("SELECT datospersonales.id_datopersonal, datospersonales.curp, datospersonales.nombre, datospersonales.appaterno, datospersonales.apmaterno, datospersonales.correoelectronico, datospersonales.datosActualizados FROM datospersonales where datosActualizados = 1 order by datospersonales.id_datopersonal DESC LIMIT 23 ");
    if(isset($_POST['evento']))
{
	$q= $_POST['evento'];
	$query=$conexionSeleccion->prepare("SELECT datospersonales.id_datopersonal, datospersonales.curp, datospersonales.nombre, datospersonales.appaterno, datospersonales.apmaterno, datospersonales.correoelectronico, datospersonales.acceder FROM datospersonales WHERE
        datospersonales.nombre LIKE '%$q%' and datosActualizados = 1 OR
        datospersonales.correoelectronico LIKE '%$q%' and datosActualizados = 1 OR
        datospersonales.curp LIKE '%$q%' and datosActualizados = 1 OR
		datospersonales.nombre LIKE '%$q%' and datosActualizados = 1 OR
		datospersonales.appaterno LIKE '%$q%' and datosActualizados = 1 OR
		datospersonales.apmaterno LIKE '%$q%' and datosActualizados = 1 group by datospersonales.id_datopersonal");
}
        ?>
<ul class="nav nav-tabs" >
        <li class="nav-item" style="margin: 0px; font-size: 10px; padding: 0px;">
            <a class="nav-link active" aria-current="page" href="#">Total: <?php echo $total_registro; ?> </a>
        </li>
        <li class="nav-item dropdown" style="margin: 0px; font-size: 10px; padding: 0px;">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Check documentos</a>
            <ul class="dropdown-menu" style="margin: 0px; font-size: 10px; padding: 0px;">
                <li><a class="dropdown-item" href="#" onclick="documentos();">Documentacion: </a></li>
                
                
            </ul>
        </li>
    </ul>
    <hr id="hrinicial">

        <input type="hidden" name="total_registro" id="total_registro" value="<?php echo $total_registro; ?>" >
        <?php
        
        
        $query->execute();
        while($dataRegistro= $query->fetch())
        { 
            $acceso = $dataRegistro['datosActualizados'];
            $confirmar = $dataRegistro['confirmarasistencia'];
            ?>
        
        <div class="item-comentario" id="<?php echo $dataRegistro['id_datopersonal']; ?>" >
        <input type="hidden" class="curp" value="<?php echo $dataRegistro['curp']; ?>">
                <div id='<?php echo $dataRegistro['id_datopersonal']; ?>' class='ver-info' >
                    <?php echo '<strong style="font-family: Arial; white-space: nowrap; font-size: 10px; margin-left: 7px; text-transform: uppercase;">&nbsp'.$dataRegistro['nombre'].'</strong>'.'<br>'.'<strong style="font-size: 9px; margin-left: 7px;">&nbsp'.$dataRegistro['curp'].'</strong>'.'<br>'.'<strong style="font-size: 9px; margin-left: 7px;">&nbsp'.$dataRegistro['correoelectronico'].'</strong>'.'<br>';
                        if($acceso == 1){ 
                        ?><input type="submit" value="Documentos" style="padding: 1px; cursor-pointer: none; background: orange; border: none; color: black; margin-left: 1%; font-size: 10px; font-style: arial; margin-top: 0px;"><?php } ?>
                            
                    </div> 
                <hr id="hr">
            </div>
        <?php 
        }
    ?>
</div>


<div class="col-md-12 col-sm-12">
    <div class="ajax-loader text-center">
        <img src="img/cargando.svg">
        <br>
        Cargando más Registros...
    </div>
</div>
<?php

require_once 'conexionRh.php';
$sql = $conexionSeleccion->query("SELECT id_datopersonal from datospersonales where datosActualizados = 1 order by id_datopersonal desc limit 1");
        $sql->execute();
            $row = $sql->fetch();

?>

<input type="hidden" id="cargaPrimerRegsitro" value="<?php echo $row['id_datopersonal'] ?>">
<script>
function documentos() {
    var id = $("#curp").val();
    let parametros = { id: id }
        $.ajax({
            data: parametros,
            url: 'verDocumento.php',
            type: 'post',

            success: function (data) {
                //$("#mensaje").html(response);
                $("#tabla_resultado").html(data);
                

            }
        });

}
$(function() {
    var id = $("#cargaPrimerRegsitro").val();
        
        let ob = {
            id: id
        };
        $.ajax({
            type: "POST",
            url: "consultaReclutamientoBusquedaDocumentacion.php",
            data: ob,
            beforeSend: function() {

            },
            success: function(data) {

                $("#tabla_resultado").html(data);
                
            }
        });
        
})
</script>
<script>
$(function() {

$('.item-comentario').on('click', '.ver-info', function() {

    var id = $(this).prop('id');
    let ob = {
        id: id
    };

    $.ajax({
        type: "POST",
        url: "consultaReclutamientoBusquedaDocumentacion.php",
        data: ob,
        beforeSend: function() {

        },
        success: function(data) {

            $("#tabla_resultado").html(data);

        }
    });

});
});
$(document).ready(function() {
$('.item-comentario').on('click', '.ver-info', function() {
//const nombre = document.querySelector(".ver-info");
//nombre.style.color = "blue";
    //Añadimos la imagen de carga en el contenedor
    $('#tabla_resultado').html(
        '<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>'
    );


    return false;
});
});


$(document).ready(function() {
pageScroll();

$('.ajax-loader').hide();

});

document.addEventListener('keydown', (event) => {

if (event.keyCode == 8 || event.keyCode == 46) {
    $("#tabla_resultadobus").off("scroll");
}
}, false);

function pageScroll() {
    $("#tabla_resultadobus").on("scroll", function() {
        var scrollHeight = $(document).height();
        var scrollPos = $("#tabla_resultadobus").height() + $("#tabla_resultadobus").scrollTop();
        var totalregistro = $("#total_registro").val();

        if ((((scrollHeight - 250) >= scrollPos) / scrollHeight == 0) || (((scrollHeight - 300) >=
                scrollPos) / scrollHeight == 0) || (((scrollHeight - 350) >= scrollPos) / scrollHeight ==
                0) || (((scrollHeight - 400) >= scrollPos) / scrollHeight == 0) || (((scrollHeight - 450) >=
                scrollPos) / scrollHeight == 0) || (((scrollHeight - 500) >= scrollPos) / scrollHeight ==
                0)) {
            if ($(".item-comentario").length < $("#total_registro").val()) {
                var utimoId = $(".item-comentario:last").attr("id");
                var totalregistro = $("#total_registro").val();
                let datos = {utimoId:utimoId, totalregistro:totalregistro};
                $("#tabla_resultadobus").off("scroll");
                $.ajax({
                    url: 'obteniendoMasDatosReclutamientoEnEvaluacion.php',
                    data: datos,
                    type: "POST",
                    beforeSend: function() {
                        $('.ajax-loader').show();
                    },
                    success: function(data) {
                        setTimeout(function() {
                            $('.ajax-loader').hide();
                            $("#lista-comentarios").append(data);
                            pageScroll();
                        }, 1000);
                    }
                });


            } else {

            }
        }
    });
}
$('.ver-info').on('click',function(){
	$('.ver-info').removeClass('selected');
        $(this).addClass('selected');
});
</script>