<style>
    .graficos2 {
  display: grid;
  grid-auto-rows: 20rem;
  grid-template-columns: 4fr 4fr 4fr;
  gap: 1rem;
  margin-top: 0px;
  margin-left: 57px;
  padding: 10px;
}
@media screen and (max-width: 480px) {
  .graficos2 {
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
  .graficos2 {
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
  .graficos2 {
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
<div class="graficos2">
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
        <h2 style="font-size: 13px;">Eje estrategico seleccionado en meta 1</h2>
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

                $sql1 = $conexionGrafico->query("SELECT count(*) as valorq from personaloperativo2023 where ejeestrategico12022 = 'Mejorar la atención al usuario mediante herramientas de comunicación, abrigo y acompañamiento al paciente, potenciando la atención Médica Integral y de calidad centrada en el paciente con orientación familiar y comunitaria con perspectiva de humanismo.'");
                $row1 = mysqli_fetch_assoc($sql1);
                $sql2 = $conexionGrafico->query("SELECT count(*) as valorw from personaloperativo2023 where ejeestrategico12022 = 'Promover la formación del recurso humano impulsando el desarrollo de competencias y habilidades necesarias para la mejora de la atención de las prioridades nacionales en salud.'");
                $row2 = mysqli_fetch_assoc($sql2);
                $sql3 = $conexionGrafico->query("SELECT count(*) as valorr from personaloperativo2023 where ejeestrategico12022 = 'Promover la generación de nuevo conocimiento, a partir del desarrollo de protocolos de investigación multidisciplinarios e interinstitucional en beneficio de la salud.'");
                $row3 = mysqli_fetch_assoc($sql3);
                $sql4 = $conexionGrafico->query("SELECT count(*) as valora from personaloperativo2023 where ejeestrategico12022 = 'Modelo de Desarrollo Organizacional integral.'");
                $row4 = mysqli_fetch_assoc($sql4);
                $sql5 = $conexionGrafico->query("SELECT count(*) as valorf from personaloperativo2023 where ejeestrategico12022 = 'Fiscalización'");
                $row5 = mysqli_fetch_assoc($sql5);
                //$total = $row4['total4'] + $row3['total3'] + $row2['total2'] + $row1['total1'];
                ?>
            ];
            // Set data
            var data = [
                {
                    name: "Mejorar la atención al usuario",
                    value: <?php echo $row1['valorq'] ?>
                },
                {
                    name: "Promover la formación del recurso humano",
                    value: <?php echo $row2['valorw'] ?>
                },

                {
                    name: "Promover la generación de nuevo conocimiento",
                    value: <?php echo $row3['valorr'] ?>
                },
                {
                    name: "Modelo de Desarrollo Organizacional",
                    value: <?php echo $row4['valora'] ?>
                },
                {
                    name: "Fiscalizacion",
                    value: <?php echo $row5['valorf'] ?>
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
        <h2 style="font-size: 13px;">Porcentaje de eje seleccionado en meta 1</h2>
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

                $sql1 = $conexionGrafico->query("SELECT count(*) as valorq from personaloperativo2023 where ejeestrategico12022 = 'Mejorar la atención al usuario mediante herramientas de comunicación, abrigo y acompañamiento al paciente, potenciando la atención Médica Integral y de calidad centrada en el paciente con orientación familiar y comunitaria con perspectiva de humanismo.'");
                $row1 = mysqli_fetch_assoc($sql1);
                $sql2 = $conexionGrafico->query("SELECT count(*) as valorw from personaloperativo2023 where ejeestrategico12022 = 'Promover la formación del recurso humano impulsando el desarrollo de competencias y habilidades necesarias para la mejora de la atención de las prioridades nacionales en salud.'");
                $row2 = mysqli_fetch_assoc($sql2);
                $sql3 = $conexionGrafico->query("SELECT count(*) as valorr from personaloperativo2023 where ejeestrategico12022 = 'Promover la generación de nuevo conocimiento, a partir del desarrollo de protocolos de investigación multidisciplinarios e interinstitucional en beneficio de la salud.'");
                $row3 = mysqli_fetch_assoc($sql3);
                $sql4 = $conexionGrafico->query("SELECT count(*) as valora from personaloperativo2023 where ejeestrategico12022 = 'Modelo de Desarrollo Organizacional integral.'");
                $row4 = mysqli_fetch_assoc($sql4);
                $sql5 = $conexionGrafico->query("SELECT count(*) as valorf from personaloperativo2023 where ejeestrategico12022 = 'Fiscalización'");
                $row5 = mysqli_fetch_assoc($sql5);

                ?>
            ];
            // Set data
            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
            series.data.setAll([
                {
                    value: <?php echo $row1['valorq'] ?>,
                    category: "1"
                },
                {
                    value: <?php echo $row2['valorw'] ?>,
                    category: "2"
                },
                {
                    value: <?php echo $row3['valorr'] ?>,
                    category: "3"
                },
                {
                    value: <?php echo $row4['valora'] ?>,
                    category: "4"
                },
                {
                    value: <?php echo $row5['valorf'] ?>,
                    category: "5"
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
        #chartdiv5 {
            width: 100%;
            height: 17rem;
            font-size: 10px;
        }

        .titulo {
            text-align: center;
        }
    </style>
    <div class="titulo">
        <h2 style="font-size: 13px;">Eje estrategico seleccionado en meta 2</h2>
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

                $sql1 = $conexionGrafico->query("SELECT count(*) as valorq from personaloperativo2023 where ejeestrategico22022 = 'Mejorar la atención al usuario mediante herramientas de comunicación, abrigo y acompañamiento al paciente, potenciando la atención Médica Integral y de calidad centrada en el paciente con orientación familiar y comunitaria con perspectiva de humanismo.'");
                $row1 = mysqli_fetch_assoc($sql1);
                $sql2 = $conexionGrafico->query("SELECT count(*) as valorw from personaloperativo2023 where ejeestrategico22022 = 'Promover la formación del recurso humano impulsando el desarrollo de competencias y habilidades necesarias para la mejora de la atención de las prioridades nacionales en salud.'");
                $row2 = mysqli_fetch_assoc($sql2);
                $sql3 = $conexionGrafico->query("SELECT count(*) as valorr from personaloperativo2023 where ejeestrategico22022 = 'Promover la generación de nuevo conocimiento, a partir del desarrollo de protocolos de investigación multidisciplinarios e interinstitucional en beneficio de la salud.'");
                $row3 = mysqli_fetch_assoc($sql3);
                $sql4 = $conexionGrafico->query("SELECT count(*) as valora from personaloperativo2023 where ejeestrategico22022 = 'Modelo de Desarrollo Organizacional integral.'");
                $row4 = mysqli_fetch_assoc($sql4);
                $sql5 = $conexionGrafico->query("SELECT count(*) as valorf from personaloperativo2023 where ejeestrategico22022 = 'Fiscalización'");
                $row5 = mysqli_fetch_assoc($sql5);
                //$total = $row4['total4'] + $row3['total3'] + $row2['total2'] + $row1['total1'];
                ?>
            ];
            // Set data
            var data = [
                {
                    name: "Mejorar la atención al usuario",
                    value: <?php echo $row1['valorq'] ?>
                },
                {
                    name: "Promover la formación del recurso humano",
                    value: <?php echo $row2['valorw'] ?>
                },

                {
                    name: "Promover la generación de nuevo conocimiento",
                    value: <?php echo $row3['valorr'] ?>
                },
                {
                    name: "Modelo de Desarrollo Organizacional",
                    value: <?php echo $row4['valora'] ?>
                },
                {
                    name: "Fiscalizacion",
                    value: <?php echo $row5['valorf'] ?>
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
    <div id="chartdiv5"></div>
</div>



</div>