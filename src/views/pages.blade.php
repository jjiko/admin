<form>
    <input type="text" name="title" placeholder="title">
    <input type="text" name="description" placeholder="description">
    <input type="text" name="slug" placeholder="slug">
    <select name="category">
        @foreach($categories as $category)
            <option>{{ $category->name }}</option>
        @endforeach
    </select>
    <select name="method">
        <option value="DELETE">DELETE</option>
        <option value="GET" selected>GET</option>
        <option value="POST">POST</option>
        <option value="PUT">PUT</option>
    </select>
</form>