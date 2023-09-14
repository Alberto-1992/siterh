<?php
echo "Estamos creando algo nuevo, esperalo";

?>
<br>
<input type="submit" class="btn btn-warning" value="Regresar" onclick="back();">
<script>
    function back() {
        window.history.back();
    }
</script>