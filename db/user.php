<?php

class user{

	private $db;

	function __construct($conn)
	{
		$this->db = $conn;
	}

	public function insertUser($username, $password)
	{
	   try{
		$result = $this->getUserByUsername($username);
		if($result['num']>0)
		{
			return false;
		}
		else 
		{
			$new_password = md5($password.$username);
			$sql = "INSERT INTO `user` (username, password) VALUES (:username, :password)";
			$stmt = $this->db->prepare($sql);
			$stmt->bindparam(':username',$username);
			$stmt->bindparam(':password',$new_password);
			$stmt->execute();
			return true;
		}
	    } catch(PDOException $ex) {
		echo $ex->getMessage();
		return false;
	    }
	}
	
	public function getUser($username, $password)
	{
		try {
			$query = "SELECT * FROM `user` WHERE username=:username AND password=:password";
			$stmt = $this->db->prepare($query);
			$stmt->bindparam(':username',$username);
			$stmt->bindparam(':password',$password);
			$stmt->execute();
			$result = $stmt->fetch();
			return $result;
		} catch(PDOException $ex) {
			echo $ex->getMessage();
			return false;
		}
	}

	public function getUserByUsername($username)
	{
		try {
			$query = "SELECT COUNT(*) AS num FROM `user` WHERE username=:username";
			$stmt = $this->db->prepare($query);
			$stmt->bindparam(':username',$username);
			$stmt->execute();
			$result = $stmt->fetch();
			return $result;
		} catch(PDOException $ex) {
			echo $ex->getMessage();
			return false;
		}	
	}
}

?>