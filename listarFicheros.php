<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar ficheros</title>
</head>
 
<body>
 
    <ul>
 
        <?php
 
        $directorio = "2022";
        $ficheros = scandir($directorio);
 
        foreach ($ficheros as $key => $fichero) {
            if ($fichero != "." && $fichero != "..") {
 
                $rutaCompleta = $directorio . '/' . $fichero;
 
                if (is_file($rutaCompleta)) {
                ?>
                    <li>
                        <img width="10px" height="10px" src="img/icono.png">
                        <?php echo $fichero; ?>
                    </li>
                <?php
                } else {
                ?>
                    <li>
                        <img width="10px" height="10px" src="img/icono.png">
                        <?php echo $fichero; ?>
                    </li>
                <?php
                }
            }
        }
 
 
        ?>
    </ul>
 
</body>
 
</html>