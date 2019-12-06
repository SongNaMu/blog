<div>
<ul>
<li>게시판</li>
<?php
$name = session('name');
if(isset($name)){
?>
  <li><a href="/logout"><button>logout</button></a></li>
  <li><a href="/writeForm">글쓰기</a></li>
<?php
}else {
?>
  <li><a href="/login"><button>login</button></a></li>
  <li><a href="/register"><button>register</button></a></li>
<?php
}
?>
</ul>
</div>
