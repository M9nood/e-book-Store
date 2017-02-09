<?php
  session_start();
  @ini_set('display_errors', '0');
  
?>
<meta charset="UTF-8">
<?php
  $email = $_POST['email'];
  $error_email = 1;

  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "bookstore";

  $conn = mysql_connect($host,$user,$pass);
  if(!$conn) die ("ไม่สามารถติดต่อ mysql ได้");
  mysql_select_db ($dbname, $conn) or die ("ไม่สามารถเลือกฐานข้อมูล bookstore ได้");
  mysql_query("SET NAMES UTF8");

  $sql = "SELECT * FROM member";
  $result = mysql_query($sql,$conn);

  while($rs = mysql_fetch_array($result)){
    if($rs[4] == $email){
      $show_name = $rs[1];
      $show_lastname = $rs[2];
      $show_pass = $rs[5];
      $error_email = 0;
      break;
    }
  }
  if($error_email == 1){
    ?>
    <script>
       location="Forget_password.php?error_email=<?php echo $error_email;?>";
     </script>
    <?php
  }
  else if($error_email == 0){
    ?>
    <script>
       location="show_password.php?show_name=<?php echo $show_name;?>&show_lastname=<?php echo $show_lastname;?>&show_pass=<?php echo $show_pass;?>";
     </script>
    <?php
  }

?>
