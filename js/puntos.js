
Highcharts.chart('container', {
  chart: {
    type: 'line'
  },
  title: {
    text: ''
  },
  subtitle: {
    text: 'Evolucíon de tus acumulación de puntos'
  },
  xAxis: {
    categories: ['Jan', 'Feb', 'Mar','Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
  },
  yAxis: {
    title: {
      text: 'Puntos'
    }
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: true
      },
      enableMouseTracking: true

    }
  },
  series: [{
    name: 'Total de puntos',
    data: [1200, 1500, 200, 400 , 500 , 600 , 700, 100, 800, 1200, 1500, 2000]

  }],
  colors: ['#2C366E']
});