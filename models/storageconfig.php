<?php

class ConnectionCls
{
	/**Member Variable**/
	private $ConnectionType;
	// private $PathToFile;
	// private $FileName;

    public function __construct($connType)
    {
        $this->ConnectionType = $connType;
    }

    public function getConnectionType()
    {
        return $this->ConnectionType;
    }
}


class ConnectionDatabaseCls
{
	private $DBName;
	private $DBHost;
	private $DBUser;
	private $DBPass;
	private $db;
	private $dbmysqli;

	public function __construct($Host,$User,$Pass, $Name)
    {
        $this->DBName=$Name;
		$this->DBHost=$Host;
		$this->DBUser=$User;
		$this->DBPass=$Pass;
    }

    /**Getters and Setters **/
	public function getDb(){
		return $this->db;
	}

	public function setDb($db){
		$this->db = $db;
	}


	public function getDBName(){
		return $this->DBName;
	}

	public function setDBName($DBName){
		$this->DBName = $DBName;
	}

	public function getDBHost(){
		return $this->DBHost;
	}

	public function setDBHost($DBHost){
		$this->DBHost = $DBHost;
	}

	public function getDBUser(){
		return $this->DBUser;
	}

	public function setDBUser($DBUser){
		$this->DBUser = $DBUser;
	}

	public function getDBPass(){
		return $this->DBPass;
	}

	public function setDBPass($DBPass){
		$this->DBPass = $DBPass;
	}

	public function getDbmysqli(){
		return $this->dbmysqli;
	}

	public function setDbmysqli($dbmysqli){
		$this->dbmysqli = $dbmysqli;
	}
	/** End Of Getters and Setters **/
	

    public static function connect($type)
    {
        return new ConnectionCls($type);
    }

    public function connect_to_database()
    {
    	$this->db = mysqli_connect($this->DBHost,$this->DBUser,$this->DBPass, $this->DBName);
    }

    public function connect_to_database_mysqli()
    {
    	$this->dbmysqli = new mysqli($this->DBHost,$this->DBUser,$this->DBPass, $this->DBName);
    }
}


