<!doctype html>
<html>
<head>

</head>
<body>
@include('header.header')
  <h1>로그인폼</h1>
  <hr>
  <form method="post" action="/login">
    @csrf
    <label for="insertEmail">email</label>
    <input type="text" name="email" id="insertEmail"><br>
    <label for="insertPW">PW</label>
    <input type="password" name="password" id="insertPW"><br>
    <button type="submit">Login</button>
  </form>

</body>
</html>
