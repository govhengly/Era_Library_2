<html>
<head>
    <title>User Form</title>
</head>
<body>
    <form action="{{url("user_register")}}" method="get">
        {{ csrf_field() }}
        <input name="firstname" placeholder="First Name">
        <input name="lastname" placeholder="Last Name">
        <input name="tel" placeholder="Telephone">
        <input name="gmail" placeholder="Mail">
        <input name="password" placeholder="Password" type="password" >
        <button type="submit">Enter</button>
    </form>
</body>
</html>