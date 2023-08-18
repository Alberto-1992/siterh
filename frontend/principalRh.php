<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <link href="css/estilosMenuNew.css?=1" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <!--<script defer src="https://app.embed.im/snow.js"></script>-->
    <title>Plataforma HRAEI</title>
</head>

<body style="background-color: #EBECED;">

<style>
        a {
            text-decoration: none;
        }
        
</style>
<header class="header"> 
        <?php
                                $path = "imagenesPerfiles/".$identificador;
                                if (file_exists($path)) {
                                    $directorio = opendir($path);
                                    while ($archivo = readdir($directorio)) {
                                        if (!is_dir($archivo)) {
                                            echo "<img src='imagenesPerfiles/$identificador/$archivo' style='width: 50px; height: 47px; border-radius: 30px 30px 30px 30px; cursor: pointer; float: left; margin-left: -11px; '>";
                                        }
                                    }
                                }
                                clearstatcache();
                                ?>
                                <span id="cabecera">R.H</span>
                            
</header>
<script>
            
            $.ajax({
                //url: 'graficos/graficosCapturas.php'
            })

            .done(function(resultado) {
                //$("#tabla_resultadografico").html(resultado);
            })
            
        </script>
        
<div class="gallery">
        <?php
        if (isset($_SESSION['usuarioAdminRh'])) {
                require 'menu/menuPrincipal.php';
        ?>
                
                <script>
                
                    function evaluacion() {
                        window.location.href='../rh/principal';
                    }
                    function reclutamiento() {
                        window.location.href='reclutamiento';
                    }
                    function compatibilidad() {
                        window.location.href='../compatibilidad/principal';
                    }
                
                    function estructura() {
                        window.location.href='../rh/admin';
                    }
                    function contratacion() {
                        window.location.href='../contratacion/principal';
                    }
                    function relacioneslaborales() {
                        window.location.href='../laborales/principal';
                    }
                    function graficosCapturas() {
                        window.open('graficosEvaluacion');
                    }
                
                    
                </script>
                
                <article class="card" id="evaluacion" onclick="evaluacion();">
                    <a href="../rh/principal">
                        <hr id="hr6">
                        <p>Evaluación del Desempeño</p>
                        <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                    </a>
                </article>
                <article class="card" id="graficosevaluacion" onclick="graficosCapturas();">
                    <a href="graficosEvaluacion">
                        <hr id="hr6">
                        <p>Graficos de evaluación</p>
                        <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                    </a>
                </article>
                <article class="card" id="estructura-organizacional" onclick="estructura();">
                    <a href="../rh/admin">
                        <hr id="hr6">
                        <p>Módulo Usuarios</p>
                        <!--<a id="linkestructura" href="../rh/admin" class="btn btn-secondary">Estructura</a>-->
                    </a>
                </article>
                <article class="card" id="reclutamiento" onclick="reclutamiento();">
                    <a href="reclutamiento">
                        <hr id="hr6">
                        <p>Reclutamiento y Selección</p>
                        <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                    </a>
                </article>

                <article class="card" id="compatibilidad" onclick="compatibilidad();">
                    <a href="../compatibilidad/principal">
                        <hr id="hr6">
                        <p>Compatibilidad Laboral</p>
                        <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                    </a>
                </article>
                <article class="card" id="contratacion" onclick="contratacion();">
                    <a href="../contratacion/principal">
                        <hr id="hr6">
                        <p>Contratación</p>
                        <!--<a id="link" href="../compatibilidad/principal" class="btn btn-success">Compatibilidad</a>-->
                    </a>
                </article>
                <article class="card" id="relacioneslaborales" onclick="relacioneslaborales();">
                    <a href="../relacioneslaborales/principal">
                        <hr id="hr6">
                        <p>Relaciones laborales</p>
                        <!--<a id="linkestructura" href="../rh/admin" class="btn btn-secondary">Estructura</a>-->
                    </a>
                </article>
                <article class="card" id="academicos" onclick="datosacademicos();">
                <a href="mantenimiento">
                    <hr id="hr6">
                    <p>Datos academicos</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <article class="card" id="capacitacion" onclick="capacitacion();">
                <a href="mantenimiento">
                    <hr id="hr6">
                    <p>Capacitación y cursos</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <?php
            
    } else if (isset($_SESSION['usuarioDatos'])) {
            require 'menu/menuPersonal.php';

            ?>
            <script>
                function evaluacion() {
                    window.location.href='../rh/principal';
                }
                function misDatos() {
                    window.location.href='mantenimiento';
                }
            </script>
            
            <article class="card" id="datosTrabajador" onclick="misDatos();">
                <a href="mantenimiento">
                    <hr id="hr6">
                    <p>Mis datos personales</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <article class="card" id="academicos" onclick="datosacademicos();">
                <a href="mantenimiento">
                    <hr id="hr6">
                    <p>Datos academicos</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <article class="card" id="capacitacion" onclick="capacitacion();">
                <a href="mantenimiento">
                    <hr id="hr6">
                    <p>Capacitación y cursos</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <article class="card" id="evaluacion" onclick="evaluacion();">
                <a href="../rh/principal">
                    <hr id="hr6">
                    <p>Evaluación del Desempeño</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <?php
            if (isset($_SESSION['usuarioDatos'])) {
                $usernameSesion = $_SESSION['usuarioDatos'];
                require 'conexionRh.php';
                $statement = $conexionRh->prepare("SELECT correo, rol, password FROM usuarioslogeo WHERE correo= :correo AND rol = :rol");
                $statement->execute(array(
                    ':correo' => $usernameSesion,
                    ':rol'=>7
                ));
                $rw = $statement->fetch();
                $admin = $rw['correo'];
                if ($admin == 'msandoval@hraei.gob.mx' or $admin == 'isabella291216@gmail.com' or $admin == 'bramirez699@gmail.com') {
            ?>
                    <article class="card" id="estructura-organizacional" onclick="estructura();">
                        <a href="../rh/admin">
                            <hr id="hr6">
                            <p>Modulo usuarios</p>

                            <a id="linkestructura" href="../rh/admin" class="btn btn-secondary">Estructura</a>
                        </a>
                    </article>
                    
            <?php
                }else if($admin == 'daniel.hernanriv@gmail.com' or $admin == 'maryonec@gmail.com' or $admin == 'alexvpuebla@gmail.com'){
                ?>
                <script>
                    function reclutamiento() {
                        window.location.href='reclutamiento';
                    }
                </script>
                <article class="card" id="reclutamiento" onclick="reclutamiento();">
                    <a href="reclutamiento">
                        <hr id="hr6">
                        <p>Reclutamiento y Selección</p>
                        <!--<a id="link" href="../bolsa/principal" class="btn btn-success">Reclutamiento</a>-->
                    </a>
                </article>
                <?php
            }
        }

        } else if (isset($_SESSION['usuarioJefe'])) {
            require 'menu/menuPersonal.php';
        ?>
            <script>
                function evaluacion() {
                    window.location.href='../rh/principal';
                    }
                function misDatos() {
                    window.location.href='mantenimiento';
                    }
                function estructura() {
                        window.location.href='../rh/admin';
                    }
            </script>
            <article class="card" id="evaluacion" onclick="evaluacion();">

                <hr id="hr6">
                <p>Evaluación del Desempeño</p>
                <!--<a id="link" href="../rh/principal" class="btn btn-secondary">Evaluar</a>-->
            </article>
            <article class="card" id="datosTrabajador" onclick="misDatos();">
                <a href="mantenimiento">
                    <hr id="hr6">
                    <p>Mis datos personales</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <article class="card" id="academicos" onclick="datosacademicos();">
                <a href="mantenimiento">
                    <hr id="hr6">
                    <p>Datos academicos</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <article class="card" id="capacitacion" onclick="capacitacion();">
                <a href="mantenimiento">
                    <hr id="hr6">
                    <p>Capacitación y cursos</p>
                    <!--<a id="link" href="../rh/principal" class="btn btn-success">Evaluación</a>-->
                </a>
            </article>
            <?php
            if (isset($_SESSION['usuarioJefe'])) {
                
                $usernameSesion = $_SESSION['usuarioJefe'];
                require 'conexionRh.php';
                $statement = $conexionRh->prepare("SELECT correo, rol FROM usuarioslogeojefes WHERE correo= :correo AND rol = :rol");
                $statement->execute(array(
                    ':correo' => $usernameSesion,
                    ':rol'=>4
                ));
                $rw = $statement->fetch();
                $admin = $rw['correo'];
                if ($admin == 'bramirez699@gmail.com') {
            ?>
                    <article class="card" id="estructura-organizacional" onclick="estructura();">
                    <a href="../rh/admin">
                        <hr id="hr6">
                        <p>Módulo Usuarios</p>
                        <!--<a id="linkestructura" href="../rh/admin" class="btn btn-secondary">Estructura</a>-->
                    </a>
                </article>
                <?php

                }else if($admin == 'brendacontreras@hotmail.com'){
                    ?>
                <article class="card" id="reclutamiento" onclick="reclutamiento();">
                    <a href="reclutamiento">
                        <hr id="hr6">
                        <p>Reclutamiento y Selección</p>
                        
                    </a>
                </article>
            <?php
                }
            }
        }
            ?>

        </div>
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
        <?php
        if (isset($_SESSION['usuarioAdminRh'])) { ?>
<div class="graficos">
    <div class="graff" id="grafico_barras">
    <style>
    #chartdiv {
        width: 100%;
        height: 16rem;
    }
    .titulo {
        text-align: center;
    }
