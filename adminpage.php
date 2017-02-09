
<?/*
  session_start();
*/
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
       <li  style="width:100px; " ><a  class="navbar-brand" href="order.php" style="font-size:14px;">การสั่งซื้อ</a></li>
       <li  style="width:100px; " ><a  class="navbar-brand" href="adminout.php" style="font-size:14px;">ออกจากระบบ</a></li>
      </ul>

    </div>
  </div>
</nav><!-- End  NAV -->


<div class="container">
            <div class="row">
                <div class="col-md-4">
                  <div class="jumbotron" ">
                    <h1 style="font-size:36px; ">จัดการหนังสือ</h1>
                    <p>จัดการข้อมูลหนังสือ  เพิ่ม แก้ไข ลบ ปรับเปลี่ยนราคา</p>
                    <p><a class="btn btn-primary btn-lg" href="book.php">ดูรายละเอียด</a></p>
                  </div>
              </div>
              <div class="col-md-4">
                <div class="jumbotron" >
                <h1 style="font-size:36px; ">จัดการสมาชิก</h1>
                <p>จัดการเกี่ยวกับข้อมูลสมาชิก  ลบข้อมูล เช็คสถานะ</p>
                <p><a class="btn btn-primary btn-lg" href="member.php">ดูรายละเอียด</a></p>
              </div>
              </div>
              <div class="col-md-4">
                <div class="jumbotron" >
                <h1 style="font-size:36px; ">การสั่งซื้อ</h1>
                <p>ดูการสั่งซื้อสิค้า และจัดส่งสินค้า</p>
                <p><a class="btn btn-primary btn-lg" href="order.php">ดูรายละเอียด</a></p>
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
