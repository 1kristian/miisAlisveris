@extends('admin/template/app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        User
        <small>Update</small>
    </h1>

</section>
<!-- Main content -->
<section class="content">

    @include('admin/user/form',
    array(
    'route' => array('admin.user.update', $user->id),
    'method' => 'PATCH'
    )
    )

</section>
<!-- /.content -->
@endsection
