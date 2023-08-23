<?php

 $host = 'localhost';
 $basededatos = 'postulate';
 $usuario = 'root';
 $contraseña = 'serverlocal';
 
 $conexion2 = new mysqli($host, $usuario,$contraseña, $basededatos);
 
 if ($conexion2 -> connect_errno)
 {
   die("Fallo la conexion:(".$conexion2 -> mysqli_connect_errno().")".$conexion2-> mysqli_connect_error());
 }
 

?>