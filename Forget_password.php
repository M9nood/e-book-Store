<?php
  session_start();
  @ini_set('display_errors', '0');

?>
<!DOCTYPE html>
<html>
<head>
<title>Forget Password</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="formCss.css">
</head>
<body>
<?php
  $error_email = $_GET['error_email'];
?>
  <form action="check_password.php" method="post">
  <div class="login-card" style="width : 550px">
    <h1>Do you forget password ?</h1><br>
    <h2>Please enter your email to receive password</h2>
  <form>
    <input type="text" name="email" placeholder="E-mail">
    <input type="submit" name="submit" class="login login-submit" value="submit">
</form>
<?php
  if($error_email == 1){
    echo "<br> <div class='login-help'><font color='red' >กรุณากรอกอีเมลให้ถูกต้อง</font></div>";
  }
?>
</body>
</html>
