<?php
	class AddClass {
		public function __construct() {

		}
		
		public function addClass($moduleID, $roomID, $lecID, $date, $start, $end) {
			$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
			mysql_select_db('agile');
			
			$query = '	INSERT INTO class (ModuleID, Room_ID, LecturerID, ClassDate, Start_Time, End_Time) 
							VALUES (' . $moduleID . ',' . $roomID . ',' . $lecID . ',\'' . $date . '\',\'' . $start . '\',\'' . $end . '\');';

			echo $query;
							
			mysql_query($query,$db);

							
			
							
			mysql_close($db);
		}
	}

	$a = new AddClass();
	
	$json = file_get_contents('php://input');
	//$json = file_get_contents("test.json");
	
	$obj = json_decode($json,true);
	$moduleID = $obj['ModuleID'];
	$roomID = $obj['Room_ID'];
	$lecID = $obj['LecturerID'];
	$date = $obj['ClassDate'];
	$start = $obj['Start_Time'];
	$end = $obj['End_Time'];

	$a->addClass($moduleID, $roomID, $lecID, $date, $start, $end);
?>