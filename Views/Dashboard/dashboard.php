<?php headerAdmin($data); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i><?= $data['page_title'] ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <?php if(!empty($_SESSION['permisos'][2]['r'])){ ?>
        <div class="col-md-6 col-lg-3">
          <a href="<?= base_url() ?>/usuarios" class="linkw">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
              <div class="info">
                <h4>Usuarios</h4>
                <p><b><?= $data['usuarios'] ?></b></p>
              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
        <div class="col-md-6 col-lg-3">
          <a href="<?= base_url() ?>/clientes" class="linkw">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-user fa-3x"></i>
              <div class="info">
                <h4>Clientes</h4>
                <p><b><?= $data['clientes'] ?></b></p>
              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][4]['r']) ){ ?>
        <div class="col-md-6 col-lg-3">
          <a href="<?= base_url() ?>/productos" class="linkw">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa fa-archive fa-3x"></i>
              <div class="info">
                <h4>Productos</h4>
                <p><b><?= $data['productos'] ?></b></p>
              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
        <div class="col-md-6 col-lg-3">
          <a href="<?= base_url() ?>/pedidos" class="linkw">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-shopping-cart fa-3x"></i>
              <div class="info">
                <h4>Pedidos</h4>
                <p><b><?= $data['pedidos'] ?></b></p>
              </div>
            </div>
          </a>
        </div>
        <?php } ?>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="container-title">
              <h3 class="tile-title">Predicción de productos</h3>
            </div>
            <div id="detallePedidoChartContainer"></div>
          </div>
        </div>

            
        </div>
      </div>
      <div class="row">
      <div class="col-md-6">
          <div class="tile">
            <div class="container-title">
              <h3 class="tile-title">Ventas por año</h3>
              <div class="dflex">
                <input class="ventasAnio" name="ventasAnio" placeholder="Año" minlength="4" maxlength="4" onkeypress="return controlTag(event);">
                <button type="button" class="btnVentasAnio btn btn-info btn-sm" onclick="fntSearchVAnio()"> <i class="fas fa-search"></i> </button>
              </div>
            </div>
            <div id="graficaAnio"></div>
          </div>
        </div>
        <div class="col-md-6">
                <div class="tile">
                    <div class="container-body">
                        <h4 class="tile-title mb-4">Predicción de pedidos mensuales</h4>
                        <div id="chartContainer" class="apex-charts" dir="ltr"></div>
                        <div id="modelAccuracy" class="mt-3"></div>                             
                    </div>
                </div>
            </div>
        </div>
        

      

      <div class="row">
        <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
        <div class="col-md-8">
          <div class="tile">
            <h3 class="tile-title">Últimos Pedidos</h3>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Cliente</th>
                  <th>Estado</th>
                  <th class="text-right">Monto</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    if(count($data['lastOrders']) > 0 ){
                      foreach ($data['lastOrders'] as $pedido) {
                 ?>
                <tr>
                  <td><?= $pedido['idpedido'] ?></td>
                  <td><?= $pedido['nombre'] ?></td>
                  <td><?= $pedido['status'] ?></td>
                  <td class="text-right"><?= SMONEY." ".formatMoney($pedido['monto']) ?></td>
                  <td><a href="<?= base_url() ?>/pedidos/orden/<?= $pedido['idpedido'] ?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <?php } 
                  } ?>

              </tbody>
            </table>
          </div>
        </div>
        <?php } ?>

        <div class="col-md-4">
          <div class="tile">
            <div class="container-title">
              <h3 class="tile-title">Tipo de pagos por mes</h3>
              <div class="dflex">
                <input class="date-picker pagoMes" name="pagoMes" placeholder="Mes y Año">
                <button type="button" class="btnTipoVentaMes btn btn-info btn-sm" onclick="fntSearchPagos()"> <i class="fas fa-search"></i> </button>
              </div>
            </div>
            <div id="pagosMesAnio"></div>
          </div>
        </div>
      </div>

      
        

        


    </main>
