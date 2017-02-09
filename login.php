<!DOCTYPE html>
<html >
  <head><title>Log in</title>
    <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="formCss.css">


  </head>

  <body>
  <?php
  @ini_set('display_errors', '0');
  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "bookstore";
  $sub = $_POST['login'];
  session_start();

  if($_SESSION['email'] != ""){
header("Location:home.php");
  }else{
?>
<form action="login.php" method="post" >
   <div class="login-card"  >
    <h1>Log-in</h1><br>
  <form>
    <input type="text" name="user" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="login">
  </form>

  <div class="login-help">
    <a href="register.php">Register</a> • <a href="Forget_password.php">Forgot Password</a>
  </div>



    </form>
    <?php
if($sub != null){
    $email = $_POST['user'];
  $password = $_POST['password'];
  $conn = mysql_connect($host,$user,$pass);
    if(!$conn) die ("ไม่สามารถติดต่อ mysql ได้");

      mysql_select_db ($dbname, $conn) or die ("ไม่สามารถเลือกฐานข้อมูล bookstore ได้");

      $sql = "select  * from member where email='".$email."' and password ='".$password."'";
       mysql_query("SET NAMES UTF8");
      $result = mysql_query($sql,$conn);
      if($rs = mysql_fetch_array($result)){
          $username = $rs['email'];


          $_SESSION['user'] = $rs['name']."  ".$rs['lastname'];
           $_SESSION['user_id'] = $rs['member_id'];
          header("Location:home.php");
      }
      else{
        echo "<br> <div class='login-help'><font color='red' >ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</font></div></div>";
      }
      mysql_close();

}

}

?>

  </body>
</html>
