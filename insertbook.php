<?php
  session_start();
  @ini_set('display_errors', '0');

?>
<html lang="en">
<link rel="shortcut icon" type="image/x-icon" href="pics/icon.ico">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการสินค้า e-BOOK Store</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


<?php
  if (!isset($_SESSION["user"]))
  {
    ?>
    <script>alert("คุณไม่มีสิทธิ์เข้าถึงส่วนนี้");
    location="admin.html";</script>
    <?php
  }
?>

<body>
  <center><h3>ยินดีต้อนรับเข้าสู่ระบบ Admin</h3>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header" style="width:70px; " >
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="adminpage.php" style="font-size:14px;">หน้าแรก</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav"  >
        <li class ="active" style="width:100px; " ><a  class="navbar-brand" href="book.php" style="font-size:14px;">จัดการหนังสือ</a></li>
       <li  style="width:100px; " ><a  class="navbar-brand" href="member.php" style="font-size:14px;">จัดการสมาชิก</a></li>
       <li  style="width:100px; " ><a  class="navbar-brand" href="order.php" style="font-size:14px;">การสั่งซื้อ</a></li>
       <li  style="width:100px; " ><a  class="navbar-brand" href="adminout.php" style="font-size:14px;">ออกจากระบบ</a></li>
      </ul>

    </div>
  </div>
</nav><!-- End  NAV -->



	<?php
		$host = "localhost";
		$user = "root";
		$pass = "";
		$dbname = "bookstore";

		$con = mysql_connect($host,$user,$pass);
		if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูล bookstore ได้");
        $sql2 = "select * from booktype";
        $result2 = mysql_query($sql2,$con);
        ?>
        <br><br>

         <div class="container">
            <div class="row">
                <div class="col-md-12">
        <div class="panel panel-info">
        <div class="panel-heading">
        <h1>เพิ่มสินค้า</h1>
         </div>
         <div class="panel-body">
        <form enctype="multipart/form-data" action="insertbook2.php" method="post">
        <div class="form-group">
        <table bgcolor="dddfff" style="padding-top:30px;">
                <tr>
                <td>ชื่อหนังสือ</td>
                <td><input type="text" size="70" name="bookname"></td>
                </tr>
                 <tr>
                <td>ประเภท</td>
                <td><select name="type">
                <?php while ($rs2 = mysql_fetch_array($result2))
                {
                ?>
                <option value="<?phpecho $rs2["type_id"];?>"
                <?phpif ($rs2["type_id"] == $rs["type_id"]) {
                        echo " selected";
                }?>><?phpecho $rs2["type_name"];?></option>
                <?php
                }
                ?>
                </select>
                </td>
                </tr>
                <tr>
                <td>ชื่อผู้แต่ง</td>
                <td><input type="text" size="70" name="author"></td>
                </tr>

                <tr>
                <td>ราคา</td>
                <td><input type="text" size="10" name="cost"></td>
                </tr>
                <tr>
                <td>จำนวน</td>
                <td><input type="text" size="5" name="num"></td>
                </tr>
                <tr>
                <td>รูปภาพ</td>
                <td>
                <input type="file" name="ImageFile" size="300"></td>
                </tr>
                <tr align=center>
                        <td colspan="2">
                        <input type="submit" value="เพิ่ม" name="submit">
                        <input type="reset" value="ยกเลิก" name="reset   "></td>
                </tr>
        </table>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>






   <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>
