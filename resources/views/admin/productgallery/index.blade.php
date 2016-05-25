@extends('admin/template/app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product Gallery
        <small>List</small>
      </h1>

    </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Rank</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($product_galleries as $product_gallery)
               {!! Form::open(array('route' => array('admin.productgallery.update', $product_gallery->id), 'method' => 'PATCH')) !!}

                    <tr>
                      <td>
                        <input type="hidden" name="row_id" value="{{ $product_gallery->id }}" class="form-control" readonly>
                        <input type="hidden" name="product_id" value="{{ $product_gallery->product_id }}" class="form-control" readonly>
                        <input type="text" name="id" value="{{ $product_gallery->product_id }}" class="form-control" readonly></td>
                      <td><input type="text" name="rank" value="{{ $product_gallery->rank }}" class="form-control"></td>
                      <td><img class="img-responsive" src="{{ url('/', $product_gallery->image) }}">
                        <input type="hidden" id="image{{ $product_gallery->product_id }}" name="image" value="{{ $product_gallery->image }}" class="popup_selector">
                        <a href="" class="popup_selector btn btn-info" data-inputid="image{{ $product_gallery->product_id }}">Change / Select Image</a>
                       </td>
                      <td>
                        {!! Form::checkbox('status', 1, $product_gallery->status) !!}
                       </td>
                      <td>{{ $product_gallery->created_at }}</td>
                      <td>{{ $product_gallery->updated_at }}</td>
                      <td>
                        <button type="submit" class="btn btn-success">Update</button>
                         <a class="btn btn-warning" href="{{ route('admin.productgallery.destroy', $product_gallery->id) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure?">Delete</a>
                      </td>
                    </tr>
               @endforeach
               {!! Form::close() !!}

              {!! Form::open(array('route' => array('admin.productgallery.store'), 'method' => 'POST')) !!}

               <tr class="success">
                 <td>New
                   <input type="hidden" name="product_id" value="{{ $getID }}" class="form-control" readonly>
                 </td>
                 <td><input type="text" name="rank" value="" class="form-control"></td>
                 <td>
                   <input type="hidden" id="image" name="image" value="" class="popup_selector">
                   <a href="" class="popup_selector btn btn-info" data-inputid="image">Select Image</a>
                  </td>
                 <td>
                   {!! Form::checkbox('status', 0) !!}
                 </td>
                 <td></td>
                 <td></td>
                 <td>
                   <button type="submit" class="btn btn-success">Submit</button>
                  </td>
               </tr>
              {!! Form::close() !!}

                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Rank</th>
                    <th>Image</th>
                    <th>Status</th>
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
