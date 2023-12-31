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
    $conexionX = new ConexionRh();
    $sqlQueryComentarios  = $conexionX->prepare("SELECT nombre_capacitacion.id_capacitacion FROM nombre_capacitacion");
    $sqlQueryComentarios->execute();
    $sqlQueryComentarios = $conexionX->prepare("SELECT FOUND_ROWS()");
    $sqlQueryComentarios->execute();
    $total_registro = $sqlQueryComentarios->fetchColumn();
    $query= $conexionX->prepare("SELECT id_capacitacion,nombre_capacitacion, lugar_imparte,programa,tema_capacitacion,estadoactivo,editarDatos FROM nombre_capacitacion order by id_capacitacion DESC LIMIT 30");
    if (isset($_POST['evento'])) {
        $id = $_POST['evento'];
    $query= $conexionX->prepare("SELECT id_capacitacion,nombre_capacitacion, lugar_imparte,programa,tema_capacitacion FROM nombre_capacitacion where 
    nombre_capacitacion like '%$id%' or
    lugar_imparte like '%$id%' or
    programa like '%$id%' or
    tema_capacitacion like '%$id%' order by nombre_capacitacion.id_capacitacion");
    }
    
?>
<ul class="nav nav-tabs" >
        <li class="nav-item" style="margin: 0px; font-size: 10px; padding: 0px;">
            <a class="nav-link active" aria-current="page" href="#">Total: <?php echo $total_registro; ?> </a>
        </li>
        <input type="text" class="form-control col-md-12" id="busqueda" name="busqueda" placeholder="Buscar..." onkeyup="return handleKeyPress(event);">
    </ul>
    
<hr id="hrinicial" style="margin-top: 3px;">

    <input type="hidden" name="total_registro" id="total_registro" value="<?php echo $total_registro; ?>" />
        <?php
        
        
        $query->execute();
        while($dataRegistro= $query->fetch())
        { ?>
        
        <div class="item-comentario" id="<?php echo $dataRegistro['id_capacitacion']; ?>" >
            <?php
            error_reporting(0);
            
            $id = $dataRegistro['id_capacitacion'];
            
            ?>
            
                <div id='<?php echo $id ?>' class='ver-info' >
                    <?php echo '<strong style="font-family: Arial; white-space: nowrap; font-size: 10px; margin-left: 7px; text-transform: uppercase;">&nbsp'.$dataRegistro['nombre_capacitacion'].'</strong>'.'<br>'.'<strong style="font-size: 9px; margin-left: 7px;">&nbsp'.$dataRegistro['lugar_imparte'].'</strong>'.'<br>'.'<strong style="font-size: 9px; margin-left: 7px; color: red;">&nbsp'.$dataRegistro['programa'].'</strong>';
                    
                        ?>
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

$sql = $conexionX->prepare("SELECT nombre_capacitacion.id_capacitacion FROM nombre_capacitacion order by id_capacitacion desc limit 1");
$sql->execute();
$row = $sql->fetch();

?>

<input type="hidden" id="cargaPrimerRegsitro" value="<?php echo $row['id_capacitacion'] ?>">
<script>
    
$(function() {
    var id = $("#cargaPrimerRegsitro").val();
        
        let ob = {
            id: id
        };
  
        $.ajax({
            type: "POST",
            url: "consultaBusquedaRegistroEventosCapacitacion.php",
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
        url: "consultaBusquedaRegistroEventosCapacitacion.php",
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
    $('#tabla_resultado').html(
        '<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader2.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>'
    );


    return false;
});
}); 
$('.ver-info').on('click',function(){
	$('.ver-info').removeClass('selected');
        $(this).addClass('selected');
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
                    url: 'obteniendoMasDatosPlantilla.php',
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
    </body>
</html>