<?php

	$conn = mysqli_connect("localhost", "knucsewiki", "log102338", "knucsewiki") or die("Cannot connect to SQL Server");

	//make query
	$sql = "SELECT * FROM `answers` WHERE `question_id`= ".$_GET['question_id'];
	//echo $sql;
	$result = mysqli_query($conn, $sql);

	$ret = "no data";
	//echo $ret;
	if($result){
		$data_row = mysqli_fetch_array($result);
		$sql = "SELECT `id` from `members` where idx = ".$data_row[answerer].";";	
		//echo $sql;
		$result2 = mysqli_query($conn, $sql);
		$data_row2 = mysqli_fetch_array($result2);
		$ret = "[";
		$ret .= "{";
		$ret .= '"question_id" :"'.$data_row[question_id].'",';
		$ret .= '"title" : "'.stripslashes($data_row[title]).'",';
		$ret .= '"content" :"'.stripslashes($data_row[content]).'",';
		$ret .= '"answerer" :"'.$data_row2[id].'",';
		$ret .= '"upload_date" :"'.$data_row[upload_date].'",';
		$ret .= '"vote" :"'.$data_row[vote].'"}';

		while($data_row = mysqli_fetch_array($result)){
			$sql = "SELECT `id` from `members` where `idx`=".$data_row[answerer].";";	
			$result2 = mysqli_query($conn, $sql);
			$data_row2 = mysqli_fetch_array($result2);
			$ret .= ", {";
			$ret .= '"question_id" :"'.$data_row[question_id].'",';
			$ret .= '"title" : "'.stripslashes($data_row[title]).'",';
			$ret .= '"content" :"'.stripslashes($data_row[content]).'",';
			$ret .= '"answerer" :"'.$data_row2[id].'",';
			$ret .= '"upload_date" :"'.$data_row[upload_date].'",';
			$ret .= '"vote" :"'.$data_row[vote].'"}';
		}
		$ret .= "]";
	}
	echo $ret;
	
	mysqli_close($conn);

?>