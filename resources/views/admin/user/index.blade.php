@extends('admin/template/app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>List</small>
      </h1>

    </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <a class="btn btn-primary" href="{{ route('admin.user.create') }}" role="button">New User</a>
          </div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>E-Mail</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                      <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->created_at }}</td>
                      <td>{{ $user->updated_at }}</td>
                      <td>
                        <a class="btn btn-primary" href="{{ route('admin.user.edit', $user->id) }}" role="button">Edit</a>
                        <a class="btn btn-primary" href="{{ route('admin.user.show', $user->id) }}" role="button">Password</a>
                        <a class="btn btn-primary" href="{{ route('admin.user.show', $user->id) }}" role="button">Permission</a>
                        <a class="btn btn-primary" href="{{ route('admin.user.show', $user->id) }}" role="button">Roles</a>
                        <a class="btn btn-warning" href="{{ route('admin.user.destroy', $user->id) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure?">Delete</a>
                        
                      </td>
                      </tr>
                   @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-Mail</th>
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
