<table class="table">
    @foreach($data->structures as $structure)
        <tr>
            <td>{{ $structure->name }}</td>
            <td>{{ $structure->away }}</td>
        </tr>
    @endforeach
</table>
@foreach($data->devices as $deviceType => $deviceList)
    <h2>{{ $deviceType }}</h2>
    <table class="table">
        @foreach($deviceList as $device)
            @if($deviceType == "thermostats")
                <tr>
                    <td>{{ $device->name }}</td>
                    <td>{{ $device->target_temperature_f }}</td>
                </tr>
            @elseif($deviceType == "cameras")
                <tr data-device-id="{{ $device->device_id }}">
                    <td>
                        {{ $device->name }}<br>
                        <img class="img-responsive" src="{{ $device->snapshot_url }}">
                    </td>
                    <td>
                        online: {{ $device->is_online ? "yes" : "no" }}<br>
                        streaming: {{ $device->is_streaming ? "yes" : "no" }}<br>
                        public: {{ $device->is_public_share_enabled ? "yes" : "no" }}
                    </td>
                    <td><a href="{{ $device->web_url }}">URL</a></td>
                    <td><a href="{{ $device->public_share_url }}" target="_blank">Public URL</a></td>
                </tr>
            @endif
        @endforeach
    </table>
@endforeach