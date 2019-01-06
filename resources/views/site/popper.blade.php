
     <div id="popup">
                 <ul class="list-group">
                    <li class="list-group-item">
                        <p>Выбор даты:</p>
                        <input type="text" name="dates">
                        <button type="button" class="btn btn-info">Перейти</button>
                    </li>
                    @foreach($GetDayForURL as $key => $day)
                    <li class="list-group-item"><a href="{{route('popper',array('nameCurrency' => $nameCurrency, 'day' =>$key))}}">{{$day}}</a></li>
                    @endforeach
                 </ul>
          </div>