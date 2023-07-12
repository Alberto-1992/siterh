
// Habilita UNIDAD DE REFERENCIA
$(document).ready(function() {
    $('#referenciado').change(function(e) {
        if ($(this).val() === "Si") {
            $('#medioreferencia').prop("hidden", false);
            $('#idreferencia').prop("hidden", false);
            $('#idestadoResidencia').prop("hidden", true);
            $('#idmunicipio').prop("hidden", true);
            $('#idlocalidad').prop("hidden", true);
            } else if ($(this).val() === "No") {
            $('#medioreferencia').prop("hidden", true);
            $('#idreferencia').prop("hidden", true);
            $('#idestadoResidencia').prop("hidden", false);
            $('#idmunicipio').prop("hidden", false);
            $('#idlocalidad').prop("hidden", false);
            }
    })
});

$(function() {
    $('#medioreferencia').prop("hidden", true);
    $('#idreferencia').prop("hidden", true);
    $('#idestadoResidencia').prop("hidden", true);
    $('#idmunicipio').prop("hidden", true);
    $('#idlocalidad').prop("hidden", true);
})
