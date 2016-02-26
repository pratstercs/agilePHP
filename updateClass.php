<?php
	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);

	$ModuleID = $obj['ModuleID'];
	$Room_ID = $obj['Room_ID'];
	$LecturerID = $obj['LecturerID'];
	$DateStr = $obj['ClassDate'];
	$Start_Str = $obj['Start_Time'];
	$End_Str = $obj['End_Time'];
	$ClassID = $obj['ClassID'];

	$startSplit = explode(':',$Start_Str);
	$endSplit = explode(':',$End_Str);
	
	var_dump($startSplit);
	var_dump($endSplit);

	$ClassDate = strtotime($DateStr);
	$Start_Time = mktime($startSplit[0],$startSplit[1],0,0,0,0);
	$End_Time = mktime($endSplit[0],$endSplit[1],0,0,0,0);

	$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
	mysql_select_db('agile');

	echo mysql_query('CALL updateClass('.$ModuleID.','.$Room_ID.','.$LecturerID.','.$ClassDate.','.$Start_Time.','.$End_Time.','.$ClassID.')',$db);

	mysql_close($db);


	echo "done";
?>

<title>updateClass.php</title>