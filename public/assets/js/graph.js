        var url = window.location.href;
        if(url.indexOf("?") === -1){
          url = window.location.href.replace(window.location.search,'');
          url = url+'/chart';
        }
        else{
            url = window.location.href.replace(window.location.search,'');
            url = url+'/chart?dates='+ new URLSearchParams(window.location.search).get('dates');
        }
      
        var dates = new Array();
        var prices = new Array();

        $(document).ready(function(){
          $.get(url, function(response){

            response.forEach(function(data){

                dates.push(data.Data);
                prices.push(data.price);

            });
            var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels:dates,
                      datasets: [{
                          label: 'Высокий курс',
                          borderColor: 'rgb(255, 99, 132)',
                          data: prices,
                          borderWidth: 1
                      }]
                  },
                  options: {
                      legend:{
                        display:false,
                    }
                  }
              });
          });
        });