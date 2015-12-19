<?php
	
	$conn = mysqli_connect("localhost", "knucsewiki", "log102338", "knucsewiki") or
		die("Cannot connect to SQL Server");
	
	
	//make query
	$sql = "INSERT INTO `members` VALUES(NULL, '".$_GET['id']."', '".$_GET['password']."', 0);";
	//echo $sql;
	//session_start();
	$result = mysqli_query($conn, $sql);
	if($result){
		echo '{"status" : "TRUE"}';
	}else{
		echo "no data";
	}
	
	mysql_close($conn);
	
	
?>