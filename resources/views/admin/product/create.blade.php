@extends('admin/template/app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
        <small>Create</small>
      </h1>

    </section>
    <!-- Main content -->
    <section class="content">

      @include('admin/product/form',
      array(
        'route' => array('admin.product.store'),
        'method' => 'POST'
           )
      )

    </section>
    <!-- /.content -->
@endsection
