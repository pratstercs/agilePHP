<?php
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);

	$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
	mysql_select_db('agile');

	$studQuery = "select StudentID from student";
	
	$studResult = mysql_query($studQuery,$db);

	mysql_close;

	while($row = mysql_fetch_array($studResult)){
		echo $row['StudentID'];
	}

?>