@extends('admin/template/app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product
        <small>List</small>
      </h1>

    </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <a class="btn btn-primary" href="{{ route('admin.product.create') }}" role="button">New Product</a>
          </div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>slug</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                      <tr>
                      <td>{{ $product->id }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->slug }}</td>
                      <td>{{ $product->created_at }}</td>
                      <td>{{ $product->updated_at }}</td>
                      <td>
                        <a class="btn btn-primary" href="{{ route('admin.product.edit', $product->id) }}" role="button">Edit</a>
                        <a class="btn btn-primary" href="{{ route('admin.productgallery.show', $product->id) }}" role="button">Gallery</a>
                        <a class="btn btn-warning" href="{{ route('admin.product.destroy', $product->id) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure?">Delete</a>
                      </td>
                      </tr>
                   @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>slug</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection
