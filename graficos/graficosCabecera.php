<div class="graficos">
<div class="graff" id="grafico_barras">
    <style>
        #chartdiv {
            width: 100%;
            height: 16rem;
            font-size: 10px;
        }

        .titulo {
            text-align: center;
        }
    </style>
    <div class="titulo">
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
    <div class="titulo">
        <h2 style="font-size: 13px;">Porcentaje general de participación de metas 2023</h2>
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
            series.data.setAll([{
                    value: <?php echo $row4['total4'] ?>,
                    category: "Sin captura"
                },
                {
                    value: <?php echo $row1['total1'] ?>,
                    category: "Autorizado"
                },
                {
                    value: <?php echo $row2['total2'] ?>,
                    category: "Pendiente de VoBo"
                },
                {
                    value: <?php echo $row3['total3'] ?>,
                    category: "Rechazadas"
                },

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
    <!-- Styles -->
    <style>
        #chartdiv3 {
            width: 100%;
            height: 15rem;
            font-size: 10px;
        }
    </style>
    <div class="titulo">
        <h2 style="font-size: 13px;">Porcentaje de autorización de metas 2023</h2>
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
                    endAngle: 270
                })
            );

            // Create series
            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
            var series = chart.series.push(
                am5percent.PieSeries.new(root, {
                    valueField: "value",
                    categoryField: "category",
                    endAngle: 270
                })
            );

            series.states.create("hidden", {
                endAngle: -90
            });
            var datos = [

                <?php
                require 'conexionRh.php';

                $sqlDM2 = $conexionGrafico->query("SELECT count(*) as totalDM2 from personaloperativo2023 where descripcionestructura2 = 'DIRECCION MEDICA' and vistobueno = 1 and eliminado = 0");
                $rowDM2 = mysqli_fetch_assoc($sqlDM2);
                $sqlDAF2 = $conexionGrafico->query("SELECT count(*) as totalDAF2 from personaloperativo2023 where descripcionestructura2 = 'DIRECCION DE ADMINISTRACION Y FINANZAS' and vistobueno = 1 and eliminado = 0");
                $rowDAF2 = mysqli_fetch_assoc($sqlDAF2);
                $sqlDG2 = $conexionGrafico->query("SELECT count(*) as totalDG2 from personaloperativo2023 where descripcionestructura2 = 'DIRECCION GENERAL' and vistobueno = 1 and eliminado = 0");
                $rowDG2 = mysqli_fetch_assoc($sqlDG2);
                $sqlDO2 = $conexionGrafico->query("SELECT count(*) as totalDO2 from personaloperativo2023 where descripcionestructura2 = 'DIRECCION DE OPERACIONES' and vistobueno = 1 and eliminado = 0");
                $rowDO2 = mysqli_fetch_assoc($sqlDO2);
                $sqlDEP2 = $conexionGrafico->query("SELECT count(*) as totalDEP2 from personaloperativo2023 where descripcionestructura2 = 'DIRECCION DE PLANEACION, ENSEÑANZA E INVESTIGACION' and vistobueno = 1 and eliminado = 0");
                $rowDEP2 = mysqli_fetch_assoc($sqlDEP2);
                ?>
            ];
            // Set data
            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
            series.data.setAll([{
                category: "Dirección General",
                value: <?php echo $rowDG2['totalDG2'] ?>
            }, {
                category: "Dirección de Admon y finanzas",
                value: <?php echo $rowDAF2['totalDAF2'] ?>
            }, {
                category: "Dirección Medica",
                value: <?php echo $rowDM2['totalDM2'] ?>
            }, {
                category: "Dirección de operaciones",
                value: <?php echo $rowDO2['totalDO2'] ?>
            }, {
                category: "Dirección de enseñanza",
                value: <?php echo $rowDEP2['totalDEP2'] ?>
            }]);

            series.appear(1000, 100);

        }); // end am5.ready()
    </script>

    <!-- HTML -->
    <div id="chartdiv3"></div>

</div>
<div class="graff" id="grafico_barras">
<style>
#chartdiv4 {
width: 100%;
height: 16rem;
font-size: 12px;
}
</style>
<div class="titulo">
        <h2 style="font-size: 13px;">Sin captura de metas 2023</h2>
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
var root = am5.Root.new("chartdiv4");


var myTheme = am5.Theme.new(root);

myTheme.rule("Grid", ["base"]).setAll({
strokeOpacity: 0.1
});


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
am5themes_Animated.new(root),
myTheme
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(am5xy.XYChart.new(root, {
panX: false,
panY: false,
wheelX: "panY",
wheelY: "zoomY",
layout: root.verticalLayout
}));

