<div id="graficostitulo">
<div class="form-header">
                                <h3 class="form-title-datos-edicion">
                                    Hombres</h3>

                            </div>
<style>
#chartdiv3 {
  width: 100%;
  height: 45rem;

}

</style>

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
var chart = root.container.children.push(am5percent.PieChart.new(root, {
  radius: am5.percent(90),
  innerRadius: am5.percent(50),
  layout: root.horizontalLayout
}));

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
var series = chart.series.push(am5percent.PieSeries.new(root, {
  name: "Series",
  valueField: "value",
  categoryField: "sexo"
}));
var chartData = [
    
    <?php
    require '../conexionCancer.php';

    $sqledad1 = $conexion2->query("SELECT count(*) as totaledad1 from dato_personalinfarto where edad between 20 and 34 and sexo = 'Masculino'");
    $rowedad1 = mysqli_fetch_assoc($sqledad1);
    $sqledad2 = $conexion2->query("SELECT count(*) as totaledad2 from dato_personalinfarto where edad between 35 and 65 and sexo = 'Masculino'");
    $rowedad2 = mysqli_fetch_assoc($sqledad2);
    $sqledad3 = $conexion2->query("SELECT count(*) as totaledad3 from dato_personalinfarto where edad > 66 and sexo = 'Masculino'");
    $rowedad3 = mysqli_fetch_assoc($sqledad3);

  
    
    
    ?>
    ];
// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series.data.setAll([{
  sexo: "Edad 20 a 34",
  value: <?php echo $rowedad1['totaledad1']; ?>
}, {
  sexo: "Edad 35 a 65",
  value: <?php echo $rowedad2['totaledad2']; ?>
}, {
  sexo: "Mas de 65",
  value: <?php echo $rowedad3['totaledad3']; ?>
}
]);

// Disabling labels and ticks
series.labels.template.set("visible", true);
series.ticks.template.set("visible", true);

// Adding gradients
series.slices.template.set("strokeOpacity", 0);
series.slices.template.set("fillGradient", am5.RadialGradient.new(root, {
  stops: [{
    brighten: -0.9
  }, {
    brighten: -0.9
  }, {
    brighten: -0.6
  }, {
    brighten: 0
  }, {
    brighten: -0.9
  }]
}));

// Create legend
// https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
var legend = chart.children.push(am5.Legend.new(root, {
  centerY: am5.percent(50),
  y: am5.percent(50),
  layout: root.verticalLayout
}));
// set value labels align to right
legend.valueLabels.template.setAll({ textAlign: "right" })
// set width and max width of labels
legend.labels.template.setAll({ 
  maxWidth: 140,
  width: 140,
  oversizedBehavior: "wrap"
});

legend.data.setAll(series.dataItems);


// Play initial series animation
// https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
series.appear(1000, 100);

}); // end am5.ready()
</script>
<!-- HTML -->
<div id="chartdiv3">
  
  <?php
    require '../conexionCancer.php';

    $sqledad1 = $conexion2->query("SELECT count(*) as totaledad1 from dato_personalinfarto where edad between 20 and 34 and sexo = 'Masculino'");
    $rowedad1 = mysqli_fetch_assoc($sqledad1);
    $sqledad2 = $conexion2->query("SELECT count(*) as totaledad2 from dato_personalinfarto where edad between 35 and 65 and sexo = 'Masculino'");
    $rowedad2 = mysqli_fetch_assoc($sqledad2);
    $sqledad3 = $conexion2->query("SELECT count(*) as totaledad3 from dato_personalinfarto where edad > 66 and sexo = 'Masculino'");
    $rowedad3 = mysqli_fetch_assoc($sqledad3);
?>
  <br><style>
  #cantidadhombre {
    color: white;
    border: none;
    background: black;
    padding: 5px;
  }
  #cantidadhombre2 {
    color: red;
    border: none;
    background: black;
    padding: 5px;
  }
  </style>

<input type="submit" id="cantidadhombre" value="Edad de 20 a 34 años: <?php echo $rowedad1['totaledad1'] ?> Pacientes.">
<input type="submit" id="cantidadhombre2" value="Edad de 35 a 65 años: <?php echo $rowedad2['totaledad2'] ?> Pacientes.">
<input type="submit" id="cantidadhombre" value="Mas de 65 años: <?php echo $rowedad3['totaledad3'] ?> Pacientes.">
</div>  
<br><br>
                            <!-- form start -->
                            <div class="form-header">
                                <h3 class="form-title-datos-edicion">
                                    Mujeres</h3>

                            </div>
<html>

<style>
#chartdiv {
  width: 100%;
  height: 45rem;
}

</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
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
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart = root.container.children.push(am5percent.PieChart.new(root, {
  radius: am5.percent(90),
  innerRadius: am5.percent(50),
  layout: root.horizontalLayout
}));

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
var series = chart.series.push(am5percent.PieSeries.new(root, {
  name: "Series",
  valueField: "value",
  categoryField: "sexo"
}));

