<html>
<head><title>User Login</title></head>
<body>
    <center><h3>Login</h3></center>
    <form action="{{url("user_login")}}" method="get">
        {{ csrf_field() }}
        <input name="gmail" placeholder="Mail">
        <input name="password" placeholder="Password" >
        <button type="submit">Enter</button>
    </form>
</body>
</html>