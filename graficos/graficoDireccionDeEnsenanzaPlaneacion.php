<!-- Styles -->
<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }
</style>

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
            require '../conexionRh.php';

            $sqlDEP = $conexionGrafico->query("SELECT count(*) as totalDEP from personaloperativo2023 where descripcionestructura2 = 'DIRECCION DE PLANEACION, ENSEÑANZA E INVESTIGACION'");
            $rowDEP = mysqli_fetch_assoc($sqlDEP);
            $sqlDEP2 = $conexionGrafico->query("SELECT count(*) as totalDEP2 from personaloperativo2023 where descripcionestructura2 = 'DIRECCION DE PLANEACION, ENSEÑANZA E INVESTIGACION' and vistobueno = 1");
            $rowDEP2 = mysqli_fetch_assoc($sqlDEP2);
            $sqlDEP3 = $conexionGrafico->query("SELECT count(*) as totalDEP3 from personaloperativo2023 where descripcionestructura2 = 'DIRECCION DE PLANEACION, ENSEÑANZA E INVESTIGACION' and vistobueno = 4");
            $rowDEP3 = mysqli_fetch_assoc($sqlDEP3);
            $sqlDEP4 = $conexionGrafico->query("SELECT count(*) as totalDEP4 from personaloperativo2023 where descripcionestructura2 = 'DIRECCION DE PLANEACION, ENSEÑANZA E INVESTIGACION' and vistobueno = 2");
            $rowDEP4 = mysqli_fetch_assoc($sqlDEP4);

            ?>
        ];
        // Set data
        var data = [

            {
                name: "D.P.E.I",
                value: <?php echo $rowDEP['totalDEP'] ?>
            },
            {
                name: "D.P.E.I Finalizo",
                value: <?php echo $rowDEP2['totalDEP2'] ?>
            },
            {
                name: "D.P.E.I Sin captura",
                value: <?php echo $rowDEP3['totalDEP3'] ?>
            },
            {
                name: "D.P.E.I Pen. VoBo",
                value: <?php echo $rowDEP4['totalDEP4'] ?>
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