<?php footerAdmin($data); ?>



<script>
  document.addEventListener('DOMContentLoaded', function () {
    fetch('<?= base_url() ?>/dashboard/getPredictionData')
      .then(response => response.json())
      .then(data => {
        const currentMonth = new Date().getMonth() + 1; 
        const months = data.map(item => item.mes);
        const totals = data.map(item => item.total);
        const maxTotal = Math.max(...totals);
        const normalizedMonths = tf.tensor2d(months, [months.length, 1]);
        const normalizedTotals = tf.tensor2d(totals.map(t => t / maxTotal), [totals.length, 1]);

        const model = tf.sequential();
        model.add(tf.layers.dense({ inputShape: [1], units: 100, activation: 'relu' }));
        model.add(tf.layers.dense({ units: 50, activation: 'relu' }));
        model.add(tf.layers.dense({ units: 1 }));

        model.compile({ loss: 'meanSquaredError', optimizer: 'adam' });

        model.fit(normalizedMonths, normalizedTotals, { epochs: 1500 }).then(() => {
          const predictions = model.predict(normalizedMonths).arraySync();
          const denormalizedPredictions = predictions.map(p => p[0] * maxTotal);

          const mape = denormalizedPredictions.reduce((acc, pred, i) => acc + Math.abs((pred - totals[i]) / totals[i]), 0) / denormalizedPredictions.length;
          const accuracy = (1 - mape) * 100;
          document.getElementById('modelAccuracy').innerText = `Precisión del modelo: ${accuracy.toFixed(2)}%`;

          if (accuracy < 90) {
            document.getElementById('modelAccuracy').innerText += " (La precisión es menor del 90%, el modelo necesita mejoras)";
          }

          const futurePredictions = [];
          const totalMonths = currentMonth + 3; 
          
          for (let i = 1; i <= totalMonths; i++) {
            const nextMonthTensor = tf.tensor2d([i % 12 || 12], [1, 1]);
            const predictionTensor = model.predict(nextMonthTensor);

            let predictedValue = predictionTensor.arraySync()[0][0] * maxTotal; // Desnormalizar
            predictedValue = Math.round(predictedValue + (Math.random() * (0.1 * maxTotal) - (0.05 * maxTotal))); // Introducir variabilidad y redondear
            futurePredictions.push(predictedValue);
          }

          const monthNames = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

          // Crear etiquetas desde enero hasta tres meses más del mes actual
          const chartLabels = monthNames.slice(0, totalMonths);

          // Calcular el intervalo y el rango del eje Y
          const allValues = totals.concat(futurePredictions);
          const range = Math.max(...allValues) - Math.min(...allValues);
          const tickInterval = Math.ceil(range / 5);
          const yAxisMin = Math.min(...allValues) - tickInterval;
          const yAxisMax = Math.max(...allValues) + tickInterval;

          const optionsColumnLineChart = {
            series: [
              {
                name: "Ventas Reales",
                type: "column",
                data: totals.concat(new Array(chartLabels.length - totals.length).fill(null))
              },
              {
                name: "Predicciones de Ventas",
                type: "line",
                data: totals.concat(futurePredictions).slice(totals.length)
              }
            ],
            chart: {
              height: 350,
              type: "line",
              toolbar: { show: false }
            },
            stroke: {
              width: [0, 2.3],
              curve: "straight"
            },
            plotOptions: {
              bar: {
                horizontal: false,
                columnWidth: "34%"
              }
            },
            dataLabels: {
              enabled: false
            },
            markers: {
              size: [0, 3.5],
              colors: ["#6fd088"],
              strokeWidth: 2,
              strokeColors: "#6fd088",
              hover: { size: 4 }
            },
            legend: { 
              show: true,
              position: 'top',
              horizontalAlign: 'center',
              fontSize: '14px',
              labels: {
                colors: '#000',
                useSeriesColors: false,
                markers: {
                  strokeColor: ['#0f9cf3', '#6fd088'],
                  strokeWidth: 3,
                  hover: {
                    size: 6,
                    sizeOffset: 2
                  }
                },
                onItemClick: {
                  toggleDataSeries: false
                }
              },
              itemMargin: {
                horizontal: 10,
                vertical: 5
              }
            },
            yaxis: {
              labels: {
                formatter: function(value) { return Math.round(value); }
              },
              tickAmount: 5,
              min: yAxisMin,
              max: yAxisMax
            },
            colors: ["#0f9cf3", "#6fd088"],
            labels: chartLabels
          };

          const columnLineChart = new ApexCharts(document.querySelector("#chartContainer"), optionsColumnLineChart);
          columnLineChart.render();
        });
      })
      .catch(error => console.error('Error:', error));
  });
