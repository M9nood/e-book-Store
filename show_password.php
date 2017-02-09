<?php
  session_start();
  @ini_set('display_errors', '0');

?>
<?php
  $name = $_GET['show_name'];
  $lastname = $_GET['show_lastname'];
  $password = $_GET['show_pass'];
?>
<html>
<head>
  <title>Show Password</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="formCss.css">
</head>
<body>
  <form action="login.php" method="post">
  <div class="login-card" style="width : 550px">
    <h1>This is your password</h1><br>
    <h2>Please keep it carefully</h2>
    <center>คุณ<?phpecho $name;?>&nbsp;&nbsp;<?phpecho $lastname;?></center><br>
    รหัสผ่านของคุณคือ&nbsp;<?phpecho $password;?><br><br>
    <center><input type="button"  class="login login-submit" value="Log in" onclick="location.href='login.php'"></center>
  </div>
  </form>
</body>
</html>