</style>
<div class="titulo" >
    <h2 style="font-size: 13px;">Estado de capturas de Metas 2023</h2>
</div>
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
    am5.ready(function() {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");

        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "none",
            wheelY: "none"
        }));

        // Add cursor
        // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);

        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xRenderer = am5xy.AxisRendererX.new(root, {
            minGridDistance: 30
        });

        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            maxDeviation: 0,
            categoryField: "name",
            renderer: xRenderer,
            tooltip: am5.Tooltip.new(root, {})
        }));

        xRenderer.grid.template.set("visible", false);

        var yRenderer = am5xy.AxisRendererY.new(root, {});
        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            maxDeviation: 0,
            min: 0,
            extraMax: 0.1,
            renderer: yRenderer
        }));

        yRenderer.grid.template.setAll({
            strokeDasharray: [2, 2]
        });

        // Create series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: "Series 1",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value",
            sequencedInterpolation: true,
            categoryXField: "name",
            tooltip: am5.Tooltip.new(root, {
                dy: -25,
                labelText: "{valueY}"
            })
        }));


        series.columns.template.setAll({
            cornerRadiusTL: 5,
            cornerRadiusTR: 5,
            strokeOpacity: 0
        });

        series.columns.template.adapters.add("fill", (fill, target) => {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        series.columns.template.adapters.add("stroke", (stroke, target) => {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
        });
        var datos = [

            <?php
            require 'conexionRh.php';

            $sql1 = $conexionGrafico->query("SELECT count(*) as total1 from personaloperativo2023 where vistobueno = 1 and eliminado = 0");
            $row1 = mysqli_fetch_assoc($sql1);
            $sql2 = $conexionGrafico->query("SELECT count(*) as total2 from personaloperativo2023 where vistobueno = 2 and eliminado = 0");
            $row2 = mysqli_fetch_assoc($sql2);
            $sql3 = $conexionGrafico->query("SELECT count(*) as total3 from personaloperativo2023 where vistobueno = 3 and eliminado = 0");
            $row3 = mysqli_fetch_assoc($sql3);
            $sql4 = $conexionGrafico->query("SELECT count(*) as total4 from personaloperativo2023 where vistobueno = 4 and eliminado = 0");
            $row4 = mysqli_fetch_assoc($sql4);
                $total = $row4['total4'] + $row3['total3'] + $row2['total2'] + $row1['total1'];
            ?>
        ];
        // Set data
        var data = [{
                name: "Total general",
                value: <?php echo $total ?>
            },
            {
                name: "Sin captura",
                value: <?php echo $row4['total4'] ?>
            },
            {
                name: "Autorizado",
                value: <?php echo $row1['total1'] ?>
            },
            {
                name: "Pendiente. VoBo",
                value: <?php echo $row2['total2'] ?>
            },
            
            {
                name: "Rechazadas",
                value: <?php echo $row3['total3'] ?>
            }
            
        ];

        series.bullets.push(function() {
            return am5.Bullet.new(root, {
                locationY: 1,
                sprite: am5.Picture.new(root, {
                    templateField: "bulletSettings",
                    width: 50,
                    height: 50,
                    centerX: am5.p50,
                    centerY: am5.p50,
                    shadowColor: am5.color(0x000000),
                    shadowBlur: 4,
                    shadowOffsetX: 4,
                    shadowOffsetY: 4,
                    shadowOpacity: 0.6
                })
            });
        });

        xAxis.data.setAll(data);
        series.data.setAll(data);

        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear(1000);
        chart.appear(1000, 100);

    }); // end am5.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>
    </div>
            <div class="graff" id="grafico_pastel">
            <style>
