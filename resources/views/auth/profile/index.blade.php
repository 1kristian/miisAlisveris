@extends('template.app')

@section('title', $page_title)

@section('content')
<!-- Breadcrumbs -->
<div class="row">
    <div class="col-md-12">
        {!! Breadcrumbs::render('profile') !!}
    </div>
</div>
<!-- Breadcrumbs -->
<!-- User Information Panel -->
 <div class="panel panel-default">
    <div class="panel-heading">{{ trans('auth/profile/index.user_information_title') }}</div>
    <div class="panel-body">
        {{ $user->name }}<br>
        {{ $user->email }} 
    </div>
 </div>
<!-- User Information Panel -->

<div class="panel panel-default">
    <div class="panel-heading">{{ trans('auth/profile/index.user_address_title') }}</div>
    <div class="panel-body">
        <!-- Responsive User Address List table -->

        <div class="table-responsive">
            <table class="table table-hover table-striped"> 
                <thead> 
                    <tr> 
                        <th>{{ trans('auth/profile/index.address_id') }}</th> 
                        <th>{{ trans('auth/profile/index.firstname_lastname') }}</th> 
                        <th>{{ trans('auth/profile/index.company') }}</th> 
                        <th>{{ trans('auth/profile/index.address') }}</th>
                        <th>{{ trans('auth/profile/index.postcode') }}</th>
                        <th>{{ trans('auth/profile/index.country') }}</th>
                        <th>{{ trans('auth/profile/index.status') }}</th>
                        <th>{{ trans('auth/profile/index.action') }}</th>
                    </tr> 
                </thead> 
                <tbody> 
                    @foreach($user_addresses as $address)
                    <tr> 
                        <td>{{ $address->user_address_id }}</td> 
                        <td>{{ $address->name }}</td> 
                        <td>{{ $address->company }}</td> 
                        <td>{{ $address->address }}</td>
                        <td>{{ $address->postcode }}</td>
                        <td>{{ $address->country }}</td>
                        <td>
                            @if($address->status == 1)
                            <span class="label label-success">{{ trans('auth/profile/index.active') }}</span>
                            @else
                            <span class="label label-danger">{{ trans('auth/profile/index.passive') }}</span>
                            @endif
                        </td>
                        <td class="col-sm-2">
                            <div class="btn-group btn-group-sm" role="group" aria-label="">
                                <a href="{{ url('profile/showAddress', $address->user_address_id)}}" class="btn btn-info" role="button">{{ trans('auth/profile/index.update') }}</a>
                                <a href="{{ url('profile/deleteAddress', $address->user_address_id)}}" class="btn btn-danger" role="button">{{ trans('auth/profile/index.delete') }}</a>
                            </div>

                        </td>
                    </tr> 
                    @endforeach

                </tbody>
            </table>

        </div>
        <!-- Responsive User Address List table -->

        <!-- User Address Actions Buttons Group -->

        <div class="col-md-4">
            <div class="btn-group btn-group-xl" role="group" aria-label="">
                <a href="{{ url('profile/newAddress')}}" class="btn btn-success" role="button">{{ trans('auth/profile/index.add_new_address') }}</a>
            </div>
        </div>

        <!-- User Address Actions Buttons Group -->

    </div>
</div>
@endsection

