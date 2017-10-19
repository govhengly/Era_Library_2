<html>
<head>
    <title>Register_Form</title>
</head>
<body>
<form action="{{ url("admin_register") }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="photo" id="photo">
    <textarea name="username" placeholder="username"></textarea>
    <textarea name="password" placeholder="password"></textarea>
    <button type="submit">Sumbit</button>
</form>
</body>
</html>