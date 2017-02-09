<?php
	session_start();
	@ini_set('display_errors', '0');

	if (!isset($_SESSION['user'])){
						?>
						<script>location="login.php"</script>
						<?php
	}
$host = "localhost";
$user = "root";
$pass = "";
$db   = "bookstore";
    $con = mysql_connect($host,$user,$pass);
        if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($db, $con) or die ("ไม่สามารถเลือกฐานข้อมูล bookstore ได้");
	$id = $_SESSION['user_id'];
	$sql = "select order_id from ordering";
	$result  =mysql_query($sql,$con);
	$num = mysql_num_rows($result);
	$count =0;
	while($rs = mysql_fetch_array($result)) {
		if (++$count == $num) {
			$orderid = $rs["order_id"];
		}
	}
	$ids=str_split($orderid);
	$length=strlen($orderid);
	for ($n=0;$n<$length;$n++) {
		if ($n == ($length-1)) {
			if ($ids[$n] == 9) {
				if ($ids[$n-1] == 9) {
					if ($ids[$n-2] == 9) {
						if ($ids[$n-3] == 9){
							if($ids[$n-4] == 9) {
								if ($ids[$n-5] == 9) {

									$ids[$n-5]=0;
									$ids[$n-4]=0;
									$ids[$n-3]=0;
									$ids[$n-2]=0;
									$ids[$n-1]=0;
									$ids[$n]=0;
									$ids[$n]+=1;
								} else {
									$ids[$n-5]+=1;
									$ids[$n-4]=0;
									$ids[$n-3]=0;
									$ids[$n-2]=0;
									$ids[$n-1]=0;
									$ids[$n]=0;
								}
							} else {
								$ids[$n-4]+=1;
								$ids[$n-3]=0;
								$ids[$n-2]=0;
								$ids[$n-1]=0;
								$ids[$n]=0;
							}
						} else {
							$ids[$n-3]+=1;
							$ids[$n-2]=0;
							$ids[$n-1]=0;
							$ids[$n]=0;
						}
					}else{
						$ids[$n-2]+=1;
						$ids[$n-1]=0;
						$ids[$n]=0;
					}
				} else {
					$ids[$n-1]+=1;
					$ids[$n]=0;
				}
			} else {
				$ids[$n]+=1;
			}
		}
	}
	$neworder=implode("",$ids);
	if ($neworder!=null && $id!=null) {
	date_default_timezone_set('Asia/Bangkok');
	$date = date('Y-m-d');
	$sql = "insert into ordering(order_id,order_date,member_id,status) values ('$neworder','$date','$id','n')";
	mysql_query($sql,$con) or die("ไม่สามารถบันทึกลงฐานข้อมูลได้");
		for ($a=1;$a<=$_SESSION["line"];$a++) {
		$sql ="select list from list_order";
		$result = mysql_query($sql,$con);
		$num2 = mysql_num_rows($result);
		$c =0;
			while($rs = mysql_fetch_array($result)) {
				if (++$c == $num2) {
				$listid = $rs["list"];
				}
			}
		$listid+=1;
		$sql = "insert into list_order(list,order_id,book_id,num_book) values ('$listid','$neworder','".$_SESSION['id'][$a]."','".$_SESSION['qty'][$a]."')";
		mysql_query($sql,$con) or die("ไม่สามารถบันทึกลงฐานข้อมูลได้");
		}
		header("Location:home.php");
		$_SESSION["line"] = 0;
	}
	mysql_close($con);
?>
