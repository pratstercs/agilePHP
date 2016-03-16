<?php
	class SelectModuleName {
		public function __construct() {

		}
		public function selectModuleName() {
			$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
			mysql_select_db('agile');

			$modQuery = "select ModuleName from module";
			
			$modResult = mysql_query($modQuery,$db);

			mysql_close();
			
			$result = array();

			while($row = mysql_fetch_array($modResult)){
			//	echo $row['ModuleID'];
			//	echo "testing...";
				array_push($result, $row['ModuleName']);
			}
			
			return json_encode($result);
		}
	}
	
$a = new SelectModuleName();

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

echo $a->selectModuleName();
?>