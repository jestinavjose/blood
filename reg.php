<?php

$con = mysql_connect('localhost', 'root', '');
if ($con) {
    echo "connected";
    mysql_select_db("donation");

    $n = $_POST['name'];
    $a = $_POST['address'];
    $d = $_POST['district'];
    $g = $_POST['gender'];
    $ph = $_POST['phone'];
    $bg = $_POST['blood'];
    $u = $_POST['user'];
    $pwd = $_POST['pass'];

    $inl = "insert into login(username,password)values('$u','$pwd')";
    mysql_query($inl);

    $s = "select max(id) from login";
    $fk = mysql_query($s);

    $tmp = mysql_fetch_array($fk);
   $id = $tmp[0];
   
   $inr = "insert into register(name,address,district,gender,phone,blood,fkid) values ('$n','$a','$d','$g',$ph,'$bg','$id')";
    mysql_query($inr);
    if ($inr) {
        echo "inserted in to register";
    }
header('location:index.php');
}