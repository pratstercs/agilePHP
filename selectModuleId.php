<?php
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);

	$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
	mysql_select_db('agile');

	$modQuery = "select ModuleID from module";
	
	$modResult = mysql_query($modQuery,$db);

	mysql_close;

	while($row = mysql_fetch_array($modResult)){
		echo $row['ModuleID'];
	}

?>