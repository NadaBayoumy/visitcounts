<?php
/*
This if Front Conroller Page
Route the Needed View
*/
define("Direct",1);

/** Get The Requested Page id From URL **/
$view_id = (isset($_GET['id']) && is_numeric($_GET['id'])) ? (int)$_GET["id"] : 1 ;

if($view_id === 1)
{
	$current_view = "visitors";
}
else
{
	$current_view = "index";
}
$_GET = array();
$_POST = array();
?>


<html>
	<body>
	<?php require_once("views/".$current_view.".php"); ?>
	</body>
</html>

