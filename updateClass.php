<?php
	class UpdateClass {
		public function __construct() {

		}
		public function updateClass($ModuleID, $Room_ID, $LecturerID, $DateStr, $Start_Str, $End_Str, $ClassID) {
			$startSplit = explode(':',$Start_Str);
			$endSplit = explode(':',$End_Str);
			$dateSplit = explode('-',$DateStr);

			$ClassDate = $dateSplit[2] . $dateSplit[1] . $dateSplit[0];
			$Start_Time = $startSplit[0] . $startSplit[1] . "00";
			$End_Time = $endSplit[0] . $endSplit[1] . "00";

			$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
			mysql_select_db('agile');

			//mysql_query('CALL updateClass('.$ModuleID.','.$Room_ID.','.$LecturerID.','.$ClassDate.','.$Start_Time.','.$End_Time.','.$ClassID.')',$db);

			$query = 'UPDATE class SET moduleID = ' .$ModuleID. ', room_ID = ' .$Room_ID. ', lecturerID = ' .$LecturerID. ', ClassDate = ' .$ClassDate. ', Start_Time = ' .$Start_Time. ', End_Time = ' .$End_Time. ' WHERE classID = ' .$ClassID;

			//

			echo($query);
			echo("<br>");

			mysql_query($query,$db);

			mysql_close($db);
		}
	}

	$a = new UpdateClass();

	$json = file_get_contents('php://input');
	$obj = json_decode($json,true);

	$ModuleID = $obj['ModuleID']; //int
	$Room_ID = $obj['Room_ID']; //string
	$LecturerID = $obj['LecturerID']; //int
	$DateStr = $obj['ClassDate']; //date
	$Start_Str = $obj['Start_Time']; //time
	$End_Str = $obj['End_Time']; //time
	$ClassID = $obj['ClassID']; //int

	$a->updateClass($ModuleID, $Room_ID, $LecturerID, $DateStr, $Start_Str, $End_Str, $ClassID)
?>