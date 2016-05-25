@if (count($currencies) === 0)
<!-- Only one currency -->
@else
<ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
             <!-- Icon X Product(s) | Total XX TRY  -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{ Currency::getCurrencySymbol() }}
                                <strong class="caret"></strong></a>
            <ul class="dropdown-menu scrollable-menu">
                @foreach ($currencies as $currency)
                <!-- Cart Navigation Header -->
               <li>
                   <a href="{{ url('currency/update', $currency->id) }}">{{ $currency->symbol_left }} {{ $currency->title }} {{ $currency->symbol_right }}</a>
               </li>          
                 @endforeach
            </ul>
        </li>
</ul>
@endif