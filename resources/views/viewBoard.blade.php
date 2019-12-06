@extends('master')



@section('body')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<h1>상세보기</h1>
<div id='board'>
    <button onclick="location.href='/modify/{{$board->id}}'">수정</button>
    <button onclick="location.href='/delete/{{$board->id}}'">삭제</button>
  <table>
    <tr>
      <td>제목 : <td>
      <td>{{$board->title}}</td>
    </tr>
    <tr>
      <td>내용 : <td>
      <td>{{$board->content}}</td>
    </tr>
  </table>
</div>
<hr>
<!--댓글-->
<div id='comment'>
  <span>댓글</span>
  <ol>
    @foreach ($comments as $comment)
    <li>{{$comment->user_id}} : {{$comment->contents}} <button onclick="location.href='/comment/delete/{{$comment->id}}'">삭제</button></li>
    @endforeach
  </ol>
</div>
<hr>
<!-- 댓글등록 폼 -->
<form class="form" action="/comment/insert" method="post">
  @csrf
  <div class="form-group">
  <label for="content"><b>작성자 : {{ session('name') }}</b></label>
  <textarea class="form-control" row="2" id="content" name="content"></textarea>
  <input type="hidden" name="board_id" value="{{$board->id}}">
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary">댓글등록</button>
  </div>
</form>


@endsection
