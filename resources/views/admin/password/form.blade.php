{!! Form::open(array('route' => $route, 'method' => $method)) !!}

<div class="form-group">
    <label for="name">New Password</label>
    <input type="text" name="password" value="{{ old('password') }}" class="form-control" />
</div>
<div class="form-group">
    <label for="slug">Confirm Password</label>
    <input type="text" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control">
</div>

<button type="submit" class="btn btn-success">Reset Password</button>
