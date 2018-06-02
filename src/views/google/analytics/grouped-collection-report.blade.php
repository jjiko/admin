@if(count($groupedCollection) > 0)
    @foreach($groupedCollection->keys() as $key)
        <a href="#{{$key}}" class="btn">{{ $key }}</a>
    @endforeach
    @foreach($groupedCollection as $category => $subresults)
        <a id="{{ $category }}"></a>
        <h2>{{ $category }}</h2>
        <table class="table table-condensed">
            <tr>
              <?php $headers = array_keys($subresults->first()); ?>
                @foreach ($headers as $name)
                    <th>{{ $name }}</th>
                @endforeach
            </tr>
            @foreach($subresults as $row)
                <tr>
                    @foreach ($row as $idx => $cell)
                        <td>
                            @if($idx === "minutesAgo")
                                <time class="timeago">{{ (new \Carbon\Carbon("- ".$cell." minutes"))->diffForHumans() }}</time>
                            @else
                                {{ $cell }}
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </table>
    @endforeach
@else
    <p>No Results Found.</p>
@endif