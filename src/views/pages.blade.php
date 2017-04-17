<table class="table">
    <tr>
        <th>Uri</th>
        <th>Name</th>
        <th>Title</th>
        <th>Public</th>
    </tr>
    @foreach ($pages as $page)
        <tr>
            <td>{{ $page->uri() }}</td>
            <td>{{ $page->getName() }}</td>
            <td></td>
            <td><input type="checkbox"></td>
        </tr>
    @endforeach
</table>

<form>
    <input type="text" name="title" placeholder="title">
    <input type="text" name="description" placeholder="description">
    <input type="text" name="slug" placeholder="slug">
    <select name="category"></select>
    <select name="method">
        <option value="DELETE">DELETE</option>
        <option value="GET" selected>GET</option>
        <option value="POST">POST</option>
        <option value="PUT">PUT</option>
    </select>
</form>