<?php
	header("Content-type: text/html; charset=utf-8");
	date_default_timezone_set('Asia/Shanghai');
	require_once('../util.php');
	if($_GET){
		$name = $_GET['uname'];

		$sql = "delete from user where username = '$name'";
		$conn = connect();
		$result = mysqli_query($conn,$sql);
		if($result>0){
			echo "<script> alert('删除成功！')</script> ";
		}
		// header('location:book.php');
		echo "<meta http-equiv=refresh content='0; url=member.php'>";
		mysqli_close($conn);
	}
?>