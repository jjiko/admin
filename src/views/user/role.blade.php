<h2>{{ $role_user->name }} &lt;{{ $role_user->email }}&gt;</h2>
<form action="{{ route('user_roles', [$role_user->id]) }}" method="post">
<div class="row">
    @foreach(\Jiko\Auth\Role::all() as $role)
        <div class="col-md-3">
            <label>
                @if($role_user->hasRole($role->name))
                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" checked>
                @else
                    <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                @endif
                {{ $role->display_name }}
            </label>
        </div>
    @endforeach
</div>
    <button class="btn btn-success">Save</button>
</form>