@extends('admin/template/app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Password
        <small>Update</small>
    </h1>

</section>
<!-- Main content -->
<section class="content">

    @include('admin/password/form',
    array(
    'route' => array('admin.password.updatePassword', $user->id),
    'method' => 'PATCH'
    )
    )

</section>
<!-- /.content -->
@endsection
