@extends('master')



@section('body')
<form action="/modify/{{$board->id}}" method="post">
  @csrf
  <label for="title">제목 : </label>
  <input type="text" id="title" name="title" required value="{{$board->title}}"><br>
  <label for="content">내용 : </label>
  <textarea row="2" id="content" name="content">{{$board->content}}</textarea><br>
  <button type="submit">글 등록</button>
</form>
@endsection
