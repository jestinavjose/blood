<?php
session_start();

$u=$_POST['user'];
$p=$_POST['pass'];

$con=  mysql_connect('localhost','root','')or die("unable to connect");
  
mysql_select_db("donation");
$q=mysql_query("select * from login where username='".$u."'  and password='".$p."' ") or die(mysql_error());
$res=  mysql_num_rows($q);

if($u=='admin')
{
    header('location:adminhome.php');
    
}
 else {
    


if($res) 
{
    
    session_start();
    $id=mysql_fetch_row($q);
    $_SESSION["id"]=$id[0];
    
 header('location:s.php');
}
else
{
    
  echo'not valid';
 header('location:index.php?flag=0');//flag=0 fail
  
}
 }