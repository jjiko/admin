<br>
<div class="btn-group">
    <!--
<div id="wishlistSyncResponse" class="alert" hidden></div>
<form id="wishlistSync" action="/admin/sync/wishlist" method="get" data-forms-ajax="true" data-response-type="selector" data-response-selector="#wishlistSyncResponse">
    <button class="btn btn-default" type="submit">Sync Wishlist</button>
</form>
-->
    <a class="btn btn-default" href="/admin/pages">Pages</a>
    <a class="btn btn-default" href="/admin/gaming/go-live">Go live</a>
    <a class="btn btn-default" href="/admin/gaming/stream-preview">Stream preview</a>
    <a class="btn btn-default" href="/admin/teamspeak">TeamSpeak</a>
    <a class="btn btn-default" href="/admin/iris">Blue Iris</a>
</div>

<div class="row">
    <div class="col-md-12">
        @include('admin::file')
    </div>
</div>