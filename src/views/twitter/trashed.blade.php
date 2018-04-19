<div class="row" hidden>
    <div class="col-md-6">
        <h2>Trashed ({{ count($trashed) }})</h2>
        <table class="table table-condensed">
            @foreach($trashed as $user)
                <tr>
                    <td>
                        <a href="//twitter.com/{{$user->screen_name}}"
                           target="_blank">{{ "@" }}{{ $user->screen_name }}</a>
                    </td>
                    <td>
                        {{ (new \Carbon\Carbon($user->deleted_at))->format("m-d-Y") }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>