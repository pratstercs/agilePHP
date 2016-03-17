<?php
	class SelectModuleID {
		public function __construct() {

		}
		public function selectModuleID($modName) {
			$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
			mysql_select_db('agile');

			$modQuery = "select ModuleID from module where ModuleName=\"" .$modName. "\";" ;
			echo $modQuery;
			$modResult = mysql_query($modQuery,$db);

			mysql_close();
			
			$json = json_encode($modResult);
			var_dump($json);
			return $json;
		}
	}
	
$a = new SelectModuleID();

$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$modName = $obj['ModuleName'];

echo $a->selectModuleID($modName);
?>