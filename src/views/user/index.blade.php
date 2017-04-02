<nav>
    <a class="btn btn-default" href="{{ route('roles') }}">Roles</a>
    <a class="btn btn-default" href="{{ route('permissions') }}">Permissions</a>
</nav>
<table class="table">
    @foreach(Jiko\Auth\User::all() as $user)
        <tr>
            <td>
                {{ $user->id }}
            </td>
            <td>
                {{ $user->name }}
            </td>
            <td>
                {{ $user->email }}
            </td>
            <td>
                {{ $user->updated_at }}
            </td>

        </tr>
    @endforeach
</table>
