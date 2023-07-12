<?php
include("conexionCancer.php");
error_reporting(0);

date_default_timezone_set('America/Monterrey');
$hoy = date("Y-m-d");
    extract($_POST);
    $tipodecancer = 'Cancer bucal'; 	
	//buscamos el email	   
	$sql_busqueda = $conexionCancer->prepare("SELECT curpbucal, id_bucal from dato_usuariobucal where curpbucal = :curpbucal");
	$sql_busqueda->execute(array(
        ':curpbucal'=>$curp
    ));
    $validacion = $sql_busqueda->fetch();
    if(is_array($validacion)){
        $validaCurp = $validacion['curpbucal'];
        $id_check = $validacion['id_bucal'];
    }
            $sql = $conexionCancer->prepare("SELECT id_pacientebucal from cancerbucal where id_pacientebucal = :id_pacientebucal limit 1");
                            $sql->execute(array(
            
                                ':id_pacientebucal' =>$id_check
                            
                            ));
                            
                            $row = $sql->fetch();
                            if(is_array($row)){
                            $id_valida = $row['id_pacientebucal'];
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
	$sql = $conexionCancer->prepare("INSERT into dato_usuariobucal(curpbucal, nombrecompletobucal, escolaridadbucal, fechanacimientobucal, edadbucal, sexobucal, estadobucal, municipiobucal, yearbucal, usuarioregistro) 
    
                                    values (:curpbucal, :nombrecompletobucal, :escolaridadbucal, :fechanacimientobucal, :edadbucal, :sexobucal, :estadobucal, :municipiobucal, :yearbucal, :usuarioregistro)");
                    
                                $sql->execute(array(
                                    ':curpbucal'=>$curp,
                                    ':nombrecompletobucal'=>$nombrecompleto,
                                    ':escolaridadbucal'=>$escolaridad,
                                    ':fechanacimientobucal'=>$fecha,  
                                    ':edadbucal'=>$edad,  
                                    ':sexobucal'=>$sexo,
                                    ':estadobucal'=>$cbx_estado,  
                                    ':municipiobucal'=>$cbx_municipio,  
                                    ':yearbucal'=>$hoy,
                                    ':usuarioregistro'=>$usernameSesion
                                )); 

                            $sql = $conexionCancer->prepare("SELECT id_bucal from dato_usuariobucal where curpbucal = :curpbucal");
                            $sql->execute(array(
            
                                ':curpbucal'=>$curp
                            
                            ));
                            $row = $sql->fetch();
                            $id_usuario = $row['id_bucal'];
                            
                            $sql = $conexionCancer->prepare("INSERT INTO cancerbucal(descripcion_bucal, id_pacientebucal)
                                        values(:descripcion_bucal, :id_pacientebucal)");
                                        $sql->execute(array(
                                            ':descripcion_bucal'=>$tipodecancer,
                                            ':id_pacientebucal'=>$id_usuario
                                        ));
                                        $sql = $conexionCancer->prepare("INSERT into unidadreferenciadobucal(id_referenciabucal, id_pacientebucal, referenciadobucal, cluesbucal) 
                                        values(:id_referenciabucal, :id_pacientebucal, :referenciadobucal, :cluesbucal)");
                                        $sql->execute(array(
                                                ':id_referenciabucal'=>uniqid('hraei'),
                                                ':id_pacientebucal'=>$id_usuario, 
                                                ':referenciadobucal'=>$referenciado,
                                                ':cluesbucal'=>$unidadreferencia
                                        ));
                                
    
                                $sql = $conexionCancer->prepare("INSERT into somatometriabucal(id_signovitalbucal, id_pacientebucal, tallabucal, pesobucal, imcbucal)
                                        values(:id_signovitalbucal, :id_pacientebucal, :tallabucal, :pesobucal, :imcbucal)");
                                        $sql->execute(array(
                                                    ':id_signovitalbucal'=>uniqid('hraei'),
                                                    ':id_pacientebucal'=>$id_usuario,   
                                                    ':tallabucal'=>$tallabucal,
                                                    ':pesobucal'=>$pesobucal,
                                                    ':imcbucal'=>$imcbucal 
                                                    
                                        ));
                                $sql = $conexionCancer->prepare("INSERT into antecedentesnopatologicosbucal(id_antecedentenopato,id_pacientebucal,exposicionsolarbucal,comidasbucal,higienebucal)
                                    values(:id_antecedentenopato,:id_pacientebucal,:exposicionsolarbucal,:comidasbucal,:higienebucal)");
                                        $sql->execute(array(
                                            ':id_antecedentenopato'=>uniqid('hraei'),
                                            ':id_pacientebucal'=>$id_usuario,
                                            ':exposicionsolarbucal'=>$exposicionsolarbucal,
                                            ':comidasbucal'=>$comidasbucal,
                                            ':higienebucal'=>$higienebucal
                                        ));
                                        $mstoxicomanias;
                                            foreach($mstoxicomanias as $toxicohabitos) {
                                                $sql = $conexionCancer->prepare("INSERT into antecedentespersonalespatotoxicobucal(descripcionantecedentepatobucal, id_pacientebucal) 
                                
                                                values(:descripcionantecedentepatobucal, :id_pacientebucal)");
                            
                                                $sql->execute(array(
                                                    ':descripcionantecedentepatobucal'=>$toxicohabitos,
                                                    ':id_pacientebucal'=>$id_usuario
                            
                                                ));
                                            }
                                        $mshabitos;
                                            foreach($mshabitos as $habitos) {
                                                $sql = $conexionCancer->prepare("INSERT into habitospersonalespatobucal(descripcionhabitopatobucal, id_pacientebucal) 
                                
                                                values(:descripcionhabitopatobucal, :id_pacientebucal)");
                            
                                                $sql->execute(array(
                                                    ':descripcionhabitopatobucal'=>$habitos,
                                                    ':id_pacientebucal'=>$id_usuario
                            
                                                ));
                                            }
                                        $sql = $conexionCancer->prepare("INSERT into alcoholismotabaquismobucal(id_alcoholtabacobucal,id_pacientebucal,frecuenciaalcoholbucal,tiempotabaquismobucal,cigarrosaldiabucal)
                                        values(:id_alcoholtabacobucal,:id_pacientebucal,:frecuenciaalcoholbucal,:tiempotabaquismobucal,:cigarrosaldiabucal)");
                                            $sql->execute(array(
                                                ':id_alcoholtabacobucal'=>uniqid('hraei'),
                                                ':id_pacientebucal'=>$id_usuario,
                                                ':frecuenciaalcoholbucal'=>$frecuenciaal,
                                                ':tiempotabaquismobucal'=>$anostabaquismo,
                                                ':cigarrosaldiabucal'=>$cigarrosdia
                                            ));
                                        
                                            $msvirus;
                                                foreach($msvirus as $viruspato) {
                                                    $sql = $conexionCancer->prepare("INSERT into viruspatobucal(descripcionviruspatobucal, id_pacientebucal) 
                                    
                                                    values(:descripcionviruspatobucal, :id_pacientebucal)");
                                
                                                    $sql->execute(array(
                                                        ':descripcionviruspatobucal'=>$viruspato,
                                                        ':id_pacientebucal'=>$id_usuario
                                
                                                    ));
                                                }
                                            $mscancer;
                                                foreach($mscancer as $cancerpato) {
                                                    $sql = $conexionCancer->prepare("INSERT into cancerpatopatobucal(descripcioncancerpatobucal, id_pacientebucal) 
                                    
                                                    values(:descripcioncancerpatobucal, :id_pacientebucal)");
                                
                                                    $sql->execute(array(
                                                        ':descripcioncancerpatobucal'=>$cancerpato,
                                                        ':id_pacientebucal'=>$id_usuario
                                
                                                    ));
                                                } 
                                        $msao;
                            foreach($msao as $afectoral) {
                                $sql_s = $conexionCancer->prepare("INSERT into afectacionesoralesbucal(descripcionafectacionoral, id_pacientebucal) 
                
                                values(:descripcionafectacionoral, :id_pacientebucal)");
            
                                $sql_s->execute(array(
                                    ':descripcionafectacionoral'=>$afectoral,
                                    ':id_pacientebucal'=>$id_usuario
            
                                ));
                            }
                        $msodf;
                            foreach($msodf as $afectoraldaniado) {
                                $sql_s = $conexionCancer->prepare("INSERT into afectaciondentalorganoorallesionado(descripcionorganorallesionado, id_pacientebucal) 
                
                                values(:descripcionorganorallesionado, :id_pacientebucal)");
            
                                $sql_s->execute(array(
                                    ':descripcionorganorallesionado'=>$afectoraldaniado,
                                    ':id_pacientebucal'=>$id_usuario
            
                                ));
                            }
                        $msmaxilarsuperiorderecho;
                            foreach($msmaxilarsuperiorderecho as $maxsupderecho) {
                                $sql_s = $conexionCancer->prepare("INSERT into maxisupderecho(descripcionmaxisupdere, id_pacientebucal) 
                
                                values(:descripcionmaxisupdere, :id_pacientebucal)");
            
                                $sql_s->execute(array(
                                    ':descripcionmaxisupdere'=>$maxsupderecho,
                                    ':id_pacientebucal'=>$id_usuario
            
                                ));
                            }
                        $msmaxilarinferiorderecho;
                            foreach($msmaxilarinferiorderecho as $maxinfderecho) {
                                $sql_s = $conexionCancer->prepare("INSERT into maxinfderecho(descripcionmaxinfderecho, id_pacientebucal) 
                
                                values(:descripcionmaxinfderecho, :id_pacientebucal)");
            
                                $sql_s->execute(array(
                                    ':descripcionmaxinfderecho'=>$maxinfderecho,
                                    ':id_pacientebucal'=>$id_usuario
            
                                ));
                            }
                        $msmaxilarsuperiorizquierdo;
                            foreach($msmaxilarsuperiorizquierdo as $maxsupeizquierdo) {
                                $sql_s = $conexionCancer->prepare("INSERT into maxsupizquierdo(descripcionmaxsupizquierdo, id_pacientebucal) 
                
                                values(:descripcionmaxsupizquierdo, :id_pacientebucal)");
            
                                $sql_s->execute(array(
                                    ':descripcionmaxsupizquierdo'=>$maxsupeizquierdo,
                                    ':id_pacientebucal'=>$id_usuario
            
                                ));
                            }
                        $msmaxilarinferiorizquierdo;
                            foreach($msmaxilarinferiorizquierdo as $maxinfeizquierdo) {
                                $sql_s = $conexionCancer->prepare("INSERT into maxinfizquierdo(descripcionmaxinfizquierdo, id_pacientebucal) 
                
                                values(:descripcionmaxinfizquierdo, :id_pacientebucal)");
            
                                $sql_s->execute(array(
                                    ':descripcionmaxinfizquierdo'=>$maxinfeizquierdo,
                                    ':id_pacientebucal'=>$id_usuario
            
                                ));
                            }
                        $sql = $conexionCancer->prepare("INSERT into lesionoralbucal(id_lesionoralbucal,id_pacientebucal,lesionoral,tipotejido,coloracionbucal)
                                    values(:id_lesionoralbucal,:id_pacientebucal,:lesionoral,:tipotejido,:coloracionbucal)");
                                        $sql->execute(array(
                                            ':id_lesionoralbucal'=>uniqid('hraei'),
                                            ':id_pacientebucal'=>$id_usuario,
                                            ':lesionoral'=>$tipolesionoral,
                                            ':tipotejido'=>$tipotejido,
                                            ':coloracionbucal'=>$colorpigmentada
                                        ));
                                        $mstipodelesion;
                                            foreach($mstipodelesion as $tipodelesionoral) {
                                                $sql_s = $conexionCancer->prepare("INSERT into tipolesionoral(descripciontipolesionoral, id_pacientebucal) 
                                
                                                values(:descripciontipolesionoral, :id_pacientebucal)");
                            
                                                $sql_s->execute(array(
                                                    ':descripciontipolesionoral'=>$tipodelesionoral,
                                                    ':id_pacientebucal'=>$id_usuario
                            
                                                ));
                                            }
                                        $msubicacion;
                                            foreach($msubicacion as $ubicacionoraldental) {
                                                $sql_s = $conexionCancer->prepare("INSERT into ubicacionesoralesdentales(descripcionubicacionoral, id_pacientebucal) 
                                
                                                values(:descripcionubicacionoral, :id_pacientebucal)");
                            
                                                $sql_s->execute(array(
                                                    ':descripcionubicacionoral'=>$ubicacionoraldental,
                                                    ':id_pacientebucal'=>$id_usuario
                            
                                                ));
                                            }
                                        $msqueva;
                                            foreach($msqueva as $subatomico) {
                                                $sql_s = $conexionCancer->prepare("INSERT into ubicacionderechasubsitioatomico(descripcionubicderechasubatomico, id_pacientebucal) 
                                
                                                values(:descripcionubicderechasubatomico, :id_pacientebucal)");
                            
                                                $sql_s->execute(array(
                                                    ':descripcionubicderechasubatomico'=>$subatomico,
                                                    ':id_pacientebucal'=>$id_usuario
                            
                                                ));
                                            }
                                        $sql = $conexionCancer->prepare("INSERT into subatomicoderecha(id_subatomicodere,id_pacientebucal,labios,lengua,paladarblando,paladarduro,encia,enciainferior,relacionadoconorganodental)
                                            values(:id_subatomicodere,:id_pacientebucal,:labios,:lengua,:paladarblando,:paladarduro,:encia,:enciainferior,:relacionadoconorganodental)");
                                            $sql->execute(array(
                                                ':id_subatomicodere'=>uniqid('hraei'),
                                                ':id_pacientebucal'=>$id_usuario,
                                                ':labios'=>$labios,
                                                ':lengua'=>$lengua,
                                                ':paladarblando'=>$paladarblando,
                                                ':paladarduro'=>$paladarduro,
                                                ':encia'=>$encia,
                                                ':enciainferior'=>$enciainferior,
                                                ':relacionadoconorganodental'=>$relacion
                                            ));
                                            $msmaxisd;
                                                foreach($msmaxisd as $maxsupderecho) {
                                                    $sql_s = $conexionCancer->prepare("INSERT into ubicaderemazsupdere(descripcionubisupdere,id_pacientebucal) 
                                    
                                                    values(:descripcionubisupdere,:id_pacientebucal)");
                                
                                                    $sql_s->execute(array(
                                                        ':descripcionubisupdere'=>$maxsupderecho,
                                                        ':id_pacientebucal'=>$id_usuario
                                
                                                    ));
                                                }
                                            $msmaxiid;
                                                foreach($msmaxiid as $maxinfderecho) {
                                                    $sql_s = $conexionCancer->prepare("INSERT into ubicaderemazinfdere(descripcionubicainfdere,id_pacientebucal) 
                                    
                                                    values(:descripcionubicainfdere,:id_pacientebucal)");
                                
                                                    $sql_s->execute(array(
                                                        ':descripcionubicainfdere'=>$maxinfderecho,
                                                        ':id_pacientebucal'=>$id_usuario
                                
                                                    ));
                                                }
                                            $msqueva2;
                                                foreach($msqueva2 as $subatomicoiz) {
                                                    $sql_s = $conexionCancer->prepare("INSERT into ubicacionizquierdasubsitioatomico(descripcionubicizquierdasubatomico, id_pacientebucal) 
                                    
                                                    values(:descripcionubicizquierdasubatomico, :id_pacientebucal)");
                                
                                                    $sql_s->execute(array(
                                                        ':descripcionubicizquierdasubatomico'=>$subatomicoiz,
                                                        ':id_pacientebucal'=>$id_usuario
                                
                                                    ));
                                                }
                                        $sql = $conexionCancer->prepare("INSERT into subatomicoizquierda(id_subatomicoizquierda,id_pacientebucal,labiosiz,lenguaiz,paladarblandoiz,paladarduroiz,enciaiz,enciaizinferior,relacionadoconorganodentaliz)
                                            values(:id_subatomicodereizquierda,:id_pacientebucal,:labiosiz,:lenguaiz,:paladarblandoiz,:paladarduroiz,:enciaiz,:enciaizinferior,:relacionadoconorganodentaliz)");
                                            $sql->execute(array(
                                                ':id_subatomicodereizquierda'=>uniqid('hraei'),
                                                ':id_pacientebucal'=>$id_usuario,
                                                ':labiosiz'=>$labiosiz,
                                                ':lenguaiz'=>$lenguaiz,
                                                ':paladarblandoiz'=>$paladarblandoiz,
                                                ':paladarduroiz'=>$paladarduroiz,
                                                ':enciaiz'=>$enciaiz,
                                                ':enciaizinferior'=>$enciaizinferior,
                                                ':relacionadoconorganodentaliz'=>$relacioniz
                                            ));
                                            $msmaxisiiz;
                                                foreach($msmaxisiiz as $maxsupizquierda) {
                                                    $sql_s = $conexionCancer->prepare("INSERT into ubicaderemazsupizquierda(descripcionubisupizquierda,id_pacientebucal) 
                                    
                                                    values(:descripcionubisupizquierda,:id_pacientebucal)");
                                
                                                    $sql_s->execute(array(
                                                        ':descripcionubisupizquierda'=>$maxsupizquierda,
                                                        ':id_pacientebucal'=>$id_usuario
                                
                                                    ));
                                                }
                                            $msmaxiiz;
                                                foreach($msmaxiiz as $maxinfizquierda) {
                                                    $sql_s = $conexionCancer->prepare("INSERT into ubicaderemazinfizquierda(descripcionubicainfizquierda,id_pacientebucal) 
                                    
                                                    values(:descripcionubicainfizquierda,:id_pacientebucal)");
                                
                                                    $sql_s->execute(array(
                                                        ':descripcionubicainfizquierda'=>$maxinfizquierda,
                                                        ':id_pacientebucal'=>$id_usuario
                                
                                                    ));
                                                }
                                    $sql = $conexionCancer->prepare("INSERT into atencionclinicabucal(id_atencionclinicabucal,id_pacientebucal,fechaprimeratencionbucal,estadoclinicobucal,etapaclinicabucal,tamaniotumoralbucal,compromisolinfaticobucal,metastasisbucal,calidadvidaecog)
                                        values(:id_atencionclinicabucal,:id_pacientebucal,:fechaprimeratencionbucal,:estadoclinicobucal,:etapaclinicabucal,:tamaniotumoralbucal,:compromisolinfaticobucal,:metastasisbucal,:calidadvidaecog)");
                                            $sql->execute(array(
                                                ':id_atencionclinicabucal'=>uniqid('hraei'),
                                                ':id_pacientebucal'=>$id_usuario,
                                                ':fechaprimeratencionbucal'=>$fechaatencioninicial,
                                                ':estadoclinicobucal'=>$estadioclinico,
                                                ':etapaclinicabucal'=>$etapaclinica,
                                                ':tamaniotumoralbucal'=>$tamaniotumoral,
                                                ':compromisolinfaticobucal'=>$compromisolinfatico,
                                                ':metastasisbucal'=>$metastasisbucal,
                                                ':calidadvidaecog'=>$calidadvidaecogbucal

                                            ));
                                            $mssitiometastasis;
                                                foreach($mssitiometastasis as $metastasissitio) {
                                                    $sql_s = $conexionCancer->prepare("INSERT into sitiometastasisbucal(descripcionmetastasisbucal,id_pacientebucal) 
                                    
                                                    values(:descripcionmetastasisbucal,:id_pacientebucal)");
                                
                                                    $sql_s->execute(array(
                                                        ':descripcionmetastasisbucal'=>$metastasissitio,
                                                        ':id_pacientebucal'=>$id_usuario
                                
                                                    ));
                                                }
                                    $sql = $conexionCancer->prepare("INSERT into histopatologiacancerbucal(id_hitopatologiabucal,id_pacientebucal,dxhistopatologicobucal,fechareportebucal,tipobucal,malignobucal)
                                        values(:id_hitopatologiabucal,:id_pacientebucal,:dxhistopatologicobucal,:fechareportebucal,:tipobucal,:malignobucal)");
                                            $sql->execute(array(
                                                ':id_hitopatologiabucal'=>uniqid('hraei'),
                                                ':id_pacientebucal'=>$id_usuario,
                                                ':dxhistopatologicobucal'=>$dxhistopatologico,
                                                ':fechareportebucal'=>$fechareporte,
                                                ':tipobucal'=>$tipohisto,
                                                ':malignobucal'=>$maligno
                                            ));
                                    $sql = $conexionCancer->prepare("INSERT into inmunohistoquimicabucal(id_inumobucal,realizoinmunobucal,descripcioninmunobucal,id_pacientebucal)
                                        values(:id_inumobucal,:realizoinmunobucal,:descripcioninmunobucal,:id_pacientebucal)");
                                            $sql->execute(array(
                                                ':id_inumobucal'=>uniqid('hraei'),
                                                ':realizoinmunobucal'=>$pdl,
                                                ':descripcioninmunobucal'=>$descripcionpdl,
                                                ':id_pacientebucal'=>$id_usuario
                                            ));
                                    $sql = $conexionCancer->prepare("INSERT into tratamientobucal(id_tratamientobucal,id_pacientebucal,quimioterapiabucal,quirurgicobucal,tipocirugiabucal,maxilectomiadeinfraestructura,lugardrmc,tipodrmc,nivelcervical,reconstruccionbucal,radioterapiabucal,fecharadioterapiabucal,momentortradiobucal,dosisradiobucal,
                                    fraccionesradiobucal,numfraccionesradiobucal,tecnicaradiobucal,dosismaxcavidadoral,dosispromcavidadoral,dosismaxcocleas,dosispromediococlelas,dosismaxcristalinos,dosispromediocristalinos,dosismaxesofago,dosispromedioesofago,
                                    dosismaxlabios,dosispromediolabios,dosismaxlaringe,dosispromediolaringe,dosismaxmandibula,dosispromediomandibula,dosismaxmedula,dosispromediomedula,dosismaxnerviooptico,dosispromedionerviooptico,dosismaxojos,dosispromedioojos,
                                    dosismaxpfp,dosispromediopfp,dosismaxparotidas,dosispromedioparotidas,dosismaxsubli,dosispromediosubli,dosismaxtallo,dosispromediotallo,dosismaxtiroides,dosispromediotiroides)
                                            values(:id_tratamientobucal,:id_pacientebucal,:quimioterapiabucal,:quirurgicobucal,:tipocirugiabucal,:maxilectomiadeinfraestructura,:lugardrmc,:tipodrmc,:nivelcervical,:reconstruccionbucal,:radioterapiabucal,:fecharadioterapiabucal,:momentortradiobucal,:dosisradiobucal,
                                    :fraccionesradiobucal,:numfraccionesradiobucal,:tecnicaradiobucal,:dosismaxcavidadoral,:dosispromcavidadoral,:dosismaxcocleas,:dosispromediococlelas,:dosismaxcristalinos,:dosispromediocristalinos,:dosismaxesofago,:dosispromedioesofago,
                                    :dosismaxlabios,:dosispromediolabios,:dosismaxlaringe,:dosispromediolaringe,:dosismaxmandibula,:dosispromediomandibula,:dosismaxmedula,:dosispromediomedula,:dosismaxnerviooptico,:dosispromedionerviooptico,:dosismaxojos,:dosispromedioojos,
                                    :dosismaxpfp,:dosispromediopfp,:dosismaxparotidas,:dosispromedioparotidas,:dosismaxsubli,:dosispromediosubli,:dosismaxtallo,:dosispromediotallo,:dosismaxtiroides,:dosispromediotiroides)");
                                            $sql->execute(array(
                                                ':id_tratamientobucal'=>uniqid('hraei'),
                                                ':id_pacientebucal'=>$id_usuario,
                                                ':quimioterapiabucal'=>$quimioterapia,
                                                ':quirurgicobucal'=>$quirurgico,
                                                ':tipocirugiabucal'=>$tipoquirurgico,
                                                ':maxilectomiadeinfraestructura'=>$maxinfraestructu,
                                                ':lugardrmc'=>$lugardrmc,
                                                ':tipodrmc'=>$tipodrmc,
                                                ':nivelcervical'=>$nivelcervical,
                                                ':reconstruccionbucal'=>$reconstruccion,
                                                ':radioterapiabucal'=>$radio,
                                                ':fecharadioterapiabucal'=>$fecharadio,
                                                ':momentortradiobucal'=>$momentort,
                                                ':dosisradiobucal'=>$dosis,
                                                ':fraccionesradiobucal'=>$fracciones,
                                                ':numfraccionesradiobucal'=>$numfracciones,
                                                ':tecnicaradiobucal'=>$tecnica,
                                                ':dosismaxcavidadoral'=>$cavidadoral1,
                                                ':dosispromcavidadoral'=>$cavidadoral2,
                                                ':dosismaxcocleas'=>$cocleas1,
                                                ':dosispromediococlelas'=>$cocleas2,
                                                ':dosismaxcristalinos'=>$cristalinos1,
                                                ':dosispromediocristalinos'=>$cristalinos2,
                                                ':dosismaxesofago'=>$esofago1,
                                                ':dosispromedioesofago'=>$esofago2,
                                                ':dosismaxlabios'=>$labios1,
                                                ':dosispromediolabios'=>$labios2,
                                                ':dosismaxlaringe'=>$laringe1,
                                                ':dosispromediolaringe'=>$laringe2,
                                                ':dosismaxmandibula'=>$mandibula1,
                                                ':dosispromediomandibula'=>$mandibula2,
                                                ':dosismaxmedula'=>$medula1,
                                                ':dosispromediomedula'=>$medula2,
                                                ':dosismaxnerviooptico'=>$nerviooptico1,
                                                ':dosispromedionerviooptico'=>$nerviooptico2,
                                                ':dosismaxojos'=>$ojos1,
                                                ':dosispromedioojos'=>$ojos2,
                                                ':dosismaxpfp'=>$pfp1,
                                                ':dosispromediopfp'=>$pfp2,
                                                ':dosismaxparotidas'=>$Parotidas1,
                                                ':dosispromedioparotidas'=>$Parotidas2,
                                                ':dosismaxsubli'=>$Sublinguales1,
                                                ':dosispromediosubli'=>$Sublinguales2,
                                                ':dosismaxtallo'=>$Tallo1,
                                                ':dosispromediotallo'=>$Tallo2,
                                                ':dosismaxtiroides'=>$Tiroides1,
                                                ':dosispromediotiroides'=>$Tiroides2
                                            ));
                                            $msquimio;
                                                foreach($msquimio as $quimiomult) {
                                                    $sql_s = $conexionCancer->prepare("INSERT into qtbucal(descripcionqtbucal,id_pacientebucal) 
                                    
                                                    values(:descripcionqtbucal,:id_pacientebucal)");
                                
                                                    $sql_s->execute(array(
                                                        ':descripcionqtbucal'=>$quimiomult,
                                                        ':id_pacientebucal'=>$id_usuario
                                
                                                    ));
                                                }
                                            $msoarsdosis;
                                                foreach($msoarsdosis as $dosisoars) {
                                                    $sql_s = $conexionCancer->prepare("INSERT into oarsdosis(descripcionoarsbucal,id_pacientebucal) 
                                    
                                                    values(:descripcionoarsbucal,:id_pacientebucal)");
                                
                                                    $sql_s->execute(array(
                                                        ':descripcionoarsbucal'=>$dosisoars,
                                                        ':id_pacientebucal'=>$id_usuario
                                
                                                    ));
                                                }
                                            $tiporeconstruccion;
                                                foreach($tiporeconstruccion as $tipodereconstruccion) {
                                                    $sql_s = $conexionCancer->prepare("INSERT into tipodereconstruccionbucal(descripccionreconstruccionbucal,id_pacientebucal) 
                                    
                                                    values(:descripccionreconstruccionbucal,:id_pacientebucal)");
                                
                                                    $sql_s->execute(array(
                                                        ':descripccionreconstruccionbucal'=>$tipodereconstruccion,
                                                        ':id_pacientebucal'=>$id_usuario
                                
                                                    ));
                                                }
                                            $mscomplicacionesrt;
                                                foreach($mscomplicacionesrt as $complicacionesrt) {
                                                    $sql_s = $conexionCancer->prepare("INSERT into complicacionesrtbucal(descripcionrtbucal,id_pacientebucal) 
                                    
                                                    values(:descripcionrtbucal,:id_pacientebucal)");
                                
                                                    $sql_s->execute(array(
                                                        ':descripcionrtbucal'=>$complicacionesrt,
                                                        ':id_pacientebucal'=>$id_usuario
                                
                                                    ));
                                                }
                                            
                                    $sql = $conexionCancer->prepare("INSERT into casoexitosobucal(id_casoexitosobucal,id_pacientebucal,exitosobucal,respiuestatratamientobucal)
                                        values(:id_casoexitosobucal,:id_pacientebucal,:exitosobucal,:respiuestatratamientobucal)");
                                            $sql->execute(array(
                                                ':id_casoexitosobucal'=>uniqid('hraei'),
                                                ':id_pacientebucal'=>$id_usuario,
                                                ':exitosobucal'=>$casoexitoso,
                                                ':respiuestatratamientobucal'=>$respuestatratamiento
                                            ));
                                    $sql = $conexionCancer->prepare("INSERT into defuncionbucal(id_defuncionbucal,id_pacientebucal,defuncionbucal,fechadefuncionbucal,causadefuncionbucal)
                                        values(:id_defuncionbucal,:id_pacientebucal,:defuncionbucal,:fechadefuncionbucal,:causadefuncionbucal)");
                                            $sql->execute(array(
                                                ':id_defuncionbucal'=>uniqid('hraei'),
                                                ':id_pacientebucal'=>$id_usuario,
                                                ':defuncionbucal'=>$defuncion,
                                                ':fechadefuncionbucal'=>$fechadeladefuncion,
                                                ':causadefuncionbucal'=>$causadefuncion
                                            ));
                                            $validatransac = $conexionCancer->commit();

                            if($validatransac != false) {
                                echo "<script>alertify.success('Datos registrados');
                </script>";
                }
            }catch(Exception $e) {
                $conexionCancer->rollBack();
                echo $e;
            }
    }
?>