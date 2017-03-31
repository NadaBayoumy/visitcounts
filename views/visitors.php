<?php
echo "<br/>_________ Hello from visitors  _______</br>";

include("models/storageconfig.php");
include("config/config.php");
include("models/visitors.class.php");
include("models/lang.php");

$userChoiceOfConnection = 'db';
$typeOfConnection = ConnectionDatabaseCls::connect($userChoiceOfConnection);
$connectionObject = new ConnectionDatabaseCls($DBHost,$DBUser,$DBPass, $DBName);
$con = $connectionObject->connect_to_database();
$db = $connectionObject->getDb();
$con = $connectionObject->connect_to_database_mysqli();
$dbmysqli = $connectionObject->getDbmysqli();


$visitorsObj = new visitorsCls();
$visitorsObj->queryVisitors($db);
$visitors = $visitorsObj->getVisitors();

// foreach ($visitors as $key => $value) {
// 	echo htmlspecialchars($value, ENT_QUOTES);
// 	echo "<br/>";
// }

showCounter($Lang,sizeof($visitors));

if (!in_array(get_mac(), $visitors))
{
		$sanit_mac = filter_var($mac, FILTER_SANITIZE_STRING);
		//$valid_mac = filter_var($sanit_mac,FILTER_VALIDATE_MAC);
		//echo filter_var($sanit_mac,FILTER_VALIDATE_MAC);
		if(filter_var($sanit_mac,FILTER_VALIDATE_MAC)){
			$visitorsObj->insertVisitor($sanit_mac,"dummy@email.com",$dbmysqli);
		}
}





function get_mac(){
    ob_start();
    system('ifconfig -a');
    $mycom = ob_get_contents(); // Capture the output into a variable
    ob_clean(); // Clean (erase) the output buffer
    $findme = "Physical";
    //Find the position of Physical text 
    $pmac = strpos($mycom, $findme); 
    $mac = substr($mycom, ($pmac + 42), 18);

    return $mac;
}

