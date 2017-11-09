<?php
	header("Content-type: text/html; charset=utf-8");
	date_default_timezone_set('Asia/Shanghai');
	require_once('../util.php');
	if($_GET){
		$conn = connect();
		$name = $_GET['uname'];
		$book_id = $_GET['book_id'];
		$date = date('Y-m-d',time());
		$sql = "select date from borrow_book where book_id = $book_id";
		$rr = mysqli_query($conn,$sql);
		$row = $rr->fetch_array();
		$b_date = $row[0];

		$sql = "select name,contributor from book where id = $book_id";
		$rrs = mysqli_query($conn,$sql);
		$row_name = $rrs->fetch_array();
		$book_name = $row_name[0];
		$contributor = $row_name[1];

		$sql = "insert into return_book values ('','$name','$contributor',$book_id,'$book_name','$b_date','$date',1)";
		// $update = "update book set status = 1 where id = $book_id and status = 0";
		$delete = "delete from borrow_book where book_id = $book_id";
		
		$result = mysqli_query($conn,$sql);
		// mysqli_query($conn,$update);
		mysqli_query($conn,$delete);
		if($result>0){
			echo "<script> alert('还书请求已发送！')</script> ";
		}
		// header('location:book.php');
		echo "<meta http-equiv=refresh content='0; url=borrow.php'>";
		mysqli_close($conn);
	}
?>