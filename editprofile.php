<?php
session_start();
@ini_set('display_errors', '0');

?>
<meta charset="utf-8">
<?php

    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $add =$_POST['address'];
    $phone =$_POST['phone'];

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db   = "bookstore";
    $con = mysql_connect($hostname,$username,$password);
        if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($db, $con) or die ("ไม่สามารถเลือกฐานข้อมูล bookstore ได้");

        	$sql = "update member set name='".$name."' , lastname='".$lname."' , phone='".$phone."',address='".$add. "' where member_id='".$_SESSION['user_id']."' ";
        	 $_SESSION['user'] = $name."  ".$lname;
        	mysql_query($sql,$con) or die("UPDATE ลงตาราง book มีข้อผิดพลาดเกิดขึ้น".mysql_error());
        	header("Location:profile.php");


?>
