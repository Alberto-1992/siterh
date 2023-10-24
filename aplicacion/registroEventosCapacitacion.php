<?php

require_once '../clases/conexion.php';
$conexion = new ConexionRh();
extract($_POST);
try {



    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $conexion->beginTransaction();
    error_reporting(0);

    if (!$correo == "") {
        $sql = $conexion->prepare(" INSERT INTO provedor(nombreprovedor, telefono, correo_probedor, tipo_provedor) VALUES(:nombreprovedor, :telefono, :correo_probedor, :tipo_provedor)");
        $sql->execute(
            array(
                ':nombreprovedor' => $nombreProvedor,
                ':telefono' => $telefono,
                ':correo_probedor' => $correo,
                ':tipo_provedor' => $tipo_provedor
            )
        );
    }
    if (!$NombreprogragaPropuesto == "") {
        $sql = $conexion->prepare(" INSERT INTO programa_propuesto(nombre_programapropuesto) VALUES(:nombre_programapropuesto)");
        $sql->execute(
            array(

                ':nombre_programapropuesto' => $NombreprogragaPropuesto

            )
        );

    }

    if (!$LineEstratejica == "") { //condicion para ejecurar solo este evento en el formulario 
        $sql = $conexion->prepare(" INSERT INTO linea_estratejica(nombre_lineaestratejica) VALUES(:nombre_lineaestratejica)");
        $sql->execute(
            array(

                ':nombre_lineaestratejica' => $LineEstratejica

            )
        );
    }

    if (!$Areacordinacion == "") {
        $sql = $conexion->prepare(" INSERT INTO are_cordina(nombre_areacordina) VALUES(:nombre_areacordina)");
    $sql->execute(
        array(

            ':nombre_areacordina' => $Areacordinacion

        )
    );
    }

    if (!$nombredelPrograma =="") {
        $sql = $conexion->prepare(" INSERT INTO id_programa(nombre_programa) VALUES(:nombre_programa)");
    $sql->execute(
        array(

            ':nombre_programa' => $nombredelPrograma

        )
    );

    }

    if (!$AreaFortalese == "") {
        $sql = $conexion->prepare(" INSERT INTO are_fort5alese(nombre) VALUES(:nombre)");
    $sql->execute(
        array(

            ':nombre' => $AreaFortalese

        )
    );
    }
/*modificar el tipo de capacitacion insertar los datos en las tablas actuales*/
    if (!$tipodeAccion =="") {
        $sql = $conexion->prepare(" INSERT INTO tipo_accion(nombre_tipoaccion) VALUES(:nombre_tipoaccion)");
    $sql->execute(
        array(

            ':nombre_tipoaccion' => $tipodeAccion

        )
    );
    }

    if (!$Personaltipo =="") {
        $sql = $conexion->prepare(" INSERT INTO tipo_personal(nombredetipo_personal) VALUES(:nombredetipo_personal)");
    $sql->execute(
        array(

            ':nombredetipo_personal' => $Personaltipo

        )
    );
    }

    if (!$Modalidad_tomar =="") {
        
        $sql = $conexion->prepare(" INSERT INTO modalidad(nombre_modalidad) VALUES(:nombre_modalidad)");
    $sql->execute(
        array(

            ':nombre_modalidad' => $Modalidad_tomar

        )
    );
    }

    if (!$Competenciatipo =="") {
        $sql = $conexion->prepare(" INSERT INTO competencia(nombrecompetencia) VALUES(:nombrecompetencia)");
    $sql->execute(
        array(

            ':nombrecompetencia' => $Competenciatipo

        )
    );
    }
    

    $validatransac = $conexion->commit();


    if ($validatransac != false) {
        echo "<script>Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Gracias dato insertado Correctamente',
            showConfirmButton: false,
            timer: 1900
        })</script>";

    }


} catch (Exception $th) {
    echo $th;
    $conexion->rollBack();
    echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Error al enviar el dato',
        showConfirmButton: false,
        timer: 1900
    })</script>";
}


?>