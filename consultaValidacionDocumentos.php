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
    
    #hr {
        padding: 0px;
        margin: 0px;
    }
    .item-comentario {
        margin: 0px;
        padding: 0px;
    }
    #lista-comentarios {
        margin: 0px;
        padding: 0px;
    }
    </style>
<div id="lista-comentarios">
<?php 
error_reporting(0);
require_once 'clases/conexion.php';
extract($_POST);
$conexionX = new ConexionRh();
    $sqlQueryComentarios  = $conexionX->prepare("SELECT id FROM datos where validaautorizacion = 0");
    $sqlQueryComentarios->execute();
    $sqlQueryComentarios = $conexionX->prepare("SELECT FOUND_ROWS()");
    $sqlQueryComentarios->execute();
    $total_registro = $sqlQueryComentarios->fetchColumn();

    $empleado  = $conexionX->prepare("SELECT distinct id_empleado FROM datos where validaautorizacion = 0");
    $empleado->execute();
    $empleado = $conexionX->prepare("SELECT FOUND_ROWS()");
    $empleado->execute();
    $total_empleado = $empleado->fetchColumn();

    $query= $conexionX->prepare("SELECT datos.nombreempleado,datos.validaautorizacion, datos.id, datos.id_empleado, datos.nombreinstitucion,datos.nombrecurso,datos.areaquefortalece,datos.modalidad,datos.asistecomo, plantillahraei.DescripcionAdscripcion, plantillahraei.DescripcionPuesto FROM datos inner join plantillahraei on plantillahraei.Empleado = datos.id_empleado where datos.validaautorizacion = 0 order by datos.id DESC LIMIT 25 ");
    if(isset($_POST['evento']))
{
	$q= $_POST['evento'];
	$query=$conexionX->prepare("SELECT datos.id, datos.nombreempleado, datos.id_empleado, datos.nombreinstitucion,datos.nombrecurso, plantillahraei.DescripcionAdscripcion, plantillahraei.DescripcionPuesto FROM datos inner join plantillahraei on plantillahraei.Empleado = datos.id_empleado WHERE
            id_empleado LIKE '%$q%' and validaautorizacion = 0 OR
		    nombreempleado LIKE '%$q%' and validaautorizacion = 0 OR
            DescripcionAdscripcion LIKE '%$q%' or
            DescripcionPuesto LIKE '%$q%' group by datos.id");
}
        ?>
<input type="hidden" id="totalregistro" value="<?php echo $total_registro; ?>">
<ul class="nav nav-tabs" >
        <li class="nav-item" style="margin: 0px; font-size: 10px; padding: 0px;">
            <a class="nav-link active" aria-current="page" href="#" style="color: red;">Total: <?php echo $total_registro; ?> </a>
            
        </li>
        <li class="nav-item" style="margin: 0px; font-size: 10px; padding: 0px;">
            <a class="nav-link active" aria-current="page" href="#" style="color: blue;">Total empleados: <?php echo $total_empleado; ?> </a>
        </li>
        <!--
        <li class="nav-item dropdown" style="margin: 0px; font-size: 10px; padding: 0px;">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Check documentos</a>
            <ul class="dropdown-menu" style="margin: 0px; font-size: 10px; padding: 0px;">
                <li><a class="dropdown-item" href="#" onclick="documentos();">Documentacion: </a></li>
                
                
            </ul>
        </li>
-->
<input type="text" class="form-control col-md-12" id="busqueda" name="busqueda" placeholder="Buscar..." onkeypress="return handleKeyPress(event);">
    </ul>
    
    <hr id="hrinicial">

        <input type="hidden" name="total_registro" id="total_registro" value="<?php echo $total_registro; ?>" >
        <?php
        
        
        $query->execute();
        while($dataRegistro= $query->fetch())
        { 
            ?>
        
        <div class="item-comentario" id="<?php echo $dataRegistro['id']; ?>">
        
                <div id='<?php echo $dataRegistro['id']; ?>' class='ver-info'>
                    <?php echo '<strong style="font-size: 10px; margin-left: 7px; text-transform: uppercase; margin: 0px 0px 0px 0px;">&nbsp'.$dataRegistro['nombrecurso'].'</strong>'.'<br>'.'<strong style="font-size: 9px; margin-left: 7px; margin: 0px 0px 0px 0px;">&nbsp'.$dataRegistro['nombreempleado'].'</strong>'.'&nbsp;&nbsp;'.'<strong style="font-size: 9px; margin-left: 7px; margin: 0px 0px 0px 0px; color: red;">&nbsp'.$dataRegistro['id_empleado'].'</strong>'.'<br>'.'<strong style="font-size: 8px; margin-left: 7px; margin: 0px 0px 0px 0px;">&nbsp'.$dataRegistro['DescripcionPuesto'].'</strong>'.'<br>'.'<strong style="font-size: 10px; color: red; margin-left: 7px; margin: 0px 0px 0px 0px;">&nbsp'.$dataRegistro['DescripcionAdscripcion'].'</strong><br>';
                        ?>
                    
                    </div> 
                <hr id="hr" >
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

$sql = $conexionX->prepare("SELECT id from datos WHERE validaautorizacion = 0 order by id desc limit 1");
        $sql->execute();
            $row = $sql->fetch();

?>

<input type="hidden" id="cargaPrimerRegsitro" value="<?php echo $row['id'] ?>">
<script>
function documentos() {
    var id = $("#curp").val();
    let parametros = { id: id }
        $.ajax({
            data: parametros,
            url: 'verDocumentoInicio.php',
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
            url: "consultaValidacionDocumentosBusqueda.php",
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
        url: "consultaValidacionDocumentosBusqueda.php",
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
                    url: 'obteniendoMasDatosValidacionDocuCapacitacion.php',
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