<style>
    .graficos2 {
  display: grid;
  grid-auto-rows: 24rem;
  grid-template-columns: 5fr 5fr 3fr;
  gap: 1rem;
  margin-top: 0px;
  margin-left: 57px;
  padding: 10px;
}
@media screen and (max-width: 480px) {
  .graficos2 {
    display: grid;
    grid-auto-rows: 24rem;
    grid-template-columns: repeat(auto-fill, minmax(16rem, 1fr));
    gap: 1rem;
    margin-top: 55px;
    margin-left: 57px;
    padding: 10px;
  }

}

@media screen and (max-width: 920px) {
  .graficos2 {
    display: grid;
    grid-auto-rows: 24rem;
    grid-template-columns: repeat(auto-fill, minmax(16rem, 1fr));
    gap: 1rem;
    margin-top: 55px;
    margin-left: 57px;
    padding: 10px;
  }

}


@media screen and (max-width: 480px) {
  .graficos2 {
    display: grid;
    grid-auto-rows: 24rem;
    grid-template-columns: repeat(auto-fill, minmax(16rem, 1fr));
    gap: 1rem;
    margin-top: 55px;
    margin-left: 57px;
    padding: 10px;
  }
}
</style>
<div class="graficos2">
<div class="graff" id="grafico_barras">

<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 20rem;
}
</style>
<div class="titulo">
        <h2 style="font-size: 13px;">Comparativo de cursos Impartidos en línea y Presenciales
2021-2023</h2>
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

$sql1 = $conexionGrafico->query("SELECT count(*) as modalidad1 from datos where modalidad = 'A distancia' and fechatermino like '%2023%'");
$row1 = mysqli_fetch_assoc($sql1);
$sql2 = $conexionGrafico->query("SELECT count(*) as modalidad2 from datos where modalidad = 'Presencial' and fechatermino like '%2023%'");
$row2 = mysqli_fetch_assoc($sql2);
$sql3 = $conexionGrafico->query("SELECT count(*) as modalidad3 from datos where modalidad = 'Mixta' and fechatermino like '%2023%'");
$row3 = mysqli_fetch_assoc($sql3);

$sql4 = $conexionGrafico->query("SELECT count(*) as modalidad4 from datos where modalidad = 'A distancia' and fechatermino like '%2022%'");
$row4 = mysqli_fetch_assoc($sql4);
$sql5 = $conexionGrafico->query("SELECT count(*) as modalidad5 from datos where modalidad = 'Presencial' and fechatermino like '%2022%'");
$row5 = mysqli_fetch_assoc($sql5);
$sql6 = $conexionGrafico->query("SELECT count(*) as modalidad6 from datos where modalidad = 'Mixta' and fechatermino like '%2022%'");
$row6 = mysqli_fetch_assoc($sql6);

$sql7 = $conexionGrafico->query("SELECT count(*) as modalidad7 from datos where modalidad = 'A distancia' and fechatermino like '%2021%'");
$row7 = mysqli_fetch_assoc($sql7);
$sql8 = $conexionGrafico->query("SELECT count(*) as modalidad8 from datos where modalidad = 'Presencial' and fechatermino like '%2021%'");
$row8 = mysqli_fetch_assoc($sql8);
$sql9 = $conexionGrafico->query("SELECT count(*) as modalidad9 from datos where modalidad = 'Mixta' and fechatermino like '%2021%'");
$row9 = mysqli_fetch_assoc($sql9);

//$total = $row4['total4'] + $row3['total3'] + $row2['total2'] + $row1['total1'];
?>
];
var data = [{
  "year": "2023",
  "Presencial": <?php echo $row1['modalidad1'] ?>,
  "A distancia": <?php echo $row2['modalidad2'] ?>,
  "Mixto": <?php echo $row3['modalidad3'] ?>
}, {
  "year": "2022",
  "Presencial": <?php echo $row4['modalidad4'] ?>,
  "A distancia": <?php echo $row5['modalidad5'] ?>,
  "Mixto": <?php echo $row6['modalidad6'] ?>
}, {
  "year": "2021",
  "Presencial": <?php echo $row7['modalidad7'] ?>,
  "A distancia": <?php echo $row8['modalidad8'] ?>,
  "Mixto": <?php echo $row9['modalidad9'] ?>
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

makeSeries("Presencial", "Presencial");
makeSeries("A distancia", "A distancia");
makeSeries("Mixto", "Mixto");


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
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
        <h2 style="font-size: 13px;">Porcentaje de participantes 2021-2023</h2>
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

                $sql1 = $conexionGrafico->query("SELECT count(distinct(id_empleado)) as valorq from datos inner join plantillahraei on plantillahraei.Empleado = datos.id_empleado where datos.fechatermino like '%2021%'");
                $row1 = mysqli_fetch_assoc($sql1);
                $sql2 = $conexionGrafico->query("SELECT count(distinct(id_empleado)) as valorw from datos inner join plantillahraei on plantillahraei.Empleado = datos.id_empleado where datos.fechatermino like '%2022%'");
                $row2 = mysqli_fetch_assoc($sql2);
                $sql3 = $conexionGrafico->query("SELECT count(distinct(id_empleado)) as valorr from datos inner join plantillahraei on plantillahraei.Empleado = datos.id_empleado where datos.fechatermino like '%2023%'");
                $row3 = mysqli_fetch_assoc($sql3);
                

                ?>
            ];
            // Set data
            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
            series.data.setAll([
                {
                    value: <?php echo $row1['valorq'] ?>,
                    category: "2021"
                },
                {
                    value: <?php echo $row2['valorw'] ?>,
                    category: "2022"
                },
                {
                    value: <?php echo $row3['valorr'] ?>,
                    category: "2023"
                }

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
<div class="graff" id="grafico_barras">
<style>
#chartdiv3 {
  width: 100%;
  height: 20rem;
}
</style>
<div class="titulo">
        <h2 style="font-size: 13px;">Numero total unico de participantes 2021-2023</h2>
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
var root = am5.Root.new("chartdiv3");


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

$sql1 = $conexionGrafico->query("SELECT count(distinct(id_empleado)) as modalidad1 from datos where fechatermino like '%2021%'");
$row1 = mysqli_fetch_assoc($sql1);
$sql2 = $conexionGrafico->query("SELECT count(distinct(id_empleado)) as modalidad2 from datos where fechatermino like '%2022%'");
$row2 = mysqli_fetch_assoc($sql2);
$sql3 = $conexionGrafico->query("SELECT count(distinct(id_empleado)) as modalidad3 from datos where fechatermino like '%2023%'");
$row3 = mysqli_fetch_assoc($sql3);


//$total = $row4['total4'] + $row3['total3'] + $row2['total2'] + $row1['total1'];
?>
];
var data = [{
  "year": "2021",
  "Participacion 2021": <?php echo $row1['modalidad1'] ?>
}, {
  "year": "2022",
  "Participacion 2022": <?php echo $row2['modalidad2'] ?>
}, {
  "year": "2023",
  "Participacion 2023": <?php echo $row3['modalidad3'] ?>
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

makeSeries("Participacion 2021", "Participacion 2021");
makeSeries("Participacion 2022", "Participacion 2022");
makeSeries("Participacion 2023", "Participacion 2023");


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
chart.appear(1000, 100);

}); // end am5.ready()
</script>

<!-- HTML -->
<div id="chartdiv3"></div>
</div>
</div>