#chartdiv2 {
  width: 100%;
  height: 16rem;
  font-size: 11px;
}
</style>
<div class="titulo" >
    <h2 style="font-size: 13px;">Porcentaje participación de metas</h2>
</div>
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv2");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart = root.container.children.push(am5percent.PieChart.new(root, {
  layout: root.verticalLayout
}));


// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
var series = chart.series.push(am5percent.PieSeries.new(root, {
  valueField: "value",
  categoryField: "category"
}));

var datos = [

<?php
require 'conexionRh.php';

$sql1 = $conexionGrafico->query("SELECT count(*) as total1 from personaloperativo2023 where vistobueno = 1 and eliminado = 0");
$row1 = mysqli_fetch_assoc($sql1);
$sql2 = $conexionGrafico->query("SELECT count(*) as total2 from personaloperativo2023 where vistobueno = 2 and eliminado = 0");
$row2 = mysqli_fetch_assoc($sql2);
$sql3 = $conexionGrafico->query("SELECT count(*) as total3 from personaloperativo2023 where vistobueno = 3 and eliminado = 0");
$row3 = mysqli_fetch_assoc($sql3);
$sql4 = $conexionGrafico->query("SELECT count(*) as total4 from personaloperativo2023 where vistobueno = 4 and eliminado = 0");
$row4 = mysqli_fetch_assoc($sql4);
    
?>
];
// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series.data.setAll([
    { value: <?php echo $row4['total4'] ?>, category: "Sin captura" },
    { value: <?php echo $row1['total1'] ?>, category: "Autorizado" },
    { value: <?php echo $row2['total2'] ?>, category: "Pendiente de VoBo" },
    { value: <?php echo $row3['total3'] ?>, category: "Rechazadas" },

]);


