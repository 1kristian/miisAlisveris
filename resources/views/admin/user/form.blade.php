{!! Form::open(array('route' => $route, 'method' => $method)) !!}

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name',  isset($user->name) ? $user->name : null) }}" class="form-control" />
</div>
<div class="form-group">
    <label for="slug">E-Mail</label>
    <input type="text" name="email" value="{{ old('slug',  isset($user->email) ? $user->email : null) }}" class="form-control">
</div>

<button type="submit" class="btn btn-success">Submit</button>
