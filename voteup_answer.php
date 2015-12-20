<?php
	$conn = mysqli_connect("localhost", "knucsewiki", "log102338", "knucsewiki") or die("Cannot connect to SQL Server");

	//make query
	$sql = "SELECT * FROM `answer_vote` where `answer_idx`=".$_GET['answer_id']." and `members_idx`=".$_GET['memberIdx'];
	
	$result = mysqli_query($conn, $sql);
	$row_num = mysqli_num_rows($result);
	//echo $row_num;
	if($row_num){
		echo '{"status" : "Duplicated"}';
	}else{
		$sql = "UPDATE `answers` SET `vote` = `vote` + 1 WHERE answer_id=".$_GET['answer_id'];
		$result = mysqli_query($conn, $sql);
		$sql = "INSERT INTO `answer_vote` VALUES(".$_GET['answer_id'].", ".$_GET['memberIdx'].")";
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