@extends('admin/template/app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
        <small>List</small>
      </h1>

    </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <a class="btn btn-primary" href="{{ route('admin.category.create') }}" role="button">New Category</a>
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
                  <?php
                  function renderNode($node) {
                    if( $node->isLeaf() ) {
                      return '<tr>
                      <td>' . $node->id . '</td>
                      <td>'.str_repeat('---', $node->depth ).' ' . $node->name . '</td>
                      <td>' . $node->slug . '</td>
                      <td>' . $node->created_at . '</td>
                      <td>' . $node->updated_at . '</td>
                      <td>
                        <a class="btn btn-primary" href="'.route('admin.category.edit', $node->id).'" role="button">Edit</a>
                        <a class="btn btn-warning" href="'.route('admin.category.destroy', $node->id).'" data-method="delete" data-token="'.csrf_token().'" data-confirm="Are you sure?">Delete</a>
                        </td>
                      </td>
                      </tr>';

                    } else {
                      $html = '
                      <tr>
                      <td>' . $node->id . '</td>
                      <td>'.str_repeat('---', $node->depth ).' ' . $node->name . '</td>
                      <td>' . $node->slug . '</td>
                      <td>' . $node->created_at . '</td>
                      <td>' . $node->updated_at . '</td>
                      <td>
                        <a class="btn btn-primary" href="'.route('admin.category.edit', $node->id).'" role="button">Edit</a>
                        <a class="btn btn-warning" href="'.route('admin.category.destroy', $node->id).'" data-method="delete" data-token="'.csrf_token().'" data-confirm="Are you sure?">Delete</a>
                      </td>
                      </tr>';

                      foreach($node->children as $child)
                        $html .= renderNode($child);

                    }
                    return $html;
                  }
                   ?>
                  @foreach($categories as $category)
                    {!! renderNode($category) !!}
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
