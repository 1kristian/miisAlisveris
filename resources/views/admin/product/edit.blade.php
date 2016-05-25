@extends('admin/template/app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product
        <small>Update</small>
      </h1>

    </section>
    <!-- Main content -->
    <section class="content">

      @include('admin/product/form',
      array(
        'route' => array('admin.product.update', $product->id),
        'method' => 'PATCH'
           )
      )

    </section>
    <!-- /.content -->
@endsection
