<!doctype html>
<html>
<head>
@yield('head')
</head>
<body>
@include('header.header')
<hr>
@include('sidebar.side')
<hr>
@yield('body')
<p>시발 body</p>
</body>
</html>