// Add scrollbar
// https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
chart.set("scrollbarY", am5.Scrollbar.new(root, {
orientation: "vertical"
}));
var datos = [
<?php
                require 'conexionRh.php';

                $sqlDM2 = $conexionGrafico->query("SELECT count(*) as totalDM2 from personaloperativo2023 where descripcionestructura2 = 'DIRECCION MEDICA' and vistobueno = 4 and eliminado = 0");
                $rowDM2 = mysqli_fetch_assoc($sqlDM2);
                $sqlDAF2 = $conexionGrafico->query("SELECT count(*) as totalDAF2 from personaloperativo2023 where descripcionestructura2 = 'DIRECCION DE ADMINISTRACION Y FINANZAS' and vistobueno = 4 and eliminado = 0");
                $rowDAF2 = mysqli_fetch_assoc($sqlDAF2);
                $sqlDG2 = $conexionGrafico->query("SELECT count(*) as totalDG2 from personaloperativo2023 where descripcionestructura2 = 'DIRECCION GENERAL' and vistobueno = 4 and eliminado = 0");
                $rowDG2 = mysqli_fetch_assoc($sqlDG2);
                $sqlDO2 = $conexionGrafico->query("SELECT count(*) as totalDO2 from personaloperativo2023 where descripcionestructura2 = 'DIRECCION DE OPERACIONES' and vistobueno = 4 and eliminado = 0");
                $rowDO2 = mysqli_fetch_assoc($sqlDO2);
                $sqlDEP2 = $conexionGrafico->query("SELECT count(*) as totalDEP2 from personaloperativo2023 where descripcionestructura2 = 'DIRECCION DE PLANEACION, ENSEÑANZA E INVESTIGACION' and vistobueno = 4 and eliminado = 0");
                $rowDEP2 = mysqli_fetch_assoc($sqlDEP2);
                ?>
            ];
var data = [ {
"year": "Captura metas 2023",
"D.G": <?php echo $rowDG2['totalDG2'] ?>,
"D.M": <?php echo $rowDM2['totalDM2'] ?>,
"D.A.F": <?php echo $rowDAF2['totalDAF2'] ?>,
"D.O": <?php echo $rowDO2['totalDO2'] ?>,
"D.P.E.E": <?php echo $rowDEP2['totalDEP2'] ?>
}]


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var yRenderer = am5xy.AxisRendererY.new(root, {});
var yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, {
categoryField: "year",
renderer: yRenderer,
tooltip: am5.Tooltip.new(root, {})
}));

yRenderer.grid.template.setAll({
location: 1
})

yAxis.data.setAll(data);

var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
min: 0,
renderer: am5xy.AxisRendererX.new(root, {
strokeOpacity: 0.1
})
}));

// Add legend
// https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
var legend = chart.children.push(am5.Legend.new(root, {
centerX: am5.p50,
x: am5.p50
}));


// Add series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
function makeSeries(name, fieldName) {
var series = chart.series.push(am5xy.ColumnSeries.new(root, {
name: name,
stacked: true,
xAxis: xAxis,
yAxis: yAxis,
baseAxis: yAxis,
valueXField: fieldName,
categoryYField: "year"
}));

series.columns.template.setAll({
tooltipText: "{name}, {categoryY}: {valueX}",
tooltipY: am5.percent(90)
});
series.data.setAll(data);

// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear();

series.bullets.push(function() {
return am5.Bullet.new(root, {
sprite: am5.Label.new(root, {
text: "{valueX}",
fill: root.interfaceColors.get("alternativeText"),
centerY: am5.p50,
centerX: am5.p50,
populateText: true
})
});
});

legend.data.push(series);
}

makeSeries("D.G", "D.G");
makeSeries("D.M", "D.M");
makeSeries("D.A.F", "D.A.F");
makeSeries("D.O", "D.O");
makeSeries("D.P.E.E", "D.P.E.E");
// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
chart.appear(1000, 100);

}); // end am5.ready()
</script>

<!-- HTML -->
<div id="chartdiv4"></div>
</div>
<div class="graff" id="grafico_nuevo">
    <!-- Styles -->
<style>
#chartdiv5 {
width: 100%;
height: 16rem;
}
</style>
<div class="titulo">
        <h2 style="font-size: 13px;">Participación ultimos dos periodos metas</h2>
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
var root = am5.Root.new("chartdiv5");


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
wheelX: "panX",
wheelY: "zoomX",
layout: root.verticalLayout
}));


