<html>
<head>
    <title>Register_Form</title>
</head>
<body>
<form action="{{ url("admin_register") }}" method="get">
    {{ csrf_field() }}
    <textarea name="username" placeholder="username"></textarea>
    <textarea name="password" placeholder="password"></textarea>
    <button type="submit">Sumbit</button>
</form>
</body>
</html>