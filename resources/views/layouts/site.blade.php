<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


    <title>Praid</title>
  </head>
  <body>
  <div class="container" id='navigation'>
    <div class="row">
      <div class="col-9">
        @yield('menu')
        <canvas id="myChart"></canvas>

      </div>
        <div class="col-3">
          <i class="fas fa-calendar-alt clndr" id="button-a"></i>
          <div id="popup">
                 <ul class="list-group">
                    <li class="list-group-item">
                        <p>Выбор даты:</p>
                        <input type="text" name="dates">
                        <button type="button" class="btn btn-info">Перейти</button>
                    </li>
                    <li class="list-group-item">за 5 дней</li>
                    <li class="list-group-item">за 7 дней</li>
                    <li class="list-group-item">за 10 дней</li>
                    <li class="list-group-item">за все время</li>
                 </ul>
          </div>
        </div>
    </div>
    </div>
  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
    <script type="text/javascript" src="{{asset('assets/js/graph.js')}}"></script>

    <script>
    $('input[name="dates"]').daterangepicker();
    var ref= $('#button-a');
    var popup = $('#popup');
    popup.hide();
    
    ref.click(function(){
      if(popup.is(":hidden"))
          popup.show();
      else
        popup.hide();

    });  
    </script>
  </body>
</html>