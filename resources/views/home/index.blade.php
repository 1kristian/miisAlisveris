@extends('template/app')

@section('title', $page_title)

@section('content')
<!-- Slider -->
<div class="row carousel-holder">

    <div class="col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                </div>
                <div class="item">
                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                </div>
                <div class="item">
                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>

</div>
<!-- Slider --->

<!-- Products -->
<div class="row">
    @foreach ($products as $product)
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="{{ url('/', $product->image) }}" alt="">
            <div class="caption">
                <h4><a href="{{ url('/product', $product->slug) }}">{{ $product->name }}</a></h4>
                <h4> @currency($product->price)</h4>
                <p>{{ str_limit($product->content, 110) }}</p>
            </div>
            <!-- ratings -->
            <div class="ratings">
                <p class="pull-right">15 {{ trans_choice('home/index.review', 15) }}</p>
                <p>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                </p>
            </div>
            <!-- ratings -->
            <!-- add to cart -->
            <div class="addcart">
                {!! Form::open(array('action' => 'CartController@add')) !!}
                    <input type="hidden" size="3" value="{{ $product->id }}" name="productID">
                    {{ trans('home/index.qty') }} : <input type="text" size="3" value="" name="qty">
                    <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></button>
                {!! Form::close() !!}
             </div>
            <!-- add to cart -->
        </div>
    </div>
    @endforeach
</div>
<!-- Products -->

@endsection
