<br>
<div class="btn-group">
    <!--
<div id="wishlistSyncResponse" class="alert" hidden></div>
<form id="wishlistSync" action="/admin/sync/wishlist" method="get" data-forms-ajax="true" data-response-type="selector" data-response-selector="#wishlistSyncResponse">
    <button class="btn btn-default" type="submit">Sync Wishlist</button>
</form>
-->
    <a class="btn btn-default" href="/admin/pages">Manage Pages</a>
    <a class="btn btn-default" href="/admin/gaming">Gaming</a>
    <a class="btn btn-default" href="/admin/teamspeak">TeamSpeak</a>
    <a class="btn btn-default" href="/admin/upload">CDN Upload</a>
</div>

<div class="row">
    <div class="col-md-12">
        @include('admin::file')
    </div>
</div>