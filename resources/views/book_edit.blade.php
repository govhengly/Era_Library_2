<html>
<head>
    <title>Book Form</title>
</head>
<body>
<form action="{{route('book_update', [$id])}}" method="post">
    {{csrf_field()}}
    <input name="title" placeholder="Title" value="{{$book->title}}">
    <input name="category" placeholder="Category" value="{{$book->category}}">
    <input name="type" placeholder="Type" value="{{$book->type}}">
    <input name="author" placeholder="Author" value="{{$book->author}}">
    <button type="submit">Sumbit</button>

</form>
</body>
</html>