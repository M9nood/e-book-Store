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
        $id = $_GET["id"];
        $sql = "delete from book where Book_id = '$id'";
        mysql_query($sql,$con) or die("ERROR");
        mysql_close($con);
        header("location:book.php");
?>
