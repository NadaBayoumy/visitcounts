<?php
class visitorsCls{
	/**Member Variable**/
	private $visitors;

	/****Getter and Setter ****/

	/**Visitors**/
	public function getVisitors(){
		return $this->visitors;
	}
	public function setVisitors($visitors){
		$this->visitors = $visitors;
	}


	public function queryVisitors($dbconnection){
		$selectSqlStr = "select * from visit";	
		$resultOfQuery = mysqli_query($dbconnection,$selectSqlStr);
	    while ($row = mysqli_fetch_assoc($resultOfQuery)) {
	    	$this->visitors[$row["id"]] = $row["mac"];
	    }
	}

	public function insertVisitor($mac,$email,$mysqli){
		if (!($stmt = $mysqli->prepare("INSERT INTO visit (mac) VALUES (?)"))) {
		    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		else
		{
			$stmt->bind_param("s", $mac);
			$stmt->execute();
		}
	}

}