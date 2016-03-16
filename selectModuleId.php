<?php
	class SelectModuleID {
		public function __construct() {

		}
		public function selectModuleID($modName) {
			$db = mysql_connect("philippratt.co.uk:3306","agile","agile");
			mysql_select_db('agile');

			$modQuery = "select ModuleID from module where ModuleName=" .$modName ;
			
			$modResult = mysql_query($modQuery,$db);

			mysql_close();
			
			return json_encode($modResult);
		}
	}
	
$a = new SelectModuleID();

$json = file_get_contents('php://input');
$obj = json_decode($json,true);
//$modName = $obj['ModuleName'];
$modName = 'Mod';

echo $a->selectModuleID($modName);
?>