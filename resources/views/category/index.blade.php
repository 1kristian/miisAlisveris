@extends('template.app')

@section('title', $page_title)


@section('content')
<!-- Breadcrumbs -->
<div class="row">
    <div class="col-md-12">
        {!! Breadcrumbs::render('category', $category) !!}
    </div>
</div>
<!-- Breadcrumbs -->
<!-- Products -->
<div class="row">
    @foreach ($category_products as $product)
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
                <p class="pull-right">15 {{ trans_choice('category/index.review', 15) }}</p>
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
                    {{ trans('category/index.qty') }}: <input type="text" size="3" value="" name="qty">
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