</script>

<script>

  Highcharts.chart('pagosMesAnio', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'Ventas por tipo pago, <?= $data['pagosMes']['mes'].' '.$data['pagosMes']['anio'] ?>'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: true,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %'
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [
          <?php 
            foreach ($data['pagosMes']['tipospago'] as $pagos) {
              echo "{name:'".$pagos['tipopago']."',y:".$pagos['total']."},";
            }
           ?>
          ]
      }]
  });

  Highcharts.chart('graficaMes', {
      chart: {
          type: 'line'
      },
      title: {
          text: 'Ventas de <?= $data['ventasMDia']['mes'].' del '.$data['ventasMDia']['anio'] ?>'
      },
      subtitle: {
          text: 'Total Ventas <?= SMONEY.'. '.formatMoney($data['ventasMDia']['total']) ?> '
      },
      xAxis: {
          categories: [
            <?php 
                foreach ($data['ventasMDia']['ventas'] as $dia) {
                  echo $dia['dia'].",";
                }
            ?>
          ]
      },
      yAxis: {
          title: {
              text: ''
          }
      },
      plotOptions: {
          line: {
              dataLabels: {
                  enabled: true
              },
              enableMouseTracking: false
          }
      },
      series: [{
          name: 'Dato',
          data: [
            <?php 
                foreach ($data['ventasMDia']['ventas'] as $dia) {
                  echo $dia['total'].",";
                }
            ?>
          ]
      }]
  });
  
  Highcharts.chart('graficaAnio', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Ventas del año <?= $data['ventasAnio']['anio'] ?> '
      },
      subtitle: {
          text: 'Esdística de ventas por mes'
      },
      xAxis: {
          type: 'category',
          labels: {
              rotation: -45,
              style: {
                  fontSize: '13px',
                  fontFamily: 'Verdana, sans-serif'
              }
          }
      },
      yAxis: {
          min: 0,
          title: {
              text: ''
          }
      },
      legend: {
          enabled: false
      },
      tooltip: {
          pointFormat: 'Population in 2017: <b>{point.y:.1f} millions</b>'
      },
      series: [{
          name: 'Population',
          data: [
            <?php 
              foreach ($data['ventasAnio']['meses'] as $mes) {
                echo "['".$mes['mes']."',".$mes['venta']."],";
              }
             ?>                 
          ],
          dataLabels: {
              enabled: true,
              rotation: -90,
              color: '#FFFFFF',
              align: 'right',
              format: '{point.y:.1f}', // one decimal
              y: 10, // 10 pixels down from the top
              style: {
                  fontSize: '13px',
                  fontFamily: 'Verdana, sans-serif'
              }
          }
      }]
  });

