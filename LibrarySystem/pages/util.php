<?php
	function connect(){
		$conn=mysqli_connect("127.0.0.1","root","95luohui","elibrary");
		// $conn=mysqli_connect("127.0.0.1","root","","elibrary");
		mysqli_set_charset( $conn, 'utf8');
		if (!$conn) {

		    echo "Error: Unable to connect to MySQL." . PHP_EOL;
		    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}
		return $conn;
	}
	// mysqli_close($conn);
?>