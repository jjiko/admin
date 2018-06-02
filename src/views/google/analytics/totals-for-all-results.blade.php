@foreach($results->getTotalsForAllResults() as $metricName => $metricTotal)
Metric Name  = {{ $metricName }}
Metric Total = {{ $metricTotal }}
@endforeach