<h2>Create permission</h2>
<form action="{{ route('permission') }}" method="post">
    <label>Name</label>
    <input class="form-control" name="name">

    <label>Display Name</label>
    <input class="form-control" name="display_name">

    <label>Description</label>
    <input class="form-control" name="description">

    <button class="btn btn-success">Save</button>
</form>

<h2>Update existing permission</h2>
<div class="row">
    @foreach(\Jiko\Auth\Permission::all() as $permission)
        <div class="col-md-2">{{ $permission->display_name }}</div>
    @endforeach
</div>

<h2>Assign permission to role</h2>
@foreach(\Jiko\Auth\Role::all() as $role)
    <a href="{{ route('role_permissions', [$role->id]) }}" class="btn btn-default">{{ $role->display_name }}</a>
@endforeach