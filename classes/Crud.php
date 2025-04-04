<?php
include_once 'DbConfig.php';

class Crud extends DbConfig
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getData($query)
	{		
		$result = $this->connection->query($query);
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
		
	public function execute($query) 
	{
		$result = $this->connection->query($query);
		
		if ($result == false) {
			echo 'Error: cannot execute the command';
			return false;
		} else {
			return true;
		}		
	}
	
	public function delete($id, $table) 
	{ 
		$query = "DELETE FROM $table WHERE id = $id";
		
		$result = $this->connection->query($query);
	
		if ($result == false) {
			echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
			return false;
		} else {
			return true;
		}
	}

	public function search($query, $search) 
	{                              
		
		$result = $this->connection->prepare($query);
		$result->bind_param("s", $searchTerm);
		$searchTerm = $search;

		$result->execute();	
		$result = $result->get_result();  
		
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}

	public function addSql(String $query, $value)	{	
		
		$newSql = $query."OR m.materialName = '".$value."'";

		return $newSql;

	}

	public function checkOut(String $query, $val1, $val2) {
		
		$stmt = $this->connection->prepare($query);
		$stmt->bind_param("si", $bname, $userID);
		$bname = $val1;
		$userID = $val2;
		print_r($stmt);
		$stmt->execute();	
	}
	
	public function escape_string($value)
	{
		return $this->connection->real_escape_string($value);
	}
}
?>
