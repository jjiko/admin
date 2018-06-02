@foreach($results->getColumnHeaders() as $header)
    <pre>
Column Name       = {{$header->getName()}}
Column Type       = {{$header->getColumnType()}}
Column Data Type  = {{$header->getDataType()}}
</pre>
@endforeach