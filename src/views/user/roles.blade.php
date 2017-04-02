<h2>Create Role</h2>
<form action="{{ route('role') }}" method="post">
    <label>Name</label>
    <input class="form-control" name="name">

    <label>Display Name</label>
    <input class="form-control" name="display_name">

    <label>Description</label>
    <input class="form-control" name="description">

    <button class="btn btn-success">Save</button>
</form>

<h2>Assign role to user</h2>
<table class="table table-condensed">
    @foreach(\Jiko\Auth\User::all() as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @foreach($user->roles as $role)
                    {{ $role->display_name }}<br>
                @endforeach
            </td>
            <td>
                <a class="btn btn-default" href="/admin/user/{{ $user->id }}/roles">Add roles</a>
            </td>
        </tr>
    @endforeach
</table>