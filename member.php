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
        <li  style="width:100px; " ><a  class="navbar-brand" href="book.php" style="font-size:14px;">จัดการหนังสือ</a></li>
       <li class ="active" style="width:100px; " ><a  class="navbar-brand" href="member.php" style="font-size:14px;">จัดการสมาชิก</a></li>
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

        $sql = "select * from member";
        $result = mysql_query($sql,$con);
        $num = 1;
        ?>
<center> <h1> รายการสมาชิก</h1><br>
       <div class="container">
            <div class="row">
                <div class="col-md-12">
        <table class="table table-striped table-hover ">
        <tr align="center" class="success">
        	<td>ลำดับที่</td>
        	<td>รหัสสมาชิก</td>
        	<td>ชื่อ</td>
        	<td>นามสกุล</td>
        	<td>เบอร์โทรศพท์</td>
        	<td>อีเมล</td>
        	<td width=150>ที่อยู่</td>
        	<td>ลบ</td>
        </tr>
        <?php
        while ($rs = mysql_fetch_array($result)) {
        ?>
        <tr align="center">
        	<td><?php echo $num;?></td>
        	<td><?php echo $rs["member_id"];?></td>
        	<td><?php echo $rs["name"];?></td>
        	<td><?php echo $rs["lastname"];?></td>
        	<td><?php echo $rs["phone"];?></td>
        	<td><?php echo $rs["email"];?></td>
                <td><?php echo $rs["address"];?></td>
        	<td><a href="deletemem.php?id=<?phpecho $rs["member_id"];?>">ลบ</a></td>
        </tr>
        <?php
        $num++;
        }
        mysql_close($con);
	?>
		</table>
	</center>
        </div>
        </div>
        </div>

</body>
</html>
