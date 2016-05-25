@extends('admin/template/app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
        <small>Update</small>
      </h1>

    </section>
    <!-- Main content -->
    <section class="content">

      @include('admin/category/form',
      array(
        'route' => array('admin.category.update', $category->id),
        'method' => 'PATCH'
           )
      )

    </section>
    <!-- /.content -->
@endsection
