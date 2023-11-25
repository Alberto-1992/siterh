<style>
    .graficos3 {
  display: grid;
  grid-auto-rows: 20rem;
  grid-template-columns: 5fr 5fr 3fr;
  gap: 1rem;
  margin-top: 0px;
  margin-left: 57px;
  padding: 10px;
}
@media screen and (max-width: 480px) {
  .graficos3 {
    display: grid;
    grid-auto-rows: 20rem;
    grid-template-columns: repeat(auto-fill, minmax(16rem, 1fr));
    gap: 1rem;
    margin-top: 55px;
    margin-left: 57px;
    padding: 10px;
  }

}

@media screen and (max-width: 920px) {
  .graficos3 {
    display: grid;
    grid-auto-rows: 20rem;
    grid-template-columns: repeat(auto-fill, minmax(16rem, 1fr));
    gap: 1rem;
    margin-top: 55px;
    margin-left: 57px;
    padding: 10px;
  }

}


@media screen and (max-width: 480px) {
  .graficos3 {
    display: grid;
    grid-auto-rows: 20rem;
    grid-template-columns: repeat(auto-fill, minmax(16rem, 1fr));
    gap: 1rem;
    margin-top: 55px;
    margin-left: 57px;
    padding: 10px;
  }
}
</style>
<div class="graficos3">
<div class="graff" id="grafico_barras">

<!-- Styles -->
<style>
#chartdiv4 {
  width: 100%;
  height: 20rem;
}
</style>
<div class="titulo">
        <h2 style="font-size: 13px;">TOTAL DE
SERVIDORES
PÚBLICOS QUE
PARTICIPARON EN
ACCIONES DEL
PROGRAMA ANUAL
DE CAPACITACIÓN</h2>
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

$sql1 = $conexionGrafico->query("SELECT count(*) as modalidad1, plantillahraei.EstatusPlaza from datos inner join plantillahraei on plantillahraei.Empleado = datos.id_empleado where datos.fechatermino like '%2023%' and plantillahraei.EstatusPlaza = 'B'");
$row1 = mysqli_fetch_assoc($sql1);
$sql2 = $conexionGrafico->query("SELECT count(*) as modalidad2, plantillahraei.EstatusPlaza from datos inner join plantillahraei on plantillahraei.Empleado = datos.id_empleado where datos.fechatermino like '%2023%' and plantillahraei.EstatusPlaza = 'CF'");
$row2 = mysqli_fetch_assoc($sql2);
$sql3 = $conexionGrafico->query("SELECT count(*) as modalidad3, plantillahraei.EstatusPlaza from datos inner join plantillahraei on plantillahraei.Empleado = datos.id_empleado where datos.fechatermino like '%2023%' and plantillahraei.EstatusPlaza = 'PR'");
$row3 = mysqli_fetch_assoc($sql3);

$sql4 = $conexionGrafico->query("SELECT count(*) as modalidad4, plantillahraei.EstatusPlaza from datos inner join plantillahraei on plantillahraei.Empleado = datos.id_empleado where datos.fechatermino like '%2023%' and plantillahraei.EstatusPlaza = 'EV'");
$row4 = mysqli_fetch_assoc($sql4);

//$total = $row4['total4'] + $row3['total3'] + $row2['total2'] + $row1['total1'];
?>
];
var data = [{
  "year": "Base",
  "Base": <?php echo $row1['modalidad1'] ?>
}, {
  "year": "Confianza",
  "Confianza": <?php echo $row2['modalidad2'] ?>
}, {
  "year": "Provisional",
  "Eventual": <?php echo $row3['modalidad3'] ?>
}, {
  "year": "Eventual",
  "Provisional": <?php echo $row4['modalidad4'] ?>
}

]


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

makeSeries("Base", "Base");
makeSeries("Confianza", "Confianza");
makeSeries("Eventual", "Eventual");
makeSeries("Provisional", "Provisional");


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
chart.appear(1000, 100);

}); // end am5.ready()
</script>

