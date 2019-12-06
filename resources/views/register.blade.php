<!doctype html>
<html>
<head>

</head>
<body>
@include('header.header')
  <h1>회원가입 폼</h1>
  <hr>
  <form method="post" action="/register">
    @csrf
    <label for="insertName">name</label>
    <input type="text" name="name" id="insertName"><br>
    <label for="insertEmail">email</label>
    <input type="text" name="email" id="insertEmail"><br>
    <label for="insertPW">PW</label>
    <input type="password" name="password" id="insertPW"><br>
    <button type="submit">register</button>
  </form>

</body>
</html>
