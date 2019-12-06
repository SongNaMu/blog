<div id='header'>
  <a href="/">hombutton</a>
</div>
<script>
<?php
  $message = session('message');
  if(isset($message)){
?>
    alert('{{$message}}');
<?php
  }
?>
</script>
<?php
$name = session('name');
if(isset($name)){
  echo "<b>" . $name . "</b>님 어서오세요";
}
?>
