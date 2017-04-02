<h2>{{ $role->display_name }}</h2>
<p>{{ $role->description }}</p>
<form action="{{ route('role_permissions', [$role->id]) }}" method="post">
    <div class="row">
        @foreach(\Jiko\Auth\Permission::all() as $perm)
            <div class="col-md-3">
                <label>
                    @if($role->perms->contains('id', $perm->id))
                        <input type="checkbox" name="perms[]" value="{{ $perm->id }}" checked>
                    @else
                        <input type="checkbox" name="perms[]" value="{{ $perm->id }}">
                    @endif
                    {{ $perm->display_name }}
                </label>
            </div>
        @endforeach
    </div>
    <button class="btn btn-success">Save</button>
</form>