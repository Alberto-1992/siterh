<div id="imagenperfil" class="modal fade in" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #354AFA;">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <div class="form-title" style="text-align:center; background-color: white; color:black; margin-top:5px; font-size: 17px;">
                    <strong>Sube tu foto</strong>
                </div>
                <!--FIN de Cabecera de Seguimiento Paciente-->
                <form action="aplicacion/cargarImagen" method="POST" enctype="multipart/form-data">
                <?php
            if (isset($_SESSION['usuarioAdminRh'])) {
                $usernameSesion = $_SESSION['usuarioAdminRh'];
                require 'conexionRh.php';
            $sql = $conexionRh->prepare("SELECT id_empleado from personaloperativo2023 where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                if($row != false){
                $identificador = $row['id_empleado']; 
                }else{
                    $usernameSesion = $_SESSION['usuarioAdminRh'];
                    require 'conexionRh.php';
                $sql = $conexionRh->prepare("SELECT id_jefe from jefes2022 where correo = :correo");
                    $sql->execute(array(
                        ':correo'=>$usernameSesion
                    ));
                    $row = $sql->fetch();
                    $identificador = $row['id_jefe']; 
                }
            }else if(isset($_SESSION['usuarioDatos'])) {
                $usernameSesion = $_SESSION['usuarioDatos']; 
            require 'conexionRh.php';
            $sql = $conexionRh->prepare("SELECT id_empleado from personaloperativo2023 where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['id_empleado'];
            }else if(isset($_SESSION['usuarioJefe'])) {
                $usernameSesion = $_SESSION['usuarioJefe'];
                require 'conexionRh.php';
            $sql = $conexionRh->prepare("SELECT id_jefe from jefes2022 where correo = :correo");
                $sql->execute(array(
                    ':correo'=>$usernameSesion
                ));
                $row = $sql->fetch();
                $identificador = $row['id_jefe'];
            }
            
            ?>
                        <br><div class="col-md-12">
                            <input type="hidden" value="<?php echo $identificador ?>" name="identificador">
                            <input type="file" class="form-control" id="imagenperfil" name="imagenperfil" accept="image/jpg,image/jpeg,image/png" required>
                        </div><br>
                        <div class="col-md-6" style="margin-left: auto; margin-right: auto;">
                        <input type="submit" name="subirimagen" class="form-control" value="Cargar imagen">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>