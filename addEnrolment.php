<?php
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	$studID = $obj['StudentID'];
	$modID = $obj['ModuleID'];

	$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
	mysql_select_db('agile');

	mysql_query('CALL insertEnrolment('.$studID.','.$modID.')',$db);
	//mysql_query('CALL insertEnrolment(1,2)',$db);

	mysql_close($db);

?>