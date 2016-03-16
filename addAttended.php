<?php

	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	$classID = $obj['ClassID'];
	$studentID = $obj['StudentID'];



	$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
	mysql_select_db('agile');
	

	mysql_query('CALL insertAttended('.$classID.','.$studentID.')',$db);

	mysql_close($db);

?>