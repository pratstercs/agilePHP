<?php
	class RecordAttendance {
		public function __construct() {

		}
		public function recordAttendance($UserID, $QRCode, $StartTime) {
			$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
			mysql_select_db('agile');

			$query = 'SELECT StudentID FROM student WHERE UserID = ' . $UserID . ';';
			$res = mysql_query($query,$db);
			$result = array();
			while($row = mysql_fetch_array($res))
			{
				$studentID = $row[0];
			}
			
			$query = '	Select 
							c.ClassID 
						from 
							class c inner join room r 	on c.Room_ID=r.RoomID 
									inner join module m on m.ModuleID=c.ModuleID 
									inner join enrolement e on m.ModuleID=e.ModuleID 
						where 
							e.StudentID = ' . $studentID . '  
						&& 	r.QRCode = "' . $QRCode . '" && c.ClassDate=CURDATE() && c.Start_Time < CURTIME() && c.End_Time > curtime();';

			$res = mysql_query($query,$db);
			$result = array();
			while($row = mysql_fetch_array($res))
			{
				$classID = $row[0];
			}
			
			if (strlen($classID) > 1)
			{
				$query = 'INSERT INTO attended (ClassID, StudentID) VALUES ('.$classID.','.$studentID.')';
				$res = mysql_query($query,$db);
				
				mysql_query($query,$db);
				
				mysql_close($db);
				
				return "true";
			}
			else
			{
				mysql_close($db);
				return "false";
			}
		}
	}

$a = new RecordAttendance();

$json = file_get_contents('php://input');
//$json = file_get_contents("test.json");

$obj = json_decode($json,true);
$UserID = $obj['UserID'];
$QRCode = $obj['QRCode'];
$StartTime = $obj['StartTime'];

echo $a->recordAttendance($UserID, $QRCode, $StartTime);

?>