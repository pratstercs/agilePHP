<?php
	class SelectModuleName {
		public function __construct() {

		}
		public function selectModuleName($userId) {
			$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
			mysql_select_db('agile');

			$modQuery = "Select module.ModuleID, module.ModuleName 
					from module inner join lecturer on 
					module.ModuleID =lecturer.moduleID inner join staff on
					lecturer.StaffID=staff.StaffID inner join user on 
					staff.UserID= user.UserID where module.ModuleYear= '2016' && user.userID =" .$userId. ";";

			$modResult = mysql_query($modQuery,$db);

			mysql_close();
			
			$result = array();

			while($row = mysql_fetch_array($modResult)){
				array_push($result, array('ModuleName' => $row[1], 'ModuleID' => $row[0]));
			}
			
			return json_encode($result);
		}
	}
	
$a = new SelectModuleName();

$json = file_get_contents('php://input');
//$json = file_get_contents("test.json");
$obj = json_decode($json,true);
$userId = $obj['UserId'];

echo $a->selectModuleName($userId);
?>