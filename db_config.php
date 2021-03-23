<?php
$con = mysqli_connect("localhost","dailyfre_xiaoouwang","Fred871113,","dailyfre_projet");
// $con = mysqli_connect("localhost","root","root","projet");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $con->query('SET NAMES utf8');
?>
