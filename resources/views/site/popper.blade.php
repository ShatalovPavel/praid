
     <div id="popup">
                 <ul class="list-group">
                    <li class="list-group-item">
                        <p>Выбор даты:</p>
                            {!! Form::open(['url' => route('popper',array('currency' => $nameCurrency,'dates'=>'dates')),'method'=>'GET']) !!}
                         {!! Form::text('dates','dates',['class' => 'form-control'])!!}
                         {!! Form::button('Перейти', ['class' => 'btn btn-info','type'=>'submit']) !!}
                         {!!Form::close()!!}
                    </li>
                    @foreach($GetDayForURL as $key => $day)
                    <li class="list-group-item"><a href="{{route('popper',array('nameCurrency' => $nameCurrency, 'day' =>$key))}}">{{$day}}</a></li>
                    @endforeach
                 </ul>
          </div>