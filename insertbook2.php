<?php
	session_start();
	@ini_set('display_errors', '0');

	if (!isset($_SESSION["user"]))
	{
		?>
		<script>alert("คุณไม่มีสิทธิ์เข้าถึงส่วนนี้");
		location="admin.html";</script>
		<?php
	}
		$host = "localhost";
		$user = "root";
		$pass = "";
		$dbname = "bookstore";

		$con = mysql_connect($host,$user,$pass);
		if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูล bookstore ได้");
        $sql = "select Book_id from book";
        $result = mysql_query($sql,$con);
        $num = mysql_num_rows($result);
		$count =0;
		while($rs = mysql_fetch_array($result)) {
		if (++$count == $num) {
			$id = $rs["Book_id"];
		}
		}
		$id++;
		$name = $_POST["bookname"];
		$type = $_POST["type"];
		$author = $_POST["author"];
		date_default_timezone_set('Asia/Bangkok');
		$date = date('Y-m-d');
		$cost = $_POST["cost"];
		$amount = $_POST["num"];
		$filename = $_FILES["ImageFile"]["name"];
    	copy($_FILES["ImageFile"]["tmp_name"],"pics/book/$filename");
    	$view = 0;
    	$sale = 0;
    	$sql = "INSERT INTO `book` (`Book_id`, `Book_name`, `type_id`, `author`, `Book_date`, `Book_cost`, `Book_num`, `picture`, `view`, `sale_out`) VALUES ('$id', '$name', '$type', '$author', '$date', '$cost', '$amount', '$filename', '$view', '$sale')";
    	mysql_query($sql,$con) or die("ERROR");
    	mysql_close($con);
    	header("location:book.php");
?>
