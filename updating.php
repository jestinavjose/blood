<?php
session_start();
$id=$_SESSION['id'];
echo $id;
$con = mysql_connect('localhost', 'root', '')or die("unable to connect");

    mysql_select_db("donation");
    
    $n = $_POST['name'];
    
    echo $n;
    $a = $_POST['address'];
    $d = $_POST['district'];    
    $ph = $_POST['phone'];    
    
    $pwd = $_POST['pass'];    
    
     $update_r= "update register set name='$n',address='$a',district='$d',phone=$ph where fkid='$id'";
     $ur=  mysql_query($update_r);
         
      
     $update_l= "update login set password='$pwd' where id='$id'";
     $ul=  mysql_query($update_l);
 
 if($ur)
{
    echo" updated register";
}
else {
    echo "reg faied";
}

if($ul)
{
    echo "updatd login";
}
 else {
    echo "login failed";
 }
     
 

header('location:index.php');
  