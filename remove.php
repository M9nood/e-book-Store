<?php
	session_start();
	@ini_set('display_errors', '0');

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db   = "bookstore";
    $con = mysql_connect($hostname,$username,$password);
        if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($db, $con) or die ("ไม่สามารถเลือกฐานข้อมูล bookstore ได้");

	$id = $_GET["id"];
	$sql = "select book_cost from book where book_id='$id'";
	$result = mysql_query($sql,$con);
	while($rs = mysql_fetch_array($result)) {
		$price = $rs["book_cost"];
	}
	for ($a = 1;$a<=$_SESSION["line"];$a++) {
		if ($id == $_SESSION["id"][$a]) {
			if ($a == $_SESSION["line"]) {
				$_SESSION["amount"] = $_SESSION["amount"]-$_SESSION["qty"][$a];
				$_SESSION["price"] = $_SESSION["price"]-($price*$_SESSION["qty"][$a]);
				$_SESSION["line"] = $_SESSION["line"]-1;
				header("location:cart.php");
			} else {
				$temp;
				$temp = $_SESSION["id"][$a];
				$_SESSION["id"][$a] = $_SESSION["id"][$a+1];
				$_SESSION["id"][$a+1] = $temp;
				$temp2;
				$temp2 = $_SESSION["qty"][$a];
				$_SESSION["qty"][$a] = $_SESSION["qty"][$a+1];
				$_SESSION["qty"][$a+1] = $temp2;
				$_SESSION["amount"] = $_SESSION["amount"]-$_SESSION["qty"][$a+1];
				$_SESSION["price"] = $_SESSION["price"]-($price*$_SESSION["qty"][$a+1]);
				$_SESSION["line"] = $_SESSION["line"]-1;;
				header("location:cart.php");
			}
		}
	}
?>
