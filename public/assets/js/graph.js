var ctx = document.getElementById('myChart').getContext('2d');


var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ["18 декабря 2018", "19 декабря 2018", "20 декабря 2018"],
        datasets: [{
            label: "Высокий курс",
            //backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [28.3000,28.200,28.100],
        }]
    },

    // Configuration options go here
    options: {
      legend:{
        display:false,
      }

    }
});