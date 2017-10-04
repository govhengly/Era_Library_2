<html>
<head><title>List Book</title></head>
<body>
<table style="border: 1px solid ">
    <thread>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Type</th>
            <th>author</th>
        </tr>
    </thread>
    <tbody>
    @foreach($books as $library)
        <form action="{{route('book_edit', [$library->id])}}" method="post">
            {{csrf_field()}}
            <tr>
                <td>{{$library->title}}</td>
                <td>{{$library->category}}</td>
                <td>{{$library->type}}</td>
                <td>{{$library->author}}</td>
                <td><button type="submit">edit</button></td>
            </tr>
        </form>
    @endforeach
    </tbody>
</table>
</body>
</html>