// Add legend
// https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
var legend = chart.children.push(
am5.Legend.new(root, {
centerX: am5.p50,
x: am5.p50
})
);
var datos = [

<?php
require 'conexionRh.php';


$sqlDGT = $conexionGrafico->query("SELECT count(*) as totalDG2 from personaloperativo2023 where descripcionestructura2 = 'DIRECCION GENERAL' and vistobueno != 4");
$rowDGT = mysqli_fetch_assoc($sqlDGT);
$sqlDM = $conexionGrafico->query("SELECT count(*) as totalDM from personaloperativo2023 where descripcionestructura2 = 'DIRECCION MEDICA' and vistobueno != 4");
$rowDM = mysqli_fetch_assoc($sqlDM);
$sqlDAF = $conexionGrafico->query("SELECT count(*) as totalDAF from personaloperativo2023 where descripcionestructura2 = 'DIRECCION DE ADMINISTRACION Y FINANZAS' and vistobueno != 4");
$rowDAF = mysqli_fetch_assoc($sqlDAF);
$sqlDEP = $conexionGrafico->query("SELECT count(*) as totalDEP from personaloperativo2023 where descripcionestructura2 = 'DIRECCION DE PLANEACION, ENSEÑANZA E INVESTIGACION' and vistobueno != 4");
$rowDEP = mysqli_fetch_assoc($sqlDEP);
$sqlDO = $conexionGrafico->query("SELECT count(*) as totalDO from personaloperativo2023 where descripcionestructura2 = 'DIRECCION DE OPERACIONES' and vistobueno != 4");
$rowDO = mysqli_fetch_assoc($sqlDO);

$sqlDGT2022 = $conexionGrafico->query("SELECT count(*) as totalDG2022 from personaloperativo2022 where descripcionestructura2 = 'DIRECCION GENERAL' and vistobueno != 4");
$rowDGT2022 = mysqli_fetch_assoc($sqlDGT2022);
$sqlDM2022 = $conexionGrafico->query("SELECT count(*) as totalDM2022 from personaloperativo2022 where descripcionestructura2 = 'DIRECCION MEDICA' and vistobueno != 4");
$rowDM2022 = mysqli_fetch_assoc($sqlDM2022);
$sqlDAF2022 = $conexionGrafico->query("SELECT count(*) as totalDAF2022 from personaloperativo2022 where descripcionestructura2 = 'DIRECCION DE ADMINISTRACION Y FINANZAS' and vistobueno != 4");
$rowDAF2022 = mysqli_fetch_assoc($sqlDAF2022);
$sqlDEP2022 = $conexionGrafico->query("SELECT count(*) as totalDEP2022 from personaloperativo2022 where descripcionestructura2 = 'DIRECCION DE PLANEACION, ENSEÑANZA E INVESTIGACION' and vistobueno != 4");
$rowDEP2022 = mysqli_fetch_assoc($sqlDEP2022);
$sqlDO2022 = $conexionGrafico->query("SELECT count(*) as totalDO2022 from personaloperativo2022 where descripcionestructura2 = 'DIRECCION DE OPERACIONES' and vistobueno != 4");
$rowDO2022 = mysqli_fetch_assoc($sqlDO2022);


?>
];
var data = [ {
"year": "2022",
"dg": 4.5,
"dm": 6.5,
"daf": 3.1,
"do": 1.1,
"dpe": 3.8
}, {
"year": "2023",
"dg": <?php echo $rowDGT['totalDG2'] ?>,
"dm": <?php echo $rowDM['totalDM'] ?>,
"daf": <?php echo $rowDAF['totalDAF'] ?>,
"do": <?php echo $rowDO['totalDO'] ?>,
"dpe": <?php echo $rowDEP['totalDEP'] ?>
}]


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(root, {
cellStartLocation: 0.1,
cellEndLocation: 0.9
})

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
categoryField: "year",
renderer: xRenderer,
tooltip: am5.Tooltip.new(root, {})
}));

xRenderer.grid.template.setAll({
location: 1
})

xAxis.data.setAll(data);

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
renderer: am5xy.AxisRendererY.new(root, {
strokeOpacity: 0.1
})
}));


// Add series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
function makeSeries(name, fieldName) {
var series = chart.series.push(am5xy.ColumnSeries.new(root, {
name: name,
xAxis: xAxis,
yAxis: yAxis,
valueYField: fieldName,
categoryXField: "year"
}));

series.columns.template.setAll({
tooltipText: "{name}, {categoryX}:{valueY}",
width: am5.percent(90),
tooltipY: 0,
strokeOpacity: 0
});

series.data.setAll(data);

// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear();

series.bullets.push(function() {
return am5.Bullet.new(root, {
locationY: 0,
sprite: am5.Label.new(root, {
text: "{valueY}",
fill: root.interfaceColors.get("alternativeText"),
centerY: 0,
centerX: am5.p50,
populateText: true
})
});
});

legend.data.push(series);
}

makeSeries("D.G", "dg");
makeSeries("D.M", "dm");
makeSeries("D.A.F", "daf");
makeSeries("D.O", "do");
makeSeries("D.P.E", "dpe");


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
chart.appear(1000, 100);

}); // end am5.ready()
</script>

<!-- HTML -->
<div id="chartdiv5"></div>
</div>
<div class="graff" id="grafico_ultimo"></div>
</div>