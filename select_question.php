<?php

	$conn = mysqli_connect("localhost", "knucsewiki", "log102338", "knucsewiki") or die("Cannot connect to SQL Server");

	//make query
	$sql = "SELECT * FROM `questions` WHERE `title` like '%".$_GET['keyword']."%'";
	$result = mysqli_query($conn, $sql);

	$ret = "no data";
	if($result){
		$data_row = mysqli_fetch_array($result);		
		$ret = "[";
		ret .= "{";
		ret .= '"title" : "'.$data_row[title].'"}';

		while($data_row = mysqli_fetch_array($result)){
			ret .= ", {";
			ret .= '"title" : "'.$data_row[title].'"}';
		}
		ret .= "]";
	}
	echo $ret;

	mysqli_close($conn);

?>
