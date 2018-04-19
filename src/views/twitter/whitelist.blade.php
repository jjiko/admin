<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Whitelist ({{ count($whitelist) }})</h2>
            <table class="table table-condensed">
                @foreach($whitelist as $user)
                    <tr>
                        <td>
                            <img src="{{ $user->profile_image_url }}">
                        </td>
                        <td>
                            {{ $user->followed_by ? "☑️️" : "☒" }} <a href="//twitter.com/{{$user->screen_name}}"
                                                                      target="_blank">{{ "@" }}{{ $user->screen_name }}</a><br>
                            {{ $user->last_status_created_at }}<br>
                            {{ $user->last_status_text }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>