// Create legend
// https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
var legend = chart.children.push(am5.Legend.new(root, {
  centerX: am5.percent(50),
  x: am5.percent(50),
  marginTop: 15,
  marginBottom: 15
}));

legend.data.setAll(series.dataItems);


// Play initial series animation
// https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
series.appear(1000, 100);

}); // end am5.ready()
</script>

<!-- HTML -->
<div id="chartdiv2"></div>
            </div>
            <div class="graff" id="grafico_lineal">
            <style>
#chartdiv3 {
  width: 100%;
  height: 16rem;
}
</style>
<div class="titulo" >
    <h2 style="font-size: 13px;">Porcentaje de participación de competencias</h2>
</div>
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv3");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart = root.container.children.push(
  am5percent.PieChart.new(root, {
    startAngle: 160, endAngle: 380
  })
);

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series

var series0 = chart.series.push(
  am5percent.PieSeries.new(root, {
    valueField: "litres",
    categoryField: "country",
    startAngle: 160,
    endAngle: 380,
    radius: am5.percent(70),
    innerRadius: am5.percent(65)
  })
);

var colorSet = am5.ColorSet.new(root, {
  colors: [series0.get("colors").getIndex(0)],
  passOptions: {
    lightness: -0.05,
    hue: 0
  }
});

