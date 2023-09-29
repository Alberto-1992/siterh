<?php
error_reporting(0);
require_once 'conexionRh.php';
$id = $_POST['id'];

$sql = $conexionRh->prepare("UPDATE datos set validaautorizacion = :validaautorizacion where id = :id");
    $sql->execute(array(
        ':validaautorizacion'=>1,
        ':id'=>$id
    ));

if($sql == true){
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Autorizado',
        showConfirmButton: false,
        timer: 1500
    })</script>";
}else{
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al autorizar',
        showConfirmButton: false,
        timer: 1500
    })</script>";
}

?>