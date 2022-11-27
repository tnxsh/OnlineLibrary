<?php
$conn = mysqli_connect('localhost', 'root', '', 'new_library');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

