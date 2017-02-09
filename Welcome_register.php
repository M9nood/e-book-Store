<?php
  session_start();
  @ini_set('display_errors', '0');
?>
<?php
  $name = $_GET['name'];
  $lastname = $_GET['lastname'];
  $email = $_GET['email'];
  $password = $_GET['pass'];

?>
<html>
<head>
  <title>..Welcome..</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="formCss.css">
</head>
<body>
  <div class="login-card" style="width : 500px">
  <h1>Welcome</h1><br>
  <h2>Register Successful !!</h2><br>
  <center>คุณ<?php echo $name;?>&nbsp;&nbsp;<?php echo $lastname;?><br>
  ได้รับการสมัครสมาชิกเรียบร้อยแล้ว</center><br>
  Username : <?php echo $email;?><br>
  Password : <?php echo $password;?><br><br><br>
  <center><input type="button"  class="login login-submit" value="เข้าชมเว็บไซต์" onclick="location.href='home.php'"></center>

</div>
</body>
</html>
