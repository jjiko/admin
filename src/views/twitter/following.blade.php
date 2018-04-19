<div class="row">
    <div class="col-md-12">
        <h2>Following back ({{ count($followingBack) }})</h2>
        <p>Not following back ({{ count($following) }})</p>
        <table class="table table-condensed">
            <tr>
                <th>Whitelist</th>
                <th>&nbsp;</th>
                <th>Screen name</th>
                <th>Status</th>
                <th>Following</th>
                <th>Followers</th>
                <th>Statuses</th>
            </tr>
            @foreach($followingBack as $user)
            <?php $extra = json_decode($user->extra); ?>
                <tr>
                    <td>
                        <input data-id="{{ $user->id }}" type="checkbox" name="whitelist">
                    </td>
                    <td><img src="{{ $user->profile_image_url }}"></td>
                    <td><a href="//twitter.com/{{$user->screen_name}}"
                           target="_blank">{{ "@" }}{{ $user->screen_name }}</a>
                    </td>
                    <td data-long-text="{{ $user->last_status_text }}">
                        {{ $user->last_status_created_at }}<br>
                        <abbr title="{{ $user->last_status_text }}">{{ substr($user->last_status_text, 0, 50) }}</abbr>
                    </td>
                    @if($user->following_count > 2000)
                        <td style="color: red">
                            {{ $user->following_count }}
                        </td>
                    @else
                        <td>
                            {{ $user->following_count }}
                        </td>
                    @endif
                    @if($user->followers_count < 500)
                        <td style="color: orange">
                            {{ $user->followers_count }}
                        </td>
                    @else
                        <td>
                            {{ $user->followers_count }}
                        </td>
                    @endif
                    @if($extra->statuses_count < 100)
                        <td style="color: red">
                            {{ $extra->statuses_count }}
                        </td>
                    @else
                        <td>
                            {{ $extra->statuses_count }}
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
    <div class="col-md-12">
        <h2>Not following back ({{ count($following) }})</h2>
        <table class="table table-condensed">
            <tr>
                <th>&nbsp;</th>
                <th>screen_name</th>
                <th>last status</th>
                <th>followers</th>
                <th>following</th>
                <th>comments</th>
            </tr>
            @foreach($following as $user)
                <tr>
                    <td><img src="{{ $user->profile_image_url }}"></td>
                    <td>
                        <a href="//twitter.com/{{$user->screen_name}}"
                           target="_blank">{{ "@" }}{{ $user->screen_name }}</a>
                    </td>
                    <td>
                        {{ $user->last_status_created_at }}<br>
                        {{ $user->last_status_text }}
                    </td>
                    <td>{{ $user->followers_count }}</td>
                    <td>{{ $user->following_count }}</td>
                    <td>
                        {{ $user->comments }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@include('admin::twitter.trashed')

@push('sidebars.3')
    @include('admin::twitter.whitelist')
@endpush