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
//error_reporting(0);
	require 'conexionRh.php';
    $sqlQueryComentarios  = $conexionGrafico->query("SELECT * FROM usuariosrh");
    $total_registro  = mysqli_num_rows($sqlQueryComentarios);

    $query= $conexionRh->prepare("SELECT id_usuario,nombrecompleto,correoelectronico,claveacceso,rolacceso from usuariosrh order by id_usuario DESC LIMIT 23 ");
    if(isset($_POST['evento']))
{
	$q= $_POST['evento'];
	$query=$conexionRol->prepare("SELECT id_usuario,nombrecompleto,correoelectronico,claveacceso,rolacceso  FROM usuariosrh WHERE
        nombrecompleto LIKE '%$q%' OR
        correoelectronico LIKE '%$q%' OR
        claveacceso LIKE '%$q%' OR
		rolacceso LIKE '%$q%' group by id_usuario");
}
        ?>
<input type="hidden" id="totalregistro" value="<?php echo $total_registro; ?>">
<ul class="nav nav-tabs" >
        <li class="nav-item" style="margin: 0px; font-size: 10px; padding: 0px;">
            <a class="nav-link active" aria-current="page" href="#" style="color: red;">Total: <?php echo $total_registro; ?> </a>
        </li>
        <!--
        <li class="nav-item dropdown" style="margin: 0px; font-size: 10px; padding: 0px;">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Check documentos</a>
            <ul class="dropdown-menu" style="margin: 0px; font-size: 10px; padding: 0px;">
                <li><a class="dropdown-item" href="#" onclick="documentos();">Documentacion: </a></li>
                
                
            </ul>
        </li>
-->
<input type="text" class="form-control col-md-12" id="busqueda" name="busqueda" placeholder="Buscar..." onkeyup="return handleKeyPress(event);">
    </ul>
    <hr id="hrinicial">

        <input type="hidden" name="total_registro" id="total_registro" value="<?php echo $total_registro; ?>" >
        <?php
        
        
        $query->execute();
        while($dataRegistro= $query->fetch())
        { 
        
            ?>
        
        <div class="item-comentario" id="<?php echo $dataRegistro['id_usuario']; ?>" >
        
                <div id='<?php echo $dataRegistro['id_usuario']; ?>' class='ver-info' >
                    <?php echo '<strong style="font-family: Arial; white-space: nowrap; font-size: 10px; margin-left: 7px; text-transform: uppercase;">&nbsp'.$dataRegistro['nombrecompleto'].'</strong>'.'<br>'.'<strong style="font-size: 9px; margin-left: 7px;">&nbsp'.$dataRegistro['correoelectronico'].'</strong>'.'<br>';
                        ?>
                    
                    </div> 
                <hr id="hr">
            </div>
        <?php 
        }
    ?>
</div>

<?php

require_once 'conexionRh.php';
$sql = $conexionRh->query("SELECT id_usuario from usuariosrh order by id_usuario desc limit 1");
        $sql->execute();
            $row = $sql->fetch();

?>

<input type="hidden" id="cargaPrimerRegsitro" value="<?php echo $row['id_usuario'] ?>">
<script>

$(function() {
    var id = $("#cargaPrimerRegsitro").val();
        
        let ob = {
            id: id
        };
        $.ajax({
            type: "POST",
            url: "consultaAdministradoresBusqueda.php",
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
        url: "consultaAdministradoresBusqueda.php",
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



document.addEventListener('keydown', (event) => {

if (event.keyCode == 8 || event.keyCode == 46) {
    $("#tabla_resultadobus").off("scroll");
}
}, false);


$('.ver-info').on('click',function(){
	$('.ver-info').removeClass('selected');
        $(this).addClass('selected');
});
</script>