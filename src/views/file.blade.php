<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
</style>
<form action="/admin/upload" enctype="multipart/form-data" method="POST">
    <div class="row">
        <div class="col-md-12">
            <h2>CDN Upload</h2>
            <div class="btn-group">
                <label class="btn btn-default btn-file">
                    Browse &hellip; <input type="file" name="image" style="display: none">
                </label>
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>
    </div>
</form>