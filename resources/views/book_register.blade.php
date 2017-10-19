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
    <input name="barcode" placeholder="Bar Code">
    <input name="manager" placeholder="Name of Manager">
    <input name="count" placeholder="Count">
    <input name="year" placeholder="Year">
    <button type="submit">Sumbit</button>

</form>
</body>
</html>