<?php
include("conexionCancer.php");
error_reporting(0);
date_default_timezone_set('America/Monterrey');
$hoy = date("Y-m-d");
    extract($_POST);
		
	//buscamos el email	   
	$sql_busqueda = $conexionCancer->prepare("SELECT curp, id from dato_usuario where curp = :curp");
	$sql_busqueda->execute(array(
        ':curp'=>$curp
    ));
    $sql_busqueda->execute();
    $validacion = $sql_busqueda->fetch();
    if(is_array($validacion)){
        $validaCurp = $validacion['curp'];
        $id_check = $validacion['id'];
    }
            $sql = $conexionCancer->prepare("SELECT id_paciente from cancerpaciente where id_paciente = :id_paciente limit 1");
                            $sql->execute(array(
            
                                ':id_paciente' => $id_check
                            
                            ));
                            
                            $row = $sql->fetch();
                            if(is_array($row)){
                            $id_valida = $row['id_paciente'];
                            }
    if(isset($id_valida) != false){
        echo "<script>alertify.error('Error ya existe un paciente con estos datos');
        
            </script>";	
        
    }else{
	// SI EL EMAIL NO EXISTE, REGISTRAMOS LOS DATOS EN LA TABLA USUARIO
        //if($validaCurp != $curp){
            try{
                $conexionCancer->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexionCancer->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
                $conexionCancer->beginTransaction();
	$sql = $conexionCancer->prepare("INSERT into dato_usuario(curp, nombrecompleto, poblacionindigena, escolaridad, fechanacimiento, edad, sexo, discapacidad, raza, estado, municipio, year, usuarioregistro) 
    
                                    values (:curp, :nombrecompleto, :poblacionindigena, :escolaridad, :fechanacimiento, :edad, :sexo, :discapacidad, :raza, :estado, :municipio, :year, :usuarioregistro)");
                    
                                $sql->execute(array(
                                    ':curp'=>$curp,
                                    ':nombrecompleto'=>$nombrecompleto,
                                    ':poblacionindigena'=>$poblacionindigena,
                                    ':escolaridad'=>$escolaridad,
                                    ':fechanacimiento'=>$fecha,
                                    ':edad'=>$edad,
                                    ':sexo'=>$sexo,
                                    ':discapacidad'=>$discapacidad, 
                                    ':raza'=>$raza, 
                                    ':estado'=>$cbx_estado,
                                    ':municipio'=>$cbx_municipio,
                                    ':year'=>$hoy,
                                    ':usuarioregistro'=>$usernameSesion
                                ));
                            $sql = $conexionCancer->prepare("SELECT id from dato_usuario where curp = :curp");
                            $sql->execute(array(
                                ':curp' => $curp
                            
                            ));
                            $row = $sql->fetch();
                            $id_usuario = $row['id'];
                            
                            $sql = $conexionCancer->prepare("INSERT into unidadreferenciado(referenciado, clues, id_paciente)
                                    values (:referenciado, :clues, :id_paciente)");
                                    
                                $sql->execute(array(
                                    ':referenciado'=>$referenciado,
                                    ':clues'=>$unidadreferencia,
                                    ':id_paciente'=>$id_usuario
                                ));
                            $sql = $conexionCancer->prepare("INSERT into signosvitales(talla, peso, imc, id_paciente) 
                                    values (:talla, :peso, :imc, :id_paciente)");
                                    
                                $sql->execute(array(
                                    ':talla'=>$talla,
                                    ':peso'=>$peso,
                                    ':imc'=>$imc,
                                    ':id_paciente'=>$id_usuario
                                ));
                            $sql = $conexionCancer->prepare("INSERT into antecedentesgineco(menarca, ultimamestruacion, cuentacon, gestas, parto, aborto, cesarea, embarazada, fpp, terapiareemplazohormonal, lactancia, tiempolactancia, id_paciente) 
                                    values (:menarca, :ultimamestruacion, :cuentacon, :gestas, :parto, :aborto, :cesarea, :embarazada, :fpp, :terapiareemplazohormonal, :lactancia, :tiempolactancia, :id_paciente)");
                                $sql->execute(array(
                                    ':menarca'=>$menarca,
                                    ':ultimamestruacion'=>$fechaultimamestruacion,
                                    ':cuentacon'=>$menopausea,
                                    ':gestas'=>$gestas,
                                    ':parto'=>$parto,
                                    ':aborto'=>$aborto,
                                    ':cesarea'=>$cesarea,
                                    ':embarazada'=>$embarazada,
                                    ':fpp'=>$fechaprobableparto,
                                    ':terapiareemplazohormonal'=>$planificacionfamiliar,
                                    ':lactancia'=>$lactancia,
                                    ':tiempolactancia'=>$tiempolactancia,
                                    ':id_paciente'=>$id_usuario
                                ));
                            
                            $sql = $conexionCancer->prepare("INSERT INTO cancerpaciente(descripcioncancer, id_paciente)
                                        values(:descripcioncancer, :id_paciente)");
                                        $sql->execute(array(
                                            ':descripcioncancer'=>$tipodecancer,
                                            ':id_paciente'=>$id_usuario
                                        ));
                        $check_listapato;
                            foreach($check_listapato as $seleccion) {
                                $sql_s = $conexionCancer->prepare("INSERT into antecedentespatopersonales(descripcionantecedente, id_paciente) 
                                            values('".$seleccion."', '".$id_usuario."')");
                                                $sql_s->execute(array(
                                                    ':descripcionantecedente'=>$seleccion,
                                                    ':id_paciente'=>$id_usuario
                                    ));
                            }
                        $mscancer;
                            foreach($mscancer as $heredo) {
                                $sql_s = $conexionCancer->prepare("INSERT into antecedentesfamiliarescancer(datoantecedentefamiliar, id_paciente) 
                                values(:datoantecedentefamiliar, :id_paciente)");
                                $sql_s->execute(array(
                                    ':datoantecedentefamiliar'=>$heredo,
                                    ':id_paciente'=>$id_usuario
                                ));
                            }
                            $sql = $conexionCancer->prepare("INSERT into atencionclinica(fechaatencioninicial, biradsreferencia, biradshraei, lateralidadmama, estadioclinico, etapaclinica, tamaniotumoral, compromisolenfatico, metastasis, calidaddevidaecog, mastectoextrainstituto, lateralidadmastectoextrainstituto, fechamastectoextrainstituto, id_usuario)
                            values(:fechaatencioninicial, :biradsreferencia, :biradshraei, :lateralidadmama, :estadioclinico, :etapaclinica, :tamaniotumoral, :compromisolenfatico, :metastasis, :calidaddevidaecog, :mastectoextrainstituto, :lateralidadmastectoextrainstituto, :fechamastectoextrainstituto, :id_usuario)");
                            $sql->execute(array(
                                ':fechaatencioninicial'=>$fechaatencioninicial,
                                ':biradsreferencia'=>$biradsreferencia,
                                ':biradshraei'=>$biradshraei,
                                ':lateralidadmama'=>$lateralidadprimero,
                                ':estadioclinico'=>$estadioclinico,
                                ':etapaclinica'=>$etapasclinicas,
                                ':tamaniotumoral'=>$tamaniotumoral,
                                ':compromisolenfatico'=>$linfaticonodal,
                                ':metastasis'=>$metastasis,
                                ':calidaddevidaecog'=>$calidaddevidaecog,
                                ':mastectoextrainstituto'=>$mastectomiaextrainstitucional,
                                ':lateralidadmastectoextrainstituto'=>$lateralidadextrainstitucional,
                                ':fechamastectoextrainstituto'=>$fechamastectoextra,
                                ':id_usuario'=>$id_usuario
                            ));
                        $sitiometastasis;         
                            foreach($sitiometastasis as $heredositiometa) {
                                $sql_s = $conexionCancer->prepare("INSERT into atencionclinicasitiometastasis(descripcionsitiometastasisi, id_paciente) 
                                values(:descripcionsitiometastasisi, :id_paciente)");
                                $sql_s->execute(array(
                                    ':descripcionsitiometastasisi'=>$heredositiometa,
                                    ':id_paciente'=>$id_usuario
                                ));
                            }
                        $mamaseleccion;
                            foreach($mamaseleccion as $heredohistopato) {
                                $sql_s = $conexionCancer->prepare("INSERT into mamahistopatologia(mamahistopato, id_paciente) 
                                values(:mamahistopato, :id_paciente)");
                                $sql_s->execute(array(
                                    ':mamahistopato'=>$heredohistopato,
                                    ':id_paciente'=>$id_usuario
                                ));
                            }
                            $sql = $conexionCancer->prepare("INSERT into histopatologia(dxhistopatologico, fechadxhistopatologico, nottingham, escalasbr, id_usuario)
                                        values(:dxhistopatologico, :fechadxhistopatologico, :nottingham, :escalasbr, :id_usuario)");
                                        $sql->execute(array(
                                            ':dxhistopatologico'=>$dxhistopatologico,
                                            ':fechadxhistopatologico'=>$fechadxhistopatologico,
                                            ':nottingham'=>$nottingham,
                                            ':escalasbr'=>$escalasbr,
                                            ':id_usuario'=>$id_usuario
                                        ));
                                            $sql = $conexionCancer->prepare("INSERT into histopatoregionganglioderecha(dxhistopatologicorgd, fechadxhistopatologicorgd, nottinghamrgd, escalasbrrgd, id_paciente)
                                            values(:dxhistopatologicorgd, :fechadxhistopatologicorgd, :nottinghamrgd, :escalasbrrgd, :id_paciente)");
                                            $sql->execute(array(
                                                ':dxhistopatologicorgd'=>$dxhistopatologicorgd,
                                                ':fechadxhistopatologicorgd'=>$fechadxhistopatologicorgd,
                                                ':nottinghamrgd'=>$nottinghamrgd,
                                                ':escalasbrrgd'=>$escalasbrrgd,
                                                ':id_paciente'=>$id_usuario
                                            ));
                                            
                            $sql = $conexionCancer->prepare("INSERT into histopatologiaizquierda(dxhistopatologicoiz, fechadxhistopatologicoiz, nottinghamiz, escalasbriz, id_paciente)
                                        values(:dxhistopatologicoiz, :fechadxhistopatologicoiz, :nottinghamiz, :escalasbriz, :id_paciente)");
                                        $sql->execute(array(
                                            ':dxhistopatologicoiz'=>$dxhistopatologicoiz,
                                            ':fechadxhistopatologicoiz'=>$fechadxhistopatologicoiz,
                                            ':nottinghamiz'=>$nottinghamiz,
                                            ':escalasbriz'=>$escalasbriz,
                                            ':id_paciente'=>$id_usuario
                                        ));
                                        $sql = $conexionCancer->prepare("INSERT into histopatoregionganglionariz(dxhistopatologicorgi, fechadxhistopatologicorgi, nottinghamrgi, escalasbrrgi, id_paciente)
                                            values(:dxhistopatologicorgi, :fechadxhistopatologicorgi, :nottinghamrgi, :escalasbrrgi, :id_paciente)");
                                            $sql->execute(array(
                                                ':dxhistopatologicorgi'=>$dxhistopatologicorgi,
                                                ':fechadxhistopatologicorgi'=>$fechadxhistopatologicorgi,
                                                ':nottinghamrgi'=>$nottinghamrgi,
                                                ':escalasbrrgi'=>$escalasbrrgi,
                                                ':id_paciente'=>$id_usuario
                                            ));
                            $sql = $conexionCancer->prepare("INSERT into inmunohistoquimica(receptoresestrogenos, receptoresprogesterona, ki67, p53, triplenegativoinmunomamader, aplicopdl, descripcionpdl, oncogenher2, fish, id_usuario)
                                                        values(:receptoresestrogenos, :receptoresprogesterona, :ki67, :p53, :triplenegativoinmunomamader, :aplicopdl, :descripcionpdl, :oncogenher2, :fish, :id_usuario)");
                                                        $sql->execute(array(
                                                            ':receptoresestrogenos'=>$receptoresestrogenos,
                                                            ':receptoresprogesterona'=>$receptoresprogesterona,
                                                            ':ki67'=>$ki67,
                                                            ':p53'=>$p53,
                                                            ':triplenegativoinmunomamader'=>$triplenegativo,
                                                            ':aplicopdl'=>$pdlrealizo,
                                                            ':descripcionpdl'=>$pdl,
                                                            ':oncogenher2'=>$oncogen,
                                                            ':fish'=>$fish,
                                                            ':id_usuario'=>$id_usuario
                                                        ));
                                                            $sql = $conexionCancer->prepare("INSERT into inmunohistoquimicargd(receptoresestrogenosrgd, receptoresprogesteronargd, ki67rgd, p53rgd, triplenegativorgd, aplicopdlrgd, descripcionpdlrgd, oncogenher2rgd, fishrgd, id_paciente)
                                                        values(:receptoresestrogenosrgd, :receptoresprogesteronargd, :ki67rgd, :p53rgd, :triplenegativorgd, :aplicopdlrgd, :descripcionpdlrgd, :oncogenher2rgd, :fishrgd, :id_paciente)");
                                                        $sql->execute(array(
                                                            ':receptoresestrogenosrgd'=>$receptoresestrogenosrgd,
                                                            ':receptoresprogesteronargd'=>$receptoresprogesteronargd,
                                                            ':ki67rgd'=>$ki67rgd,                                                
                                                            ':p53rgd'=>$p53rgd,
                                                            ':triplenegativorgd'=>$triplenegativorgd,
                                                            ':aplicopdlrgd'=>$pdlrealizorgd,
                                                            ':descripcionpdlrgd'=>$pdlrgd,
                                                            ':oncogenher2rgd'=>$oncogenrgd,
                                                            ':fishrgd'=>$fishrgd,
                                                            ':id_paciente'=>$id_usuario
                                                        ));
                                                            
                            $sql = $conexionCancer->prepare("INSERT into inmunohistoquimicaiz(receptoresestrogenosiz, receptoresprogesteronaiz, ki67iz, p53iz, triplenegativoiz, aplicopdliz, descripcionpdliz, oncogenher2iz, fishiz, id_usuario)
                                                        values(:receptoresestrogenosiz, :receptoresprogesteronaiz, :ki67iz, :p53iz, :triplenegativoiz, :aplicopdliz, :descripcionpdliz, :oncogenher2iz, :fishiz, :id_usuario)");
                                                        $sql->execute(array(
                                                            ':receptoresestrogenosiz'=>$receptoresestrogenosiz,
                                                            ':receptoresprogesteronaiz'=>$receptoresprogesteronaiz,
                                                            ':ki67iz'=>$ki67iz,
                                                            ':p53iz'=>$p53iz,
                                                            ':triplenegativoiz'=>$triplenegativoiz,
                                                            ':aplicopdliz'=>$pdlrealizoiz,
                                                            ':descripcionpdliz'=>$pdliz,
                                                            ':oncogenher2iz'=>$oncogeniz,
                                                            ':fishiz'=>$fishiz,
                                                            ':id_usuario'=>$id_usuario
                                                        ));
                                                            $sql = $conexionCancer->prepare("INSERT into inmunohistoquimicargiz(receptoresestrogenosrgiz, receptoresprogesteronargiz, ki67rgiz, p53rgiz, triplenegativorgiz, aplicopdlrgiz, descripcionpdlrgiz, oncogenher2rgiz, fishrgiz, id_paciente)
                                                        values(:receptoresestrogenosrgiz, :receptoresprogesteronargiz, :ki67rgiz, :p53rgiz, :triplenegativorgiz, :aplicopdlrgiz, :descripcionpdlrgiz, :oncogenher2rgiz, :fishrgiz, :id_paciente)");
                                                        $sql->execute(array(
                                                            ':receptoresestrogenosrgiz'=>$receptoresestrogenosizrgi,
                                                            ':receptoresprogesteronargiz'=>$receptoresprogesteronaizrgi,
                                                            ':ki67rgiz'=>$ki67izrgi,
                                                            ':p53rgiz'=>$p53izrgi,
                                                            ':triplenegativorgiz'=>$triplenegativoizrgi,
                                                            ':aplicopdlrgiz'=>$pdlrealizoizrgi,
                                                            ':descripcionpdlrgiz'=>$pdlizrgi,
                                                            ':oncogenher2rgiz'=>$oncogenizrgi,
                                                            ':fishrgiz'=>$fishizrgi,
                                                            ':id_paciente'=>$id_usuario
                                                        ));
                        $mamaseleccionmolecular;
                                foreach($mamaseleccionmolecular as $heredomolecular) {
                                            $sql_s = $conexionCancer->prepare("INSERT into mamamolecular(mamaseleccion, id_paciente) 
                                                
                                                values(:mamaseleccion, :id_paciente)");
                                            
                                                        $sql_s->execute(array(
                                                                    ':mamaseleccion'=>$heredomolecular,
                                                                    ':id_paciente'=>$id_usuario
                                            
                                                            ));
                                                    }           
                                                    
                                                            $sql = $conexionCancer->prepare("INSERT into molecular(luminala, luminalb, enriquecidoher2, basal, id_paciente) 
                                                            values(:luminala, :luminalb, :enriquecidoher2, :basal, :id_paciente)");
                                                            $sql->execute(array(
                                                                ':luminala'=>$luminala,
                                                                ':luminalb'=>$luminalb,
                                                                ':enriquecidoher2'=>$enriquecidoherdos,
                                                                ':basal'=>$basal,
                                                                ':id_paciente'=>$id_usuario
                                                            ));
                                                            $sql = $conexionCancer->prepare("INSERT into molecularrgd(luminalargd, luminalbrgd, enriquecidoher2rgd, basalrgd, id_paciente) 
                                                            values(:luminalargd, :luminalbrgd, :enriquecidoher2rgd, :basalrgd, :id_paciente)");
                                                                $sql->execute(array(
                                                                    ':luminalargd'=>$luminalammrgd,
                                                                    ':luminalbrgd'=>$luminalbmmrgd,
                                                                    ':enriquecidoher2rgd'=>$enriquecidoherdosmmrgd,
                                                                    ':basalrgd'=>$basalmmrgd,
                                                                    ':id_paciente'=>$id_usuario
                                                                ));
                                                            $sql = $conexionCancer->prepare("INSERT into molecularizquierda(luminalaiz, luminalbiz, enriquecidoher2iz, basaliz, id_paciente) 
                                                            values(:luminalaiz, :luminalbiz, :enriquecidoher2iz, :basaliz, :id_paciente)");
                                                                    $sql->execute(array(
                                                                        ':luminalaiz'=>$luminalaiz,
                                                                        ':luminalbiz'=>$luminalbiz,
                                                                        ':enriquecidoher2iz'=>$enriquecidoherdosiz,
                                                                        ':basaliz'=>$basaliz,
                                                                        ':id_paciente'=>$id_usuario
                                                                    ));
                                                            $sql = $conexionCancer->prepare("INSERT into molecularrgiz(luminalargiz, luminalbrgiz, enriquecidoher2rgiz, basalrgiz, id_paciente) 
                                                            values(:luminalargiz, :luminalbrgiz, :enriquecidoher2rgiz, :basalrgiz, :id_paciente)");
                                                                    $sql->execute(array(
                                                                        ':luminalargiz'=>$luminalaizmmrgi,
                                                                        ':luminalbrgiz'=>$luminalbizmmrgi,
                                                                        ':enriquecidoher2rgiz'=>$enriquecidoherdosizmmrgi,
                                                                        ':basalrgiz'=>$basalizmmrgi,
                                                                        ':id_paciente'=>$id_usuario
                                                                    ));
                                                            $sql_m = $conexionCancer->prepare("INSERT into quirurgico(realizoquirurgico, lateralidad, id_paciente)
                                                                        values(:realizoquirurgico, :lateralidad, :id_paciente)");
                                                                    $sql_m->execute(array(
                                                                        ':realizoquirurgico'=>$quirurgico,
                                                                        ':lateralidad'=>$lateralidadsegundo,
                                                                        ':id_paciente'=>$id_usuario
                                                                    ));
                                                            $sql_id = $conexionCancer->prepare("SELECT id_quirurgico from quirurgico where id_paciente = :id_paciente");
                                                                    $sql_id->execute(array(
                                                                        ':id_paciente'=>$id_usuario
                                                                    ));
                                                $row_id = $sql_id->fetch();
                                                $ultimoid = $row_id['id_quirurgico'];
                                                $quirurgicotipo;
                                                            foreach($quirurgicotipo as $heredoquirurgico) {
                                                                $sql_f = $conexionCancer->prepare("INSERT into quirugicotipo(descripciontipoquirurgico, id_quirurgico) 
                                                                                                        
                                                                values(:descripciontipoquirurgico, :id_quirurgico)");
                                                                                                    
                                                                $sql_f->execute(array(
                                                                    ':descripciontipoquirurgico'=>$heredoquirurgico,
                                                                    ':id_quirurgico'=>$ultimoid
                                                                                                    
                                                                ));
                                                            }
                                                            $sql = $conexionCancer->prepare("INSERT into mastecto_gaglionar(tipomastecto, fecha_mastecto, tipoganglionar, fechatipogaglionar, id_paciente)
                                                            values(:tipomastecto, :fecha_mastecto, :tipoganglionar, :fechatipogaglionar, :id_paciente)");  
                                                                    $sql->execute(array(
                                                                        ':tipomastecto'=>$mastectomiatipo,
                                                                        ':fecha_mastecto'=>$fechatipomastecto,
                                                                        ':tipoganglionar'=>$ganglionartipo,
                                                                        ':fechatipogaglionar'=>$fechatipoganglio,
                                                                        ':id_paciente'=>$id_usuario
                                                                    ));
                                                            $sql = $conexionCancer->prepare("INSERT into reconstruccion(reconstruccion, tiporeconstruccion, fecha, id_quirurgico)
                                                                            values(:reconstruccion, :tiporeconstruccion, :fecha, :id_quirurgico)");
                                                                                $sql->execute(array(
                                                                                    ':reconstruccion'=>$reconstruccionsino,
                                                                                    ':tiporeconstruccion'=>$reconstrucciontipo,
                                                                                    ':fecha'=>$fechatiporeconstruccion,
                                                                                    ':id_quirurgico'=>$ultimoid
                                                                                ));
                                                            $sql = $conexionCancer->prepare("INSERT into quimioterapia(aplicoquimio, fechainicio, primeralinea, ciclosprimerlineaqt, segundalinea, ciclossegundalineaqt, antraciclinas, momentodelaqt, hormonoterapia, tipohormonoterapia, momentohormonoterapia, her2, esquemaher2, triplenegativo, esquematrilpenegativo, hormonosensible, 
                                                                esquemahormonosensible, tipotratamiento, completoquimio, causaqtincompleta, fechaeventoadverso, fechaprogresion, fecharecurrencia, fechafallecio, causafallecio, especifique, id_paciente) 
                                                                    values(:aplicoquimio, :fechainicio, :primeralinea, :ciclosprimerlineaqt, :segundalinea, :ciclossegundalineaqt, :antraciclinas, :momentodelaqt, :hormonoterapia, :tipohormonoterapia, :momentohormonoterapia, :her2, :esquemaher2, :triplenegativo, :esquematrilpenegativo, :hormonosensible, 
                                                                        :esquemahormonosensible, :tipotratamiento, :completoquimio, :causaqtincompleta, :fechaeventoadverso, :fechaprogresion, :fecharecurrencia, :fechafallecio, :causafallecio, :especifique, :id_paciente)");
                                                            $sql->execute(array(
                                                                ':aplicoquimio'=>$aplicoquimio,
                                                                ':fechainicio'=>$fechadeinicioquimio,
                                                                ':primeralinea'=>$primerlinea,
                                                                ':ciclosprimerlineaqt'=>$ciclosprimerlineaqt,
                                                                ':segundalinea'=>$segundalinea,
                                                                ':ciclossegundalineaqt'=>$ciclossegundalineaqt,
                                                                ':antraciclinas'=>$antraciclinas,
                                                                ':momentodelaqt'=>$momentoquimio,
                                                                ':hormonoterapia'=>$hormonoterapia,
                                                                ':tipohormonoterapia'=>$tipohormonoterapia,
                                                                ':momentohormonoterapia'=>$momentohormonoterapia,
                                                                ':her2'=>$her,
                                                                ':esquemaher2'=>$esquemaherdos,
                                                                ':triplenegativo'=>$triplenegativo,
                                                                ':esquematrilpenegativo'=>$esquematriple,
                                                                ':hormonosensible'=>$hormonosensibles,
                                                                ':esquemahormonosensible'=>$esquemahormonosensible,
                                                                ':tipotratamiento'=>$tipotratamiento,
                                                                ':completoquimio'=>$completoquimio,
                                                                ':causaqtincompleta'=>$quimioesquema,
                                                                ':fechaeventoadverso'=>$fechaeventoadverso,
                                                                ':fechaprogresion'=>$fechaprogresion,
                                                                ':fecharecurrencia'=>$fecharecurrencia,
                                                                ':fechafallecio'=>$fechadefuncion,
                                                                ':causafallecio'=>$otracausa,
                                                                ':especifique'=>$especifiquecausa,
                                                                ':id_paciente'=>$id_usuario
                                                            ));
                                                        $sql = $conexionCancer->prepare("INSERT into radioterapia(aplicoradio, decripcionradio, fecharadio, numerodesesiones, id_paciente)
                                                                    values(:aplicoradio, :decripcionradio, :fecharadio, :numerodesesiones, :id_paciente)");
                                                                $sql->execute(array(
                                                                    ':aplicoradio'=>$radioterapia,
                                                                    ':decripcionradio'=>$aplicoradioterapia,
                                                                    ':fecharadio'=>$fechainicioradio,
                                                                    ':numerodesesiones'=>$numerosesiones,
                                                                    ':id_paciente'=>$id_usuario
                                                                ));
                                        $sql = $conexionCancer->prepare("INSERT into braquiterapia(aplicobraquiterapia, fechabraquiterapia, id_paciente) values(:aplicobraquiterapia, :fechabraquiterapia, :id_paciente)");
                                                        $sql->execute(array(
                                                            ':aplicobraquiterapia'=>$braquiterapia,
                                                            ':fechabraquiterapia'=>$fechadebraquiterapia,
                                                            ':id_paciente'=>$id_usuario
                                                        ));
                                                            
                                        $sql = $conexionCancer->prepare("INSERT into defencionpaciente(defuncion, fechadefuncion, causadefuncion, id_paciente) values(:defuncion, :fechadefuncion, :causadefuncion, :id_paciente)");
                                                        $sql->execute(array(
                                                            ':defuncion'=>$defunsi,
                                                            ':fechadefuncion'=>$fechadeladefuncion,
                                                            ':causadefuncion'=>$causadefuncion,
                                                            ':id_paciente'=>$id_usuario
                                                        ));
                                                        $validatransac = $conexionCancer->commit();

                            if($validatransac != false) {
                                echo "<script>alertify.success('Datos registrados');
                </script>";
                }
            }catch(Exception $e) {
                $conexionCancer->rollBack();
                echo "<script>alertify.error('Error inesperado');
                    </script>";
            }
    }
                                
                            ?>