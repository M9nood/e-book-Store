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
       <li  style="width:100px; " ><a  class="navbar-brand" href="member.php" style="font-size:14px;">จัดการสมาชิก</a></li>
       <li   class ="active" style="width:100px; " ><a  class="navbar-brand" href="order.php" style="font-size:14px;">การสั่งซื้อ</a></li>
       <li  style="width:100px; " ><a  class="navbar-brand" href="adminout.php" style="font-size:14px;">ออกจากระบบ</a></li>
      </ul>

    </div>
  </div>
</nav><!-- End  NAV -->


	<?php
                    $idorder=$_GET['id'];
		$host = "localhost";
		$user = "root";
		$pass = "";
		$dbname = "bookstore";

		$con = mysql_connect($host,$user,$pass);
		if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูล bookstore ได้");
$sql = "SELECT * FROM list_order L join ordering O on L.Order_id=O.order_id  join book B on L.Book_id=B.Book_id where O.order_id='".$idorder."'";

        $result = mysql_query($sql,$con);
        $num = 1;
        ?>
        <center> <h1> รายการสั่งซื้อ</h1><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
        <table class="table table-striped table-hover ">
        <tr class="warning">
                      <th align=center>รายการที่</th>
                      <th></th>
                      <th align=center>ชื่อหนังสือ</th>
                      <th align=center>จำนวน</th>
                       <th align=center>ราคา</th>
        </tr>
         <?php
                  $list=1;
                  $total=0;
                    while ($rs = mysql_fetch_array($result)) {
                  ?>
                    <tr>
                      <td  align=center  width=100><?php echo $list;?></td>
                      <td><?php  echo "<img src='pics/book/".$rs['picture']."' height=40 width=40>";?> </td>
                      <td><a><?php echo $rs["Book_name"];?></a></td>
                      <td><?php echo $rs["num_book"] ;?></td>
                       <td><?php echo $rs['num_book']*$rs['Book_cost'].'.00' ;?></td>
                    </tr>
                    <?php
                    $total+= $rs['num_book']*$rs['Book_cost'];
                    $list++;
                    }
                    ?>

                </table>
                </div>
                <div class="col-lg-5 col-lg-offset-8">
                                 <?php  echo '<center><h4>รวมทั้งสิ้น : <font color=#A0a0a0 style="font-size:36px;">' .$total. '.00</font> บาท<br><br>
                                 '; ?>
                    สถานะ : <font color=33CC00 style="font-size:22px;"><?php
                     $result2 = mysql_query("select status from ordering where order_id='".$idorder."'",$con);
                     if($rs = mysql_fetch_array($result2)){
                    if($rs['status']=="y") echo"จัดส่งเรียบร้อบเเล้ว"; else  echo 'รอการจัดส่ง <br><a href="ordercheck.php?id='.$idorder.'" ><input type="submit" value="ส่งสินค้า" >';  }?></font></h4></center>
                    <hr>
                 </div>
                <!---  จบ ฟอร์มแสดง รรายละเอียด-->
                <?php
        mysql_close($con);
	?>

	</center>
        	</div>
                </div>
                </div>
</body>
</html>
