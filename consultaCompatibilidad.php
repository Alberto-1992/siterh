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
require_once 'clases/conexion.php';
$conexion = new ConexionRh();
    $sqlQueryComentarios  = $conexion->prepare("SELECT plantillahraei.Empleado, compatibilidadotroempleo.id_empleado FROM plantillahraei inner join compatibilidadotroempleo on compatibilidadotroempleo.id_empleado = plantillahraei.Empleado and compatibilidadotroempleo.otroempleo = 'Si'");
    $sqlQueryComentarios->execute();
    $sqlQueryComentarios = $conexion->prepare("SELECT FOUND_ROWS()");
    $sqlQueryComentarios->execute();
    $total_registro = $sqlQueryComentarios->fetchColumn();

    $query= $conexion->prepare("SELECT plantillahraei.Nombre, plantillahraei.correo, plantillahraei.Empleado, plantillahraei.DescripcionPuesto, plantillahraei.RFC, plantillahraei.DescripcionAdscripcion, compatibilidadotroempleo.otroempleo FROM plantillahraei inner join compatibilidadotroempleo on compatibilidadotroempleo.id_empleado = plantillahraei.Empleado and compatibilidadotroempleo.otroempleo = 'Si' order by plantillahraei.Empleado DESC LIMIT 23 ");
    if(isset($_POST['evento']))
{
	$q= $_POST['evento'];
	$query=$conexion->prepare("SELECT plantillahraei.Nombre, plantillahraei.correo, plantillahraei.Empleado, plantillahraei.DescripcionPuesto,plantillahraei.RFC,plantillahraei.DescripcionAdscripcion, compatibilidadotroempleo.otroempleo FROM plantillahraei inner join compatibilidadotroempleo on compatibilidadotroempleo.id_empleado = plantillahraei.Empleado WHERE
        plantillahraei.Nombre LIKE '%$q%' and compatibilidadotroempleo.otroempleo = 'Si' OR
        plantillahraei.correo LIKE '%$q%' and compatibilidadotroempleo.otroempleo = 'Si' OR
		plantillahraei.Empleado LIKE '%$q%' and compatibilidadotroempleo.otroempleo = 'Si' group by plantillahraei.Empleado");
}
        ?>
<ul class="nav nav-tabs" >
        <li class="nav-item" style="margin: 0px; font-size: 10px; padding: 0px;">
            <a class="nav-link active" aria-current="page" href="#">Total: <?php echo $total_registro; ?> </a>
        </li>
        <li class="nav-item dropdown" style="margin: 0px; font-size: 10px; padding: 0px;">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Check documentos</a>
            <ul class="dropdown-menu" style="margin: 0px; font-size: 10px; padding: 0px;">
                <li><a class="dropdown-item" href="#" onclick="documentos();">Documentación </a></li>
                <li><a class="dropdown-item" href="#" onclick="exportarCompatibilidad();">Exportar a excel </a></li>
                
            </ul>
        </li>
        <input type="text" class="form-control col-md-12" id="busqueda" name="busqueda" placeholder="Buscar..." onkeyup="return handleKeyPress(event);">
    </ul>
    <hr id="hrinicial">

        <input type="hidden" name="total_registro" id="total_registro" value="<?php echo $total_registro; ?>" >
        <?php
        
        
        $query->execute();
        while($dataRegistro= $query->fetch())
        { 
            $acceso = $dataRegistro['otroempleo'];
            $confirmar = $dataRegistro['Empleado'];
            ?>
        
        <div class="item-comentario" id="<?php echo $dataRegistro['Empleado']; ?>" >
        <input type="hidden" class="curp" value="<?php echo $dataRegistro['RFC']; ?>">
                <div id='<?php echo $dataRegistro['Empleado']; ?>' class='ver-info' >
                <?php echo '<strong style="font-family: Arial;font-size: 10px; margin-left: 7px; text-transform: uppercase;">&nbsp'.$dataRegistro['Nombre'].'</strong>'.''.'<strong style="font-size: 9px; margin-left: 7px; color:red;">&nbsp'.$dataRegistro['Empleado'].'</strong>'.'<br>'.'<strong style="font-size: 9px; margin-left: 7px; color: black;">&nbsp'.$dataRegistro['RFC'].'</strong>'.'<br>'.'<strong style="font-size: 8px; margin-left: 7px;">&nbsp'.$dataRegistro['DescripcionPuesto'].'</strong>'.'<strong style="font-size: 10px; color: red; margin-left: 7px;">&nbsp'.$dataRegistro['DescripcionAdscripcion'].'</strong><br>';
                        if($acceso == 'Si'){ 
                        ?><input type="submit" value="Otro empleo" style="padding: 1px; cursor-pointer: none; background: orange; border: none; color: black; margin-left: 1%; font-size: 10px; font-style: arial; margin-top: 0px;"><?php } ?>
                            
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

$sql = $conexion->prepare("SELECT Empleado from plantillahraei inner join compatibilidadotroempleo on compatibilidadotroempleo.id_empleado = plantillahraei.Empleado where compatibilidadotroempleo.otroempleo = 'Si' order by plantillahraei.Empleado desc limit 1");
        $sql->execute();
            $row = $sql->fetch();

?>

<input type="hidden" id="cargaPrimerRegsitro" value="<?php echo $row['Empleado'] ?>">
<script>
    function exportarCompatibilidad() {
    window.location.href='aplicacion/excelCompatibilidad'

}
function documentos() {
    var id = $("#idpersonal").val();
    let parametros = { id: id }
        $.ajax({
            data: parametros,
            url: 'verDocumentoContratacion.php',
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
            url: "consultaBusquedaCompatibilidad.php",
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
        url: "consultaBusquedaCompatibilidad.php",
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
                    url: 'obtenerMasRegistrosCompatibilidad.php',
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