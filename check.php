<?php
	session_start();
	@ini_set('display_errors', '0');
	
	$_SESSION["user"] = "admin";
	$_SESSION["pass"] = "admin";
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	if ($user == $_SESSION["user"] && $pass == $_SESSION["pass"]) {
		header("location:adminpage.php");
	} else {
		?>
		<script>alert("คุณไม่มีสิทย์เข้าถึงส่วนนี้");
		location="admin.html";</script>
		<?php
	}
?>
