
     <div id="popup">
                 <ul class="list-group">
                    
                    @foreach($GetDayForURL as $key => $day)
                    <li class="list-group-item"><a href="{{route('popper',array('nameCurrency' => $nameCurrency, 'day' =>$key))}}">{{$day}}</a></li>
                    @endforeach
                 </ul>
          </div>