series0.set("colors", colorSet);

series0.ticks.template.set("forceHidden", true);
series0.labels.template.set("forceHidden", true);

var series1 = chart.series.push(
  am5percent.PieSeries.new(root, {
    startAngle: 160,
    endAngle: 380,
    valueField: "bottles",
    innerRadius: am5.percent(80),
    categoryField: "country"
  })
);

series1.ticks.template.set("forceHidden", true);
series1.labels.template.set("forceHidden", true);
var datos = [

<?php
require 'conexionRh.php';

$sql1 = $conexionGrafico->query("SELECT count(*) as total1 from personaloperativo2022 where vistobueno = 1 and eliminado = 0");
$row1 = mysqli_fetch_assoc($sql1);
$sql2 = $conexionGrafico->query("SELECT count(*) as total2 from personaloperativo2022 where vistobueno = 2 and eliminado = 0");
$row2 = mysqli_fetch_assoc($sql2);
$sql3 = $conexionGrafico->query("SELECT count(*) as total3 from personaloperativo2022 where vistobueno = 3 and eliminado = 0");
$row3 = mysqli_fetch_assoc($sql3);
$sql4 = $conexionGrafico->query("SELECT count(*) as total4 from personaloperativo2022 where vistobueno = 4 and eliminado = 0");
$row4 = mysqli_fetch_assoc($sql4);
$total = $row4['total4'] + $row3['total3'] + $row2['total2'] + $row1['total1'];

$sql5 = $conexionGrafico->query("SELECT count(*) as total5 from personaloperativo2022 where estadocompetencias = 1 and eliminado = 0");
$row5 = mysqli_fetch_assoc($sql5);

$sql6 = $conexionGrafico->query("SELECT count(*) as total6 from personaloperativo2022 where estadocompetencias = 0 and eliminado = 0");
$row6 = mysqli_fetch_assoc($sql6);

$sql7 = $conexionGrafico->query("SELECT count(*) as total7 from personaloperativo2022 where estadocompetencias = 1 and eliminado = 0");
$row7 = mysqli_fetch_assoc($sql7);

$sql8 = $conexionGrafico->query("SELECT count(*) as total8 from personaloperativo2022 where estadocompetencias = 0 and eliminado = 0");
$row8 = mysqli_fetch_assoc($sql8);
?>
];
var label = chart.seriesContainer.children.push(
  am5.Label.new(root, {
    textAlign: "center",
    centerY: am5.p100,
    centerX: am5.p50,
    text: "[fontSize:18px]total[/]:\n[bold fontSize:30px]<?php echo $total ?>[/]"
  })
);

var data = [
  {
    country: "Evaluaron",
    litres: <?php echo $row5['total5'] ?>,
    bottles: <?php echo $row7['total7'] ?>
  },
  {
    country: "No evaluaron",
    litres: <?php echo $row6['total6'] ?>,
    bottles: <?php echo $row8['total8'] ?>
  }
];

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data

series1.data.setAll(data);

}); // end am5.ready()
</script>

<!-- HTML -->
<div id="chartdiv3"></div>
            </div>
</div>
<?php
//require 'graficos/graficosCapturas.php';
} ?>
    </body>
    <?php
require 'modals/cargarImagenperfil.php';
    ?>
    <script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'>
    </script>
</html>