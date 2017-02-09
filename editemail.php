<?php
session_start();
@ini_set('display_errors', '0');

?>
<meta charset="utf-8">
<?php
    $id =$_POST['id'];
    $email = $_POST['email'];
    $pass =$_POST['password'];
    $con_pass =$_POST['confirm_pass'];

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db   = "bookstore";
    $con = mysql_connect($hostname,$username,$password);
        if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($db, $con) or die ("ไม่สามารถเลือกฐานข้อมูล bookstore ได้");
        if($pass != $con_pass){
        	header("Location:profile.php?err_email=1");
        }
        else{
        	$sql = "update member set email='".$email."' , password='".$pass."' where member_id='".$_SESSION['user_id']."' ";
        	mysql_query($sql,$con) or die("INSERT ลงตาราง book มีข้อผิดพลาดเกิดขึ้น".mysql_error());
        	header("Location:profile.php");
        }

?>
