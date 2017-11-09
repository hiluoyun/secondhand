<?php
	header("Content-type: text/html; charset=utf-8");
	date_default_timezone_set('Asia/Shanghai');
	require_once('../util.php');
	if($_GET){
		$name = $_GET['uname'];
		$book_id = $_GET['book_id'];
		$sql = "delete from book where id=$book_id and status=1";
		$conn = connect();
		$result = mysqli_query($conn,$sql);
		mysqli_close($conn);
		if($result>0){
			echo "<script> alert('下架图书成功！')</script> ";
		}else{
			echo "<script> alert('下架图书失败，可能图书已经借出！')</script> ";
		}
		// header('location:book.php');
		echo "<meta http-equiv=refresh content='0; url=mybook.php'>";
		
	}
?>