<!-- HTML -->
<div id="chartdiv4"></div>
</div>
<div class="graff" id="grafico_pastel">
<style>
#chartdiv5 {
  width: 100%;
  height: 20rem;
}
</style>
<div class="titulo">
        <h2 style="font-size: 13px;">TOTAL DE
SERVIDORES
PÚBLICOS ÚNICOS
QUE
PARTICIPARON EN
ACCIONES DEL
PROGRAMA ANUAL
DE CAPACITACIÓN</h2>
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

$sql1 = $conexionGrafico->query("SELECT count(distinct(id_empleado)) as modalidad1, plantillahraei.EstatusPlaza from datos inner join plantillahraei on plantillahraei.Empleado = datos.id_empleado where datos.fechatermino like '%2023%' and plantillahraei.EstatusPlaza = 'B'");
$row1 = mysqli_fetch_assoc($sql1);
$sql2 = $conexionGrafico->query("SELECT count(distinct(id_empleado)) as modalidad2, plantillahraei.EstatusPlaza from datos inner join plantillahraei on plantillahraei.Empleado = datos.id_empleado where datos.fechatermino like '%2023%' and plantillahraei.EstatusPlaza = 'CF'");
$row2 = mysqli_fetch_assoc($sql2);
$sql3 = $conexionGrafico->query("SELECT count(distinct(id_empleado)) as modalidad3, plantillahraei.EstatusPlaza from datos inner join plantillahraei on plantillahraei.Empleado = datos.id_empleado where datos.fechatermino like '%2023%' and plantillahraei.EstatusPlaza = 'PR'");
$row3 = mysqli_fetch_assoc($sql3);

$sql4 = $conexionGrafico->query("SELECT count(distinct(id_empleado)) as modalidad4, plantillahraei.EstatusPlaza from datos inner join plantillahraei on plantillahraei.Empleado = datos.id_empleado where datos.fechatermino like '%2023%' and plantillahraei.EstatusPlaza = 'EV'");
$row4 = mysqli_fetch_assoc($sql4);

//$total = $row4['total4'] + $row3['total3'] + $row2['total2'] + $row1['total1'];
?>
];
var data = [{
  "year": "Base",
  "Base": <?php echo $row1['modalidad1'] ?>
}, {
  "year": "Confianza",
  "Confianza": <?php echo $row2['modalidad2'] ?>
}, {
  "year": "Provisional",
  "Eventual": <?php echo $row3['modalidad3'] ?>
}, {
  "year": "Eventual",
  "Provisional": <?php echo $row4['modalidad4'] ?>
}

]


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

makeSeries("Base", "Base");
makeSeries("Confianza", "Confianza");
makeSeries("Eventual", "Eventual");
makeSeries("Provisional", "Provisional");


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
chart.appear(1000, 100);

}); // end am5.ready()
</script>

    <!-- HTML -->
    <div id="chartdiv5"></div>
</div>
<div class="graff" id="grafico_barras">
<style>
#chartdiv6 {
  width: 100%;
  height: 20rem;
}
</style>
<div class="titulo">
        <h2 style="font-size: 13px;">Numero total de participantes 2021-2023</h2>
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
var root = am5.Root.new("chartdiv6");


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

$sql1 = $conexionGrafico->query("SELECT distinct count(*) as modalidad1 from datos where fechatermino like '%2021%'");
$row1 = mysqli_fetch_assoc($sql1);
$sql2 = $conexionGrafico->query("SELECT distinct count(*) as modalidad2 from datos where fechatermino like '%2022%'");
$row2 = mysqli_fetch_assoc($sql2);
$sql3 = $conexionGrafico->query("SELECT distinct count(*) as modalidad3 from datos where fechatermino like '%2023%'");
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
<div id="chartdiv6"></div>
</div>
</div>