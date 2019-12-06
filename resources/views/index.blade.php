@extends('master')



@section('body')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<h1>메인</h1>

<div id="boards">
  <table id="boards">
    <th>번호</th>
    <th>제목</th>
    <th>작성자</th>
    <th>조회수</th>
    <!--<th>작성날짜</th>-->
    @foreach ($boards as $board)
      <tr>
        <td>{{ $board->id }}</td>
        <td><a href="/board/{{$board->id}}">{{ $board->title }}</a></td>
        <td>{{ $board->user_id }}</td>
        <td><?php if($board->hit == '')echo '0';?>{{$board->hit}}</td>

      </tr>
    @endforeach
  </table>
  <div class='pagenation'>
    {{ $boards->links()}}
  </div>
</div>
@endsection
