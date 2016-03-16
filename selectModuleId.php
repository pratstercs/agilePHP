<?php
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);
	$modName = $obj['ModuleName'];

	$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
	mysql_select_db('agile');

	$modQuery = "select ModuleID from module where ModuleName=" .$modName. ;
	
	$modResult = mysql_query($modQuery,$db);

	mysql_close;
	
	$result = array();

	while($row = mysql_fetch_array($modResult)){
	//	echo $row['ModuleID'];
	//	echo "testing...";
		array_push($result, $row['ModuleID']);
	}
	
	echo json_encode($result);

?>