<?php
	header("Content-type: text/html; charset=utf-8");
	date_default_timezone_set('Asia/Shanghai');
	require_once('../control/booklist.php');
	if($_GET){
		$name = $_GET['uname'];
		$book_id = $_GET['book_id'];
		$contributor = query_column('book','contributor','id',$book_id);

		$date = date('Y-m-d',time());
		$sql = "insert into borrow_book values ('','$name','$contributor',$book_id,'$date',1)";
		// $notice_sql = "insert into notice values ('','$book_id','$contributor','$name','$date',0)";
		$update = "update book set status = 0 where id = $book_id and status = 1";
		$conn = connect();
		$result = mysqli_query($conn,$sql);
		mysqli_query($conn,$update);
		// mysqli_query($conn,$notice_sql);
		mysqli_close($conn);
		if($result>0){
			echo "<script> alert('借阅请求已发送！')</script> ";
		}
		// header('location:book.php');
		echo "<meta http-equiv=refresh content='0; url=book.php'>";
		
	}
?>