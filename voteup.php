<?php
	$conn = mysqli_connect("localhost", "knucsewiki", "log102338", "knucsewiki") or die("Cannot connect to SQL Server");

	//make query
	$sql = "SELECT * FROM `question_vote` where `question_idx`=".$_GET['question_id']." and `members_idx`=".$_GET['memberIdx'];
	
	$result = mysqli_query($conn, $sql);
	$row_num = mysqli_num_rows($result);
	//echo $row_num;
	if($row_num){
		echo '{"status" : "Duplicated"}';
	}else{
		$sql = "UPDATE `questions` SET `vote` = `vote` + 1 WHERE question_id=".$_GET['question_id'];
		$result = mysqli_query($conn, $sql);
		$sql = "INSERT INTO `question_vote` VALUES(".$_GET['question_id'].", ".$_GET['memberIdx'].")";
		$result = mysqli_query($conn, $sql);
		if(!$result){
			echo '{"status": "ERROR"}';
		}else{
			echo '{"status" : "OK"}';
		}
	}
	//$sql = "UPDATE `questions` SET `vote` = `vote` + 1 WHERE `question_id`=".$_GET['question_id'];
	//$result = mysqli_query($conn, $sql);
	
?>