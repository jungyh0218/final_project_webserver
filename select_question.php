<?php

	$conn = mysqli_connect("localhost", "knucsewiki", "log102338", "knucsewiki") 
	or die("Cannot connect to SQL Server");

	//make query
	$sql = "SELECT * FROM `questions` WHERE `title` like '%".$_GET['keyword']."%'";
	//echo $sql;
	$result = mysqli_query($conn, $sql);

	$ret = "no data";
	//echo $ret;
	
	if(mysqli_num_rows($result) != 0){
		$data_row = mysqli_fetch_array($result);
		$sql = "SELECT `id` from `members` where idx = ".$data_row[questioner].";";	
		//echo $sql;
		$result2 = mysqli_query($conn, $sql);
		$data_row2 = mysqli_fetch_array($result2);
		$ret = "[";
		$ret .= "{";
		$ret .= '"question_id" :"'.$data_row[question_id].'",';
		$ret .= '"title" : "'.addslashes($data_row[title]).'",';
		$ret .= '"content" :"'.addslashes($data_row[content]).'",';
		$ret .= '"questioner" :"'.$data_row2[id].'",';
		$ret .= '"upload_date" :"'.$data_row[upload_date].'",';
		$ret .= '"vote" :"'.$data_row[vote].'"}';

		while($data_row = mysqli_fetch_array($result)){
			$sql = "SELECT `id` from `members` where `idx`=".$data_row[questioner].";";	
			$result2 = mysqli_query($conn, $sql);
			$data_row2 = mysqli_fetch_array($result2);
			$ret .= ", {";
			
			$ret .= '"question_id" :"'.$data_row[question_id].'",';
			$ret .= '"title" : "'.addslashes($data_row[title]).'",';
			$ret .= '"content" :"'.addslashes($data_row[content]).'",';
			$ret .= '"questioner" :"'.$data_row2[id].'",';
			$ret .= '"upload_date" :"'.$data_row[upload_date].'",';
			$ret .= '"vote" :"'.$data_row[vote].'"}';
		}
		$ret .= "]";
	}
	echo $ret;
	
	mysqli_close($conn);

?>
