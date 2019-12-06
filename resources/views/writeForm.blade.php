@extends('master')

@section('head')

<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
@endsection

@section('body')

<!-- 드랍존js -->


<form action="/board/insert" method="post">
  @csrf
  <label for="title">제목 : </label>
  <input type="text" id="title" name="title" required><br>
  <label for="content">내용 : </label>
  <textarea row="2" id="content" name="content"></textarea><br>
  <button type="submit">글 등록</button>
</form>
<br>
<span>첨부파일</span>
<form action="/file-upload" method="post" class="dropzone">
  <div class="fallback">
    <input name="file" type="file" multiple />
  </div>
</form>

@endsection
