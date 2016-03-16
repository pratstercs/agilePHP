<?php
	//$json = file_get_contents('php://input');
	$json = file_get_contents("test.json");
	
	$obj = json_decode($json,true);
	$UserID = $obj['UserID'];
	$QRCode = $obj['QRCode'];
	$StartTime = $obj['StartTime'];
	
	$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
	mysql_select_db('agile');

	$query = 'SELECT StudentID FROM student WHERE UserID = ' . $UserID . ';';
	$res = mysql_query($query,$db);
	$result = array();
	while($row = mysql_fetch_array($res))
	{
		$studentID = $row[0];
	}
	
	$query = 'SELECT ClassID FROM class WHERE Room_ID = 
					( SELECT RoomID FROM room WHERE QRCode = "' . $QRCode . '") 
					&& Start_Time = \'' . $StartTime . '\';';

	$res = mysql_query($query,$db);
	$result = array();
	while($row = mysql_fetch_array($res))
	{
		$classID = $row[0];
	}
	
	$query = 'INSERT INTO attended (ClassID, StudentID) VALUES ('.$classID.','.$studentID.')';
	$res = mysql_query($query,$db);
	
	mysql_close($db);
?>