var chartData = [
    
    <?php
    require '../conexionCancer.php';

    $sql4 = $conexion2->query("SELECT count(*) as total4 from dato_personalinfarto where edad between 30 and 39 and sexo = 'Femenino'");
    $row4 = mysqli_fetch_assoc($sql4);
    $sql5 = $conexion2->query("SELECT count(*) as total5 from dato_personalinfarto where edad between 40 and 49 and sexo = 'Femenino'");
    $row5 = mysqli_fetch_assoc($sql5);
    $sql6 = $conexion2->query("SELECT count(*) as total6 from dato_personalinfarto where edad between 50 and 59 and sexo = 'Femenino'");
    $row6 = mysqli_fetch_assoc($sql6);
    $sql7 = $conexion2->query("SELECT count(*) as total7 from dato_personalinfarto where edad between 60 and 69 and sexo = 'Femenino'");
    $row7 = mysqli_fetch_assoc($sql7);
    $sqledad = $conexion2->query("SELECT count(*) as totaledad from dato_personalinfarto where edad >= 70 and sexo = 'Femenino'");
    $rowedad = mysqli_fetch_assoc($sqledad);
    $sqlmenor = $conexion2->query("SELECT count(*) as totalmenor from dato_personalinfarto where edad between 20 and 39 and sexo = 'Femenino'");
    $rowmenor = mysqli_fetch_assoc($sqlmenor);
  
  
    
    
    ?>
    ];
// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series.data.setAll([{
  
  sexo: "Edad 20 a 29",
  value: <?php echo $rowmenor['totalmenor']; ?>
}, {
  sexo: "Edad 30 a 39",
  value: <?php echo $row4['total4']; ?>
}, {
  sexo: "Edad 40 a 49",
  value: <?php echo $row5['total5']; ?>
}, {
  sexo: "Edad 50 a 59",
  value: <?php echo $row6['total6']; ?>
}, {
  sexo: "Edad 60 a 69",
  value: <?php echo $row7['total7']; ?>
}, {
  sexo: "Mas de 70",
  value: <?php echo $rowedad['totaledad']; ?>
}
]);

// Disabling labels and ticks
series.labels.template.set("visible", true);
series.ticks.template.set("visible", true);

// Adding gradients
series.slices.template.set("strokeOpacity", 0);
series.slices.template.set("fillGradient", am5.RadialGradient.new(root, {
  stops: [{
    brighten: -0.8
  }, {
    brighten: -0.8
  }, {
    brighten: -0.5
  }, {
    brighten: 0
  }, {
    brighten: -0.5
  }]
}));

// Create legend
// https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
var legend = chart.children.push(am5.Legend.new(root, {
  centerY: am5.percent(50),
  y: am5.percent(50),
  layout: root.verticalLayout
}));
// set value labels align to right
legend.valueLabels.template.setAll({ textAlign: "right" })
// set width and max width of labels
legend.labels.template.setAll({ 
  maxWidth: 140,
  width: 140,
  oversizedBehavior: "wrap"
});

legend.data.setAll(series.dataItems);


// Play initial series animation
// https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
series.appear(1000, 100);

}); // end am5.ready()

</script>
<!-- HTML -->
<div id="chartdiv">
<?php
    require '../conexionCancer.php';
    $sqlmenor = $conexion2->query("SELECT count(*) as totalmenor from dato_personalinfarto where edad between 20 and 39 and sexo = 'Femenino'");
    $rowmenor = mysqli_fetch_assoc($sqlmenor);
    $sql4 = $conexion2->query("SELECT count(*) as total4 from dato_personalinfarto where edad between 30 and 39 and sexo = 'Femenino'");
    $row4 = mysqli_fetch_assoc($sql4);
    $sql5 = $conexion2->query("SELECT count(*) as total5 from dato_personalinfarto where edad between 40 and 49 and sexo = 'Femenino'");
    $row5 = mysqli_fetch_assoc($sql5);
    $sql6 = $conexion2->query("SELECT count(*) as total6 from dato_personalinfarto where edad between 50 and 59 and sexo = 'Femenino'");
    $row6 = mysqli_fetch_assoc($sql6);
    $sql7 = $conexion2->query("SELECT count(*) as total7 from dato_personalinfarto where edad between 60 and 69 and sexo = 'Femenino'");
    $row7 = mysqli_fetch_assoc($sql7);
    $sqlmasde = $conexion2->query("SELECT count(*) as totaledad from dato_personalinfarto where edad >= 70 and sexo = 'Femenino'");
    $rowmasde70 = mysqli_fetch_assoc($sqlmasde);
    ?>
    <br><style>
      #cantidadmujeres {
        color: white;
        border: none;
        background: black;
        padding: 5px;
      }
      #cantidadmujeres1 {
        color: red;
        border: none;
        background: black;
        padding: 5px;
      }
    </style>
    
  <input type="submit" id="cantidadmujeres" value="Edad de 20 a 29 años: <?php echo $rowmenor['totalmenor'] ?> Pacientes.">
  <input type="submit" id="cantidadmujeres" value="Edad de 30 a 39 años: <?php echo $row4['total4'] ?> Pacientes.">
  <input type="submit" id="cantidadmujeres1" value="Edad de 40 a 49 años: <?php echo $row5['total5'] ?> Pacientes.">
  <input type="submit" id="cantidadmujeres1" value="Edad de 50 a 59 años: <?php echo $row6['total6'] ?> Pacientes.">
  <input type="submit" id="cantidadmujeres1" value="Edad de 60 a 69 años: <?php echo $row7['total7'] ?> Pacientes.">
  <input type="submit" id="cantidadmujeres" value="Mas de 70 años: <?php echo $rowmasde70['totaledad'] ?> Pacientes.">
    
    
    
</div>  
<br><br>
