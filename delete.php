<?php


$id = $_GET['id'];

$con=  mysql_connect('localhost','root','');
  echo "connected";  

mysql_select_db("donation");
$d="delete from login where id=$id";
mysql_query($d);

header('location:adminsearch.php');