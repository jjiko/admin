@section('styles')
    @parent
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.1/croppie.min.css"/>
@stop

<input type="file" id="upload" value="Choose a file" accept="image/*">
<div class="upload-demo-wrap" style="height:600px">
    <div id="upload-demo"></div>
</div>
<button class="upload-result">Save</button>
