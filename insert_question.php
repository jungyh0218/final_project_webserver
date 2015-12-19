<?php
	
	$conn = mysqli_connect("localhost", "knucsewiki", "log102338", "knucsewiki") or
		die("Cannot connect to SQL Server");
	
	$json = json_decode(file_get_contents('php://input'), true);
	
	//make query
	$sql = "insert into `questions`(`question_id`, `title`, `content`, `questioner`, `upload_date`, `vote`) values(NULL, '".addslashes($json['title'])."', '".addslashes($json['content'])."', ".$json['questioner'].", CURRENT_TIMESTAMP, 0);";
	//echo $sql;
	//session_start();
	$result = mysqli_query($conn, $sql);
	if($result){
		$val = '{"status" : "TRUE"}';
	}else{
		$val = $sql;
	}
	echo $val;
	mysql_close($conn);
	
	
?>