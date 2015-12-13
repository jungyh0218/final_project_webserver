<?php
	
	$conn = mysqli_connect("localhost", "knucsewiki", "log102338", "knucsewiki") or
		die("Cannot connect to SQL Server");
	
	
	//make query
	$sql = "select * from `members` where `id` = '".$_GET['id']."'".
		" and `password` = '".$_GET['password']."';";
	//session_start();
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$data = $row[0];
	if($data){
		$outp = '{
			"status" : "OK",
			 "id" : "'.$row[id].'",'.
		' "password" : "'.$row[password].'"}'; 
		echo $outp;
	}else{
		echo "no data";
	}
	
	mysql_close($conn);
	
	
?>