<?php
	require_once('../util.php');
	date_default_timezone_set('Asia/Shanghai');
	function list_book(){

		$conn = connect();
		mysqli_set_charset( $conn, 'utf8');
		$sql = "select * from book";
		$result = mysqli_query($conn,$sql);
		// $row = $result->fetch_array();
		// echo mysqli_character_set_name($conn);
		mysqli_close($conn);

		return $result;
	}

	function list_mybook($uname){

		$conn = connect();
		mysqli_set_charset( $conn, 'utf8');
		$sql = "select * from book where contributor='$uname'";
		$result = mysqli_query($conn,$sql);
		// $row = $result->fetch_array();
		// echo mysqli_character_set_name($conn);
		mysqli_close($conn);

		return $result;
	}

	function query_book($book_id)
	{
		$conn = connect();
		$sql = "select * from book where id=$book_id";
		$result = mysqli_query($conn,$sql);
		$row = $result -> fetch_array();
		mysqli_close($conn);

		return $row;
	}

	function search_book($kind ,$what)
	{
		$conn = connect();
		$sql = "select * from book ";
		if($kind == "name" ){
			$sql = $sql." where name like '%$what%'";
		}else if ($kind == "author"){
			$sql = $sql." where author like '%$what%'";
		}else if($kind == "cate"){
			$sql = $sql." where cate like '%$what%'";
		}else if($kind == "borrow"){
			$sql = $sql." where status = 0";
		}else if($kind == "return"){
			$sql = $sql." where status = 1";
		}

		$result = mysqli_query($conn,$sql);
		mysqli_close($conn);

		return $result;
	}

		function search_mybook($kind ,$what,$uname)
	{
		$conn = connect();
		$sql = "select * from book where contributor='$uname' and ";
		if($kind == "name" ){
			$sql = $sql." name like '%$what%'";
		}else if ($kind == "author"){
			$sql = $sql." author like '%$what%'";
		}else if($kind == "cate"){
			$sql = $sql." cate like '%$what%'";
		}else if($kind == "borrow"){
			$sql = $sql." status = 0";
		}else if($kind == "return"){
			$sql = $sql." status = 1";
		}

		$result = mysqli_query($conn,$sql);
		mysqli_close($conn);

		return $result;
	}

	function borrow_history($uname)
	{	
		$conn = connect();
		$res = array();
		$sql = "select * from borrow_book where username = '$uname' order by date desc";
		$result = mysqli_query($conn,$sql);
		$i = 0 ;
		if ($result){


		while( $row = $result->fetch_array() ){
			$res[$i]['book_id'] = $row['book_id'];
			$res[$i]['date'] = $row['date'];
			$res[$i]['contributor'] = $row['contributor'];
			if ( ((int)$row['status']) == 0 ){
				$res[$i]['status'] = "在读";
			}else{
				$res[$i]['status'] = "处理中";
			}
			
			
			$book_id = $row['book_id'];
			$sql = "select * from book where id=$book_id";
			$book_res =  mysqli_query($conn,$sql);
			$book_row = $book_res->fetch_array();
			$res[$i]['book_name'] = $book_row['name'];
			$res[$i]['author'] = $book_row['author'];
			$i++;
		}
		}
		mysqli_close($conn);
		return $res;

	}

	function return_list($uname)
	{
		$conn = connect();
		$sql = "select * from return_book where username = '$uname'";
		$result = mysqli_query($conn,$sql);
		mysqli_close($conn);
		if(! $result){
			exit;
		}
		return $result;
	}
	// var_dump(list_book());
	//
	function user_list($is_admin){
		$conn = connect();
		$sql = "select * from user where is_admin = $is_admin";
		$result = mysqli_query($conn,$sql);
		mysqli_close($conn);
		if(! $result){
			exit;
		}
		return $result;
	}
	function user_search($is_admin,$kind,$what){
		$conn = connect();
		$sql = "select * from user where is_admin=$is_admin and ";
		if($kind == "name"){
			$sql = $sql."username like '%$what%'";
		}else if($kind=="phone"){
			$sql = $sql."no_telp like '%$what%'";
		}
		$result = mysqli_query($conn,$sql);
		mysqli_close($conn);
		if(! $result){
			exit;
		}
		return $result;
	}

	function borrow_list_all()
	{
		$conn = connect();
		$res = array();
		$sql = "select * from borrow_book where status=0 order by date desc";
		$result = mysqli_query($conn,$sql);
		$i = 0 ;
		if ($result){


		while( $row = $result->fetch_array() ){
			$res[$i]['username'] = $row['username'];
			$res[$i]['book_id'] = $row['book_id'];
			$res[$i]['date'] = $row['date'];
			$res[$i]['contributor'] = $row['contributor'];
			
			$book_id = $row['book_id'];
			$sql = "select * from book where id=$book_id";
			$book_res =  mysqli_query($conn,$sql);
			$book_row = $book_res->fetch_array();
			$res[$i]['book_name'] = $book_row['name'];
			$res[$i]['author'] = $book_row['author'];
			$i++;
		}
		}
		mysqli_close($conn);
		return $res;
	}

	function return_list_all()
	{
		$conn = connect();
		$sql = "select * from return_book where status=0 order by date desc";
		$result = mysqli_query($conn,$sql);
		mysqli_close($conn);
		if(! $result){
			exit;
		}
		return $result;		
	}

	function return_list_find($what)
	{
		$conn = connect();
		$sql = "select * from return_book where status = 0 book_name like '%$what%' order by date desc";
		$result = mysqli_query($conn,$sql);
		mysqli_close($conn);
		if(! $result){
			exit;
		}
		return $result;
	}

	function borrow_list_find($what)
	{
		$conn = connect();
		$res = array();
		$sql = "select * from borrow_book where status = 0 order by date desc";
		$result = mysqli_query($conn,$sql);
		$i = 0 ;
		if ($result){


		while( $row = $result->fetch_array() ){
			$res[$i]['username'] = $row['username'];
			$res[$i]['book_id'] = $row['book_id'];
			$res[$i]['date'] = $row['date'];
			$res[$i]['contributor'] = $row['contributor'];
			
			$book_id = $row['book_id'];
			$sql = "select * from book where id=$book_id and name like '%$what%'";
			$book_res =  mysqli_query($conn,$sql);

			$book_row = $book_res->fetch_array();
			if($book_row == NULL){
				exit;
			}
			$res[$i]['book_name'] = $book_row['name'];
			$res[$i]['author'] = $book_row['author'];
			$i++;
		}
		}
		mysqli_close($conn);
		return $res;
	}

	function list_comments($book_id)
	{
		$conn = connect();
		$sql = "select username,datetime,content from comments where book_id=$book_id order by datetime desc";
		$result = mysqli_query($conn,$sql);
		mysqli_close($conn);
		if(! $result){
			exit;
		}
		return $result;
	}

	function add_comments($uname,$book_id,$book_name,$content)
	{
		$conn = connect();
		$datetime = date("Y-m-d H:i:s",time());
		$sql = "insert into comments values('','$uname',$book_id,'$book_name','$datetime','$content')";
		$result = mysqli_query($conn,$sql);
		mysqli_close($conn);
		return $result;
	}

	function query_phone_address($uname)
	{
		$conn = connect();
		$sql = "select no_telp,alamat from user where username='$uname'";
		$result = mysqli_query($conn,$sql);
		mysqli_close($conn);
		if(! $result){
			exit;
		}
		$row = $result -> fetch_array();
		return $row;
	}

	function query_column($table,$column,$col_v,$book_id)
	{
		$conn = connect();
		$sql = "select $column from $table where $col_v=$book_id";
		// echo $sql;
		$result = mysqli_query($conn,$sql);
		mysqli_close($conn);
		if(! $result){
			exit;
		}
		$row = $result -> fetch_array();
		return $row[$column];
	}

	function query_row($table,$row,$row_v,$value)
	{
		$conn = connect();
		$sql = "select $row from $table where $row_v=$value";
		// echo $sql;
		$result = mysqli_query($conn,$sql);
		mysqli_close($conn);
		if(! $result){
			exit;
		}
		return $result;
	}

	function quet_str($str)
	{
		return "'".$str."'";
	}
?>