<html>
<head>
    <title>Book Form</title>
</head>
<body>
<form action="{{url("book_register")}}" method="get">
    {{csrf_field()}}
    <input name="title" placeholder="Title">
    <input name="category" placeholder="Category">
    <input name="type" placeholder="Type">
    <input name="author" placeholder="Author">
    <button type="submit">Sumbit</button>

</form>
</body>
</html>