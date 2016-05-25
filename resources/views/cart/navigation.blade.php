<ul class="nav navbar-nav navbar-right">
      <!-- If Cart Items Count bigger then 0 -->
    @if (CartProvider::instance()->count() > 0)
        <li class="dropdown">
             <!-- Icon X Product(s) | Total XX TRY  -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <span class="glyphicon glyphicon-shopping-cart"></span> {{ CartProvider::instance()->count() }} {{ trans_choice('cart/navigation.count_product', CartProvider::instance()->count()) }} | {{ trans('cart/navigation.total') }} @currency(CartProvider::instance()->total())
                <strong class="caret"></strong></a>
            <ul class="dropdown-menu">
                 <!-- Cart Navigation Header -->
                <li>
                    <div class="container-fluid cart-navigation-header">
                        <div class="row">
                            <div class="col-xs-3">
                                {{ trans('cart/navigation.product') }}
                            </div>
                            <div class="col-xs-2">
                                {{ trans('cart/navigation.qty') }}
                            </div>
                            <div class="col-xs-3">
                                {{ trans('cart/navigation.subtotal') }}
                            </div>
                            <div class="col-xs-4">

                            </div>
                        </div>
                        <hr>
                    </div>
                </li>
                  <!-- Cart Navigation Header -->
                 <!-- Foreach Items from Cart -->
                @foreach (CartProvider::instance()->content() as $cart) 

                    {!! Form::open(array('action' => 'CartController@update')) !!}

                    <li>
                        <div class="container-fluid cart-navigation">
                            <div class="row cart-navigation-line">
                                <div class="col-xs-3">
                                    {{ $cart->name }}<br>
                                    <small>@currency($cart->price)</small>
                                </div>
                                <div class="col-xs-2">
                                    <input type="hidden" size="3" value="{{ $cart->rowid }}" name="rowID">
                                    <input type="text" size="3" value="{{ $cart->qty }}" name="qty">
                                </div>
                                <div class="col-xs-3">
                                    @currency($cart->subtotal)
                                </div>
                                <div class="col-xs-4">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="">
                                        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
                                        <a href="{{ url('cart/remove', $cart->rowid) }}" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </a>
                                    </div>

                                </div>
                            </div>
                            <hr>
                        </div>
                    </li>
                    {!! Form::close() !!}

                @endforeach
                <!-- Foreach Items from Cart -->
                 <!-- Cart Navigation Footer -->
                <li>
                    <div class="container-fluid cart-navigation-header">
                        <div class="row">
                            <div class="col-xs-3">
                                 
                            </div>
                            <div class="col-xs-2">
                                
                            </div>
                            <div class="col-xs-3">
                                {{ trans('cart/navigation.total') }}
                            </div>
                            <div class="col-xs-4">
                                @currency(CartProvider::instance()->total())
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="container-fluid cart-navigation-header">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="btn-group btn-group-xl btn-group-justified" role="group" aria-label="">
                                        <a href="{{ url('cart') }}" class="btn btn-info" role="button">{{ trans('cart/navigation.view_cart') }}</a>
                                        <a href="{{ url('checkout') }}" class="btn btn-success" role="button">{{ trans('cart/navigation.checkout') }}</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </li>
                
                
                  <!-- Cart Navigation Footer -->

            </ul>
        </li>
    @else
    <!-- If Cart Items Count  == 0 -->
        <li>
           <!-- Cart Empty  -->
            <a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart Empty</a>
        </li>


    @endif
</ul>