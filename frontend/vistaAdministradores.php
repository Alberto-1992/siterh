<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php
error_reporting(0);
date_default_timezone_set('America/Monterrey');
$fecha_actual = new DateTime(date('Y-m-d'));

require 'conexionRh.php';
?>

<div id="mensaje"></div>
<input type="hidden" id="idpersonal" value="<?php echo $dataRegistro['id_usuario']; ?>">
<input type="hidden" id="nombrecandidato" value="<?php echo $dataRegistro['nombrecompleto']; ?>">
<ul class="nav nav-tabs" style="margin-top: 47px;" >       
            <li class="nav-item dropdown" style="margin: 0px; font-size: 10px; padding: 0px;">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" style="color: red;">Acciones</a>
            <ul class="dropdown-menu" style="margin: 0px; font-size: 10px; padding: 0px;">
                <li><a class="dropdown-item" href="#" onclick="eliminarRegistro();">Eliminar registro</a></li>
            
                </ul>
        </li>
    </ul>
                <style>
                    .table:hover {
                            background: #EBEBEB;
                    }
                </style>
                <script>
    function eliminarRegistro() {
    var id = $("#idpersonal").val();
    var mensaje = confirm("el registro se eliminara"); 
    let parametros = { id: id }
    if (mensaje == true) {
        $.ajax({
            data: parametros,
            url: 'aplicacion/eliminarUsuarioAdministrador.php',
            type: 'post',

            success: function (response) {
                $("#mensaje").html(response);
                $("#tabla_resultadobus").load('consultaAdministradores.php');
                

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


</script>
<?php
$validaacceso = $dataRegistro['rolacceso'];
$one = 'Todos los accesos';
$two = 'Operativo';
$thre = 'Mando';
if($validaacceso == 8){
    $acceso = $one;
}else if($validaacceso == 7){
    $acceso = $two;
}
else if($validaacceso == 4){
    $acceso = $thre;
}
    ?>
<table class="table table-responsive  table-bordered " cellspacing="0" width="100%" >
    <div class="containerr2">Datos personales</div>
    <tr>
        <th id="th">Nombre:</th>
        <td id="td"><?php echo $dataRegistro['nombrecompleto'] ?></td>
    </tr>
    <tr>
        <th id="th">Correo:</th>
        <td id="td"><?php echo $dataRegistro['correoelectronico'] ?></td>
    </tr>
    <tr>
        <th id="th">clave acceso:</th>
        <td id="td"><?php echo $dataRegistro['claveacceso']?></td>
    </tr>
    <tr>
        <th id="th">Rol acceso:</th>
        <td id="td"><?php echo $acceso; ?></td>
    </tr>
    
</table>

    
</table>
<?php
    require 'modals/buscarpostuladobolsa.php';

?>