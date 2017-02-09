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


        $id = $_POST["id"];
        $sql = "select picture from book where Book_id = '$id'";
        $result = mysql_query($sql,$con);
        $name = $_POST["bookname"];
        if ($_FILES["ImageFile"]["name"] == null) {
       		while ($rs = mysql_fetch_array($result)) {
    			$filename = $rs["picture"];
    		}
    	} else {
    		$filename = $_FILES["ImageFile"]["name"];
    		copy($_FILES["ImageFile"]["tmp_name"],"pics/book/$filename");
    	}

        $author = $_POST["author"];
        $cost = $_POST["cost"];
        $type = $_POST["type"];
        $amount = $_POST["num"];
        $sql = "update book set Book_name='$name',picture = '$filename',author = '$author',Book_cost = '$cost',type_id='$type',Book_num='$amount' where Book_id = '$id'";
        mysql_query($sql,$con) or die("ERROR");
        mysql_close($con);
        header("location:book.php");
?>
