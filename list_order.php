<!DOCTYPE html>
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
    <title>e-BOOK Store</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

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
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db   = "bookstore";
    $con = mysql_connect($hostname,$username,$password);
        if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($db, $con) or die ("ไม่สามารถเลือกฐานข้อมูล bookstore ได้");


?>

</head>
  <body>

    <div class="header-area">

        <div class="container">
            <div class="row">

                <div class="col-md-8">

                </div>

                <div class="col-md-4">
                 <div class="header-right">
                 <ul class="list-unstyled list-inline">
                  <div class="user-menu">
                        <ul>
                             <?php if($_SESSION['user'] != "" || $_COOKIE['user']!=null){ echo  '<li><a href="profile.php"><i class="fa fa-user"></i>คุณ '. $_SESSION['user'].'</a></li>' ;
                             }else echo '<li><a href="#"><i class="fa fa-user"></i>ผู้เยี่ยมชม</a></li>'; ?>

                            <?php if($_SESSION['user'] != "" || $_COOKIE['user']!=null ) echo '  <li><a href="cart.php"><i class="fa fa-user"></i> My Cart</a></li><li><a href="logout.php"><i class="fa fa-user"></i> ออกจากระบบ</a></li>';
                                    else echo '<li><a href="register.php"><i class="fa fa-user"></i> สมัครสมาชิก</a></li><li><a href="login.php"><i class="fa fa-user"></i> เข้าสู่ระบบ</a></li>';
                            ?>
                        </ul>
                    </div>
                    </ul>
                </div>

                </div>
            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="home.php">e-<span>BOOK</span>&nbspstore</a></h1>
                    </div>
                </div>

                  <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">Cart - <span class="cart-amunt"><?phpif (!isset($_SESSION["price"])) {
                                echo "0";
                            } else {
                                echo $_SESSION["price"];
                                }?>.00 ฿</span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php
                        if (!isset($_SESSION["amount"])) {
                                echo "0";
                            } else {
                                echo $_SESSION["amount"];
                                } ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li ><a href="home.php">หน้าแรก</a></li>
                        <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">รายการหนังสือ</a>

                          <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-op"><a href="shop.php" >หนังสือทั้งหมด</a></li>

        <?php
      $sql2 = "select * from booktype";
       mysql_query("SET NAMES UTF8");
      $result = mysql_query($sql2,$con);
       while($rs = mysql_fetch_array($result)){

                        echo '<li class="dropdown-op"><a href="shop.php?type='.$rs[0].'" >'.$rs[1].'</a></li>';
       } //    end while

       ?>
                          </ul>
                        </li>
                        <li><a href="">ข้อมูลหนังสือ</a></li>
                        <li><a href="cart.php">ตะกร้าสินค้า</a></li>
                        <li><a href="checkout.php">การชำระเงิน</a></li>
                        <li><a href="contract.php">ติดต่อเรา</a></li>
                         <li> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</li>

                            <form class="navbar-form navbar-left" role="search" action="shop.php" method="post">
                            <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="ค้นหาหนังสือ">
                            </div>
                            <button type="submit" class="btn btn-default">ค้นหา</button>
                            </form>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>โปรไฟล์</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>  <!--   end title  -->



<?php
$idorder = $_GET['idorder'];
if (!isset($_SESSION['user'])){
                        ?>
                        <script>location="login.php"</script>
                        <?php
}


        $sql = "SELECT * FROM list_order L join ordering O on L.Order_id=O.order_id  join book B on L.Book_id=B.Book_id where O.order_id='".$idorder."'";
        $result2 = mysql_query($sql,$con);
?>



<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <ul class="nav nav-pills nav-stacked">
                        <li><a href="profile.php">แก้ไขประวัติ</a></li>
                          <li class="active"><a href="orderhistory.php">ประวัติการสั่งซื้อ</a></li>
                        </ul>
                    </div>
                </div>
                <h3>รายละเอียดการสั่งซื้อ    เลขที่ <a href="" > <?php echo $idorder;?></a> </h3>
              <!-- //////////////////////////////////    แสดง order    -->
               <div class="col-md-8">
                <table class="table table-striped table-hover ">
                  <thead>
                    <tr class="info">
                      <th align=center>รายการที่</th>
                      <th></th>
                      <th align=center>ชื่อหนังสือ</th>
                      <th align=center>จำนวน</th>
                       <th align=center>ราคา</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $list=1;
                  $total=0;
                    while ($rs = mysql_fetch_array($result2)) {
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
                  </tbody>
                </table>
                </div>
                <div class="col-lg-5 col-lg-offset-8">
                                 <?php  echo '<center><h4>รวมทั้งสิ้น : <font color=#A0a0a0 style="font-size:36px;">' .$total. '.00</font> บาท<br><br>
                                 '; ?>
                    สถานะ : <font color=33CC00 style="font-size:22px;"><?php
                     $result2 = mysql_query("select status from ordering where order_id='".$idorder."'",$con);
                     if($rs = mysql_fetch_array($result2)){
                    if($rs['status']=="y") echo"จัดส่งเรียบร้อบเเล้ว"; else  echo"กำลังจัดส่ง";  }?></font></h4></center>
                    <hr>
                 </div>
                <!---  จบ ฟอร์มแสดง รรายละเอียด-->

            </div>
        </div>
    </div>



<div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>e-<span>Book</span>Store</h2>
                        <p>ทางหลวงจังหวัดหมายเลข 3077 ต.เนินหอม อ.เมืองปราจีนบุรี จ.ปราจีนบุรี 25000</p>
                        <p>เบอร์โทร : 02-277-7222 , 091-332-4554</p>
                        <p>อีเมล : e-bookstore@mail.com</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h3 ><font color=#fff>มุมท่านสมาชิก</font></h3>
                        <ul>

                            <li><a href="login.php">เข้าสู่ระบบ</a></li>
                            <li><a href="register.php">สมัครสมาชิก</a></li>
                            <li><a href="profile.php">บัญชีผู้ใช้</a></li>
                            <li><a href="orderhistory.php">ประวัติการซื้อ</a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h3 ><font color=#fff>ประเภทหนังสือ</font></h3>
                        <ul>
                            <?php
                              $sql2 = "select * from booktype";
                              $result = mysql_query($sql2,$con);
                               while($rs = mysql_fetch_array($result)){

                                                echo '<li ><a href="shop.php?type='.$rs[0].'" >'.$rs[1].'</a></li>';
                               } //    end while

       ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h3 ><font color=#fff>การชำระเงิน</font></h3>
                        <p><img src="pics/payment-icon.png" ></p><br>
                        <h3 ><font color=#fff>การจัดส่ง</font></h3>
                        <p><img src="pics/shipping-icon.png" ></p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 s-Book Store. by Nattawoot S. </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->

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
<?php
   mysql_close($con);
?>
