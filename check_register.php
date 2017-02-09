<?php
  session_start();
  @ini_set('display_errors', '0');
?>
<meta charset="UTF-8">
<?php
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$pass_con = $_POST['pass_con'];
$address = $_POST['address'];
$error = 0;
$error_name;
$error_phone;
$error_email;
$error_pass;
$error_add;

if($name == null || $lastname == null){
  $error = 1;
  $error_name = 1;
}
if(strlen((string)$phone) < 10){
  $error = 1;
  $error_phone = 1;
}
if(strpos($email,"@") == false || strpos($email,".com") == false){
  $error = 1;
  $error_email = 1;
}
if($password != $pass_con || $password == null){
  $error = 1;
  $error_pass = 1;
}
if($address == null){
  $error = 1;
  $error_add = 1;
}
if($error == 1){
?>
  <script>
     location="register.php?error=<?php echo $error;?>&error_name=<?php echo $error_name;?>&error_phone=<?php echo $error_phone;?>&error_email=<?php echo $error_email;?>&error_pass=<?php echo $error_pass;?>&error_add=<?php echo $error_add;?>";
   </script>
<?php
}
else if($error == 0){
  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "bookstore";

  $conn = mysql_connect($host,$user,$pass);
  if(!$conn) die ("ไม่สามารถติดต่อ mysql ได้");
  mysql_select_db ($dbname, $conn) or die ("ไม่สามารถเลือกฐานข้อมูล bookstore ได้");
  mysql_query("SET NAMES UTF8");

  $sql = "SELECT MAX(member_id) AS id FROM member";
  $result = mysql_query($sql,$conn);
  $stuff = mysql_fetch_assoc($result);
  $stuff = intval($stuff[id]) + 1;
  //echo 'Last record is : '.$stuff;

  $sql = "INSERT INTO member (member_id,name,lastname,phone,email,password,address) VALUES ('".$stuff."','".$name."','".$lastname."','".$phone."','".$email."','".$password."','".$address."')";
  mysql_query($sql,$conn) or die("เกิดความผิดพลาดในการใส่ข้อมูลลง DB");
  //echo $sql;
  $_SESSION['user'] = $name  ."  ".$lastname;
  $_SESSION['user_id'] = $stuff;
?>
  <script>
     location="Welcome_register.php?name=<?php echo $name?>&lastname=<?php echo $lastname?>&email=<?php echo $email;?>&pass=<?php echo $password;?>";
   </script>
<?php
}
?>
