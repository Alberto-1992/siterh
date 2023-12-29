<?php
$id = $_GET['id'];
$titulo = $_GET['titulo'].'.pdf';
$ar = '../documentos/'.$id.'/'.$titulo;
    
            unlink($ar);     
    echo "<script>alert('Documento eliminado'); window.history.back();</script>";
?>