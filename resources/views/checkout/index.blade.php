@extends('template.app')

@section('title', $page_title)



@section('content')
<!-- Breadcrumbs -->
<div class="row">
    <div class="col-md-12">
        {!! Breadcrumbs::render('checkout') !!}
    </div>
</div>
<!-- Breadcrumbs -->

<!-- Auto form fill -->
<div class="row">
    <div class="col-md-12">
        <div class="autoFillAddress">
            <h4>{{ trans('checkout/index.saved_address') }}</h4>
            @foreach ($user_addresses as $user_address)
             <div class="form-group">
                <label><input type="button" class="btn btn-info btn-sm" id="AutoFillClick" name="{{ $user_address->name }}" company="{{ $user_address->company }}" address="{{ $user_address->address }}" city="{{ $user_address->city }}" postcode="{{ $user_address->postcode }}" country="{{ $user_address->country }}" value="{{ trans('checkout/index.autofill_with_address_id') }} {{ $user_address->user_address_id }}"></label>
                {{ trans('checkout/index.address_id') }} {{ $user_address->user_address_id }}, {{ $user_address->name }},  {{ $user_address->address }}, {{ $user_address->postcode }},  {{ $user_address->country }}
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Auto form fill -->

{!! Form::open(array('action' => 'CheckoutController@checkForm', 'id' => 'autoFillForm')) !!}
<div class="col-md-6">
    
     <!-- Payment Information -->
    <h4>{{ trans('checkout/index.payment_information')}}</h4>
    <hr>
    <div class="form-group">
        <label>{{ trans('checkout/index.firstname_lastname')}}</label>
        <input type="text" class="form-control" name="payment_name" value="{{ old('payment_name') }}">
          @if ($errors->has('payment_name'))<p style="color:red;">{!!$errors->first('payment_name')!!}</p>@endif
    </div>
    <div class="form-group">
        <label>{{ trans('checkout/index.company')}}</label>
        <input type="text" class="form-control" name="payment_company" value="{{ old('payment_company') }}">
          @if ($errors->has('payment_company'))<p style="color:red;">{!!$errors->first('payment_company')!!}</p>@endif

    </div>
    <div class="form-group">
        <label>{{ trans('checkout/index.address')}}</label>
        <input type="text" class="form-control" name="payment_address" value="{{ old('payment_address') }}">
          @if ($errors->has('payment_address'))<p style="color:red;">{!!$errors->first('payment_address')!!}</p>@endif

    </div>
    <div class="form-group">
        <label>{{ trans('checkout/index.city')}}</label>
        <input type="text" class="form-control" name="payment_city" value="{{ old('payment_city') }}">
          @if ($errors->has('payment_city'))<p style="color:red;">{!!$errors->first('payment_city')!!}</p>@endif

    </div>
    <div class="form-group">
        <label>{{ trans('checkout/index.postcode')}}</label>
        <input type="text" class="form-control" name="payment_postcode" value="{{ old('payment_postcode') }}">
          @if ($errors->has('payment_postcode'))<p style="color:red;">{!!$errors->first('payment_postcode')!!}</p>@endif

    </div>
    <div class="form-group">
        <label>{{ trans('checkout/index.country')}}</label>
        <input type="text" class="form-control" name="payment_country" value="{{ old('payment_country') }}">
          @if ($errors->has('payment_country'))<p style="color:red;">{!!$errors->first('payment_country')!!}</p>@endif

    </div>
    <!-- Payment Information -->

</div>


<div class="col-md-6">
    <!-- Shipping Information -->
    <h4>{{ trans('checkout/index.shipping_information')}}</h4>
    <hr>
    <div class="form-group">
        <label>{{ trans('checkout/index.firstname_lastname')}}</label>
        <input type="text" class="form-control" name="shipping_name" value="{{ old('shipping_name') }}">
          @if ($errors->has('shipping_name'))<p style="color:red;">{!!$errors->first('shipping_name')!!}</p>@endif

    </div>
    <div class="form-group">
        <label>{{ trans('checkout/index.company')}}</label>
        <input type="text" class="form-control" name="shipping_company" value="{{ old('shipping_company') }}">
          @if ($errors->has('shipping_company'))<p style="color:red;">{!!$errors->first('shipping_company')!!}</p>@endif

    </div>
    <div class="form-group">
        <label>{{ trans('checkout/index.address')}}</label>
        <input type="text" class="form-control" name="shipping_address" value="{{ old('shipping_address') }}">
          @if ($errors->has('shipping_address'))<p style="color:red;">{!!$errors->first('shipping_address')!!}</p>@endif

    </div>
    <div class="form-group">
        <label>{{ trans('checkout/index.city')}}</label>
        <input type="text" class="form-control" name="shipping_city" value="{{ old('shipping_city') }}">
          @if ($errors->has('shipping_city'))<p style="color:red;">{!!$errors->first('shipping_city')!!}</p>@endif

    </div>
    <div class="form-group">
        <label>{{ trans('checkout/index.postcode')}}</label>
        <input type="text" class="form-control" name="shipping_postcode" value="{{ old('shipping_postcode') }}">
          @if ($errors->has('shipping_postcode'))<p style="color:red;">{!!$errors->first('shipping_postcode')!!}</p>@endif

    </div>
    <div class="form-group">
        <label>{{ trans('checkout/index.country')}}</label>
        <input type="text" class="form-control" name="shipping_country" value="{{ old('shipping_country') }}">
          @if ($errors->has('shipping_country'))<p style="color:red;">{!!$errors->first('shipping_country')!!}</p>@endif

    </div>
    <!-- Shipping Information -->
</div>
<div class="col-md-12">
    <!-- Order comment -->
    <h4>{{ trans('checkout/index.order_comment')}}</h4>
    <hr>
    <div class="form-group">
        <label>{{ trans('checkout/index.comment')}} </label>
        <textarea class="form-control" name="comment">{{ old('comment') }}</textarea>
    </div>
    <!-- Order comment -->
</div>
<button type="submit" class="btn btn-success pull-right">{{ trans('checkout/index.payment_shipping_submit')}}</button>

{!! Form::close() !!}

@endsection