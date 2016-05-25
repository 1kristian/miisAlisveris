@extends('template.app')

@section('title', $page_title)

@section('content')
<!-- Breadcrumbs -->
<div class="row">
    <div class="col-md-12">
        {!! Breadcrumbs::render('profile.newaddress') !!}
    </div>
</div>
<!-- Breadcrumbs -->
<div class="panel panel-default">
    <div class="panel-heading">{{ trans('auth/profile/newaddress.create_address_title') }}</div>
    <div class="panel-body">
        <!-- Create New User Address  -->
        {!! Form::open(array('action' => 'ProfileController@createAddress')) !!}
    <div class="form-group">
        <label>{{ trans('auth/profile/newaddress.firstname_lastname') }}</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
          @if ($errors->has('name'))<p style="color:red;">{!!$errors->first('name')!!}</p>@endif
    </div>
    <div class="form-group">
        <label>{{ trans('auth/profile/newaddress.company') }}</label>
        <input type="text" class="form-control" name="company" value="{{ old('company') }}">
          @if ($errors->has('company'))<p style="color:red;">{!!$errors->first('company')!!}</p>@endif

    </div>
    <div class="form-group">
        <label>{{ trans('auth/profile/newaddress.address') }}</label>
        <input type="text" class="form-control" name="address" value="{{ old('address') }}">
          @if ($errors->has('address'))<p style="color:red;">{!!$errors->first('address')!!}</p>@endif

    </div>
    <div class="form-group">
        <label>{{ trans('auth/profile/newaddress.city') }}</label>
        <input type="text" class="form-control" name="city" value="{{ old('city') }}">
          @if ($errors->has('city'))<p style="color:red;">{!!$errors->first('city')!!}</p>@endif

    </div>
    <div class="form-group">
        <label>{{ trans('auth/profile/newaddress.postcode') }}</label>
        <input type="text" class="form-control" name="postcode" value="{{ old('postcode') }}">
          @if ($errors->has('postcode'))<p style="color:red;">{!!$errors->first('postcode')!!}</p>@endif

    </div>
    <div class="form-group">
        <label>{{ trans('auth/profile/newaddress.country') }}</label>
        <input type="text" class="form-control" name="country" value="{{ old('country') }}">
          @if ($errors->has('country'))<p style="color:red;">{!!$errors->first('country')!!}</p>@endif
    </div>
    <div class="form-group">
        <label>{{ trans('auth/profile/newaddress.status') }}</label>
        <select class="form-control" name="status"><option value="1">{{ trans('auth/profile/newaddress.active') }}</option><option value="0">{{ trans('auth/profile/newaddress.passive') }}</option></select>
        @if ($errors->has('status'))<p style="color:red;">{!!$errors->first('status')!!}</p>@endif
    </div>
        

        
        
        <button type="submit" class="btn btn-info">{{ trans('auth/profile/newaddress.create') }}</button>
        {!! Form::close() !!}

    </div>
        <!-- Create New User Address  -->
        
</div>
@endsection