</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      Promise.all([
          fetch('<?= base_url() ?>/dashboard/getDetallePedidoPredictionData'),
          fetch('<?= base_url() ?>/dashboard/getDetallePedidoCurrentMonthData')
      ])
      .then(responses => Promise.all(responses.map(response => response.json())))
      .then(([previousData, currentData]) => {
          console.log('Datos anteriores recibidos:', previousData);
          console.log('Datos actuales recibidos:', currentData);

          if (previousData.length === 0) {
              console.error('No se obtuvieron datos del mes anterior.');
              return;
          }

          const days = previousData.map(item => item.dia);
          const totals = previousData.map(item => item.total);
          const maxTotal = Math.max(...totals);
          const minTotal = Math.min(...totals);

          const normalizedDays = tf.tensor2d(days, [days.length, 1]);
          const normalizedTotals = tf.tensor2d(totals.map(t => t / maxTotal), [totals.length, 1]);

          tf.setBackend('cpu').then(() => {
              const model = tf.sequential();
              model.add(tf.layers.dense({ inputShape: [1], units: 50, activation: 'relu' }));
              model.add(tf.layers.dense({ units: 1 }));

              model.compile({ loss: 'meanSquaredError', optimizer: 'adam' });

              model.fit(normalizedDays, normalizedTotals, { epochs: 1000 }).then(() => {
                  const futurePredictions = [];

                  const currentDate = new Date();
                  const daysInCurrentMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();

                  for (let i = 1; i <= daysInCurrentMonth; i++) {
                      const nextDayTensor = tf.tensor2d([i], [1, 1]);
                      const predictionTensor = model.predict(nextDayTensor);

                      let predictedValue = predictionTensor.arraySync()[0][0] * maxTotal;
                      predictedValue = Math.round(predictedValue + (Math.random() * (0.1 * maxTotal) - (0.05 * maxTotal)));
                      futurePredictions.push(predictedValue);
                  }

                  console.log('Predicciones futuras:', futurePredictions);

                  const currentDays = currentData.map(item => item.dia);
                  const currentTotals = new Array(daysInCurrentMonth).fill(0);

                  currentData.forEach(item => {
                      currentTotals[item.dia - 1] = item.total;
                  });

                  const dayLabels = Array.from({ length: daysInCurrentMonth }, (_, i) => i + 1);

                  // Obtener el valor máximo y mínimo real
                  const allValues = [...totals, ...futurePredictions, ...currentTotals];
                  const maxAll = Math.max(...allValues);
                  const minAll = Math.min(...allValues);

                  // Ajustar el valor mínimo para evitar valores negativos
                  const yMin = Math.max(0, minAll - 5);
                  
                  // Ajustar el valor máximo para que esté cerca del valor máximo de los datos
                  const yMax = maxAll + 5;

                  const optionsLineChart = {
                      series: [
                          {
                              name: "Pedidos Reales",
                              type: "line",
                              data: currentTotals,
                              color: "#0f9cf3"
                          },
                          {
                              name: "Predicciones de Pedidos",
                              type: "line",
                              data: futurePredictions,
                              color: "#6fd088"
                          }
                      ],
                      chart: {
                          height: 350,
                          type: "line",
                          toolbar: { show: false }
                      },
                      stroke: {
                          width: [2, 2],
                          curve: "straight"
                      },
                      dataLabels: {
                          enabled: false
                      },
                      markers: {
                          size: [3, 3],
                          colors: ["#0f9cf3", "#6fd088"],
                          strokeWidth: 2,
                          strokeColors: ["#0f9cf3", "#6fd088"],
                          hover: { size: 4 }
                      },
                      legend: {
                          show: true,
                          position: 'top',
                          horizontalAlign: 'center'
                      },
                      yaxis: {
                          labels: {
                              formatter: function(value) { return Math.round(value); }
                          },
                          tickAmount: 5,
                          min: yMin,
                          max: yMax
                      },
                      title: {
                          text: `Predicciones de productos en ${currentDate.toLocaleString('es-ES', { month: 'long' })}`,
                          align: 'center',
                          margin: 10,
                          offsetY: 10,
                          style: {
                              fontSize: '16px',
                              color: '#263238'
                          }
                      },
                      colors: ["#0f9cf3", "#6fd088"],
                      labels: dayLabels
                  };

                  const lineChart = new ApexCharts(document.querySelector("#detallePedidoChartContainer"), optionsLineChart);
                  lineChart.render();
              });
          });
      })
      .catch(error => console.error('Error:', error));
  });
</script>




