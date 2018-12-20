<ul class="nav nav-tabs">
            @if($currencies)
            @foreach($currencies as $currency)
              <li class="nav-item">
            <a class="nav-link active" href="{{route('currency',$currency->name)}}">{{$currency->name}}</a>
         </li>
            @endforeach
          @endif
        </ul>

