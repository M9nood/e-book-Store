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
	$id = $_GET["id"];

	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "bookstore";

		$con = mysql_connect($host,$user,$pass);
		if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูล bookstore ได้");
        $sql = "SELECT book_id,num_book FROM `list_order` WHERE Order_id = '$id'";
        $result = mysql_query($sql,$con);
        while ($rs = mysql_fetch_array($result)) {
        	$sid = $rs["book_id"];
        	$sql2 = "SELECT Book_num,sale_out from book where book_id = '$sid'";
        	$result2 = mysql_query($sql2,$con);
        	while ($rs2 = mysql_fetch_array($result2)) {
        		$newnum = $rs2["Book_num"]-$rs["num_book"];
        		$newsale = $rs2["sale_out"]+$rs["num_book"];
        		$sql3 = "update book set Book_num = '$newnum',sale_out = '$newsale' where book_id = '$sid'";
        		mysql_query($sql3,$con) or die ("ERROR");
        	}
        }
        $sql = "update ordering set status = 'y' where Order_id = '$id'";
        mysql_query($sql,$con) or die ("ERROR");
        mysql_close($con);
        header("location:order.php");
?>
