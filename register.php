<?php
  session_start();
  @ini_set('display_errors', '0');
  $_SESSION['error'];
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="formCss.css">
</head>
<body>
  <?php
    $sub = $_POST['submit'];
    $error = $_GET['error'];
    $error_name = $_GET['error_name'];
    $error_phone = $_GET['error_phone'];
    $error_email = $_GET['error_email'];
    $error_pass = $_GET['error_pass'];
    $error_add = $_GET['error_add'];
  ?>
<form action="check_register.php" method="post">
  <div class="login-card" >
  <h1>Register</h1><br>
  <form>
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="lastname" placeholder="Last Name">
    <input type="text" name="phone" placeholder="Phone" maxlength="10">
    <input type="text" name="email" placeholder="E-mail">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="pass_con" placeholder="Confirm Password">
    <textarea row="3" placeholder="Address" name="address"></textarea>
    <input type="submit" name="submit" class="login login-submit" value="submit">
    <!-- <input type="reset" class="login login-submit" value="clear"> -->
</form>
<?php
  if($error == 1){
    if($error_name == 1) echo "<br> <div class='login-help'><font color='red' >กรุณากรอกชื่อและนามสกุล</font></div>";
    if($error_phone == 1) echo "<br> <div class='login-help'><font color='red' >กรุณากรอกเบอร์โทรศัพท์ให้ถูกต้องให้ถูกต้อง</font></div>";
    if($error_email == 1) echo "<br> <div class='login-help'><font color='red' >กรุณากรอกอีเมลให้ถูกต้อง</font></div>";
    if($error_pass == 1) echo "<br> <div class='login-help'><font color='red' >กรุณากรอกรหัสผ่านให้ถูกต้อง</font></div>";
    if($error_add == 1) echo "<br> <div class='login-help'><font color='red' >กรุณากรอกที่อยู่</font></div>";
  }
?>
</body>
</html>
