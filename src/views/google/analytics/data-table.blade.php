@if(count($results->getRows()) > 0)
    <table class="table table-condensed">
        <tr>
            @foreach ($results->getColumnHeaders() as $header)
                <th>{{ $header->name }}</th>
            @endforeach
        </tr>
        @foreach($results->getRows() as $row)
            <tr>
                @foreach ($row as $cell)
                    <td>
                        {!! htmlspecialchars($cell, ENT_NOQUOTES) !!}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </table>
@else
    <p>No Results Found.</p>
@endif