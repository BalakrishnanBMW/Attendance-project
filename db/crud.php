<?php

class crud
{
	// private database object
	private $db;

	//constructor to initialize private variable to the database connection.
	function __construct($conn)
	{
		$this->db = $conn;
	}

	public function insert($fname, $lname, $dob, $email, $contact, $speciality, $avatar_path)
	{
		try{
			$query = "INSERT INTO attendee (firstname, lastname, dob, email, contact, specialid, avatar_path) VALUES (:fname, :lname,:dob,:email,:contact,:speciality,:avatar_path)";
			$stmt = $this->db->prepare($query);

			$stmt->bindparam(':fname',$fname);
			$stmt->bindparam(':lname',$lname);
			$stmt->bindparam(':dob',$dob);
			$stmt->bindparam(':email',$email);
			$stmt->bindparam(':contact',$contact);
			$stmt->bindparam(':speciality',$speciality);
			$stmt->bindparam(':avatar_path',$avatar_path);
			
			$stmt->execute();
			return true;

		} catch(PDOException $ex) {
			echo $ex->getMessage();
			return false;
		}
	}

	public function getAttendees()
	{
		try {
			$query = "SELECT * FROM `attendee` a inner join `specialites` s on a.specialid=s.specialid";
			$result = $this->db->prepare($query);
			$result->execute();
			return $result;
		} catch(PDOException $ex) {
			echo $ex->getMessage();
			return false;
		}
	}

	public function getAttendeeDetails($id)
	{
		try {
			$query = "SELECT * FROM `attendee` a INNER JOIN `specialites` s ON a.specialid=s.specialid WHERE a.attendee_id=:id";
			$stmt = $this->db->prepare($query);
			$stmt->bindparam(':id',$id);
			$stmt->execute();
			$result = $stmt->fetch();
			return $result;
		} catch(PDOException $ex) {
			echo $ex->getMessage();
			return false;
		}
	}

	public function getSpeciality()
	{
		try
		{
			$query = "SELECT * FROM `specialites`";
			$result = $this->db->prepare($query);
			$result->execute();
			return $result;	
		} catch(PDOException $ex) {
			echo $ex->getMessage();
			return false;
		}
	}

	public function updateRecord($attendee_id, $fname, $lname, $dob, $email, $contact, $speciality ,$avatar_path)
	{
		try{
			$query = "UPDATE attendee SET firstname=:fname, lastname=:lname, dob=:dob, email=:email, contact=:contact, specialid=:speciality, avatar_path=:avatar_path WHERE attendee_id=:attendee_id";
			$stmt = $this->db->prepare($query);
			$stmt->bindparam(':attendee_id',$attendee_id);
			$stmt->bindparam(':fname',$fname);
			$stmt->bindparam(':lname',$lname);
			$stmt->bindparam(':dob',$dob);
			$stmt->bindparam(':email',$email);
			$stmt->bindparam(':contact',$contact);
			$stmt->bindparam(':speciality',$speciality);
			$stmt->bindparam(':avatar_path',$avatar_path);
			
			$stmt->execute();
			return true;

		} catch(PDOException $ex) {
			echo $ex->getMessage();
			return false;
		}
	}

	public function delete($id)
	{
	   try{
		$avatar = "SELECT * FROM `attendee` WHERE attendee_id=:id";
		$del_pic = $this->db->prepare($avatar);
		$del_pic->bindparam(':id', $id);
		$del_pic->execute();
		$result = $del_pic->fetch();
		$pic_path = $result['avatar_path'];
		if(file_exists($pic_path)) {
			unlink($pic_path);
		}
		$query = "DELETE FROM `attendee` WHERE attendee_id=:id";
		$stmt = $this->db->prepare($query);
		$stmt->bindparam(':id', $id);
		$stmt->execute();
		return true;
	      } catch(PDOException $ex) {
			echo $ex->getMessage();
			return false;
	      }
	
	}

}

?>



