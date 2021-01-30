<?php

require_once('databaseConect.php');

class User
{
	private $userName;
	private $password;
	private $email;
	
	function __construct($uname)
	{
		global $username;
		global $email;
		global $password;
		
		$qry = 'SELECT * FROM admin_table WHERE user_id = ' . $uname;
		$result = mysql_query($qry, $GLOBALS['connection']);
		
		$row = mysql_fetch_assoc($result);
		if($row)
		{
			$username = $row["username"];
			$email = $row["email"];
			$password = $row["password"];

		}
	}
	
	//Returns the username for a user
	public function getUsername()
	{
		global $username;
	
		return $username;
	}
	
	//edits the username of a user
	public function editUsername($uname)
	{
		global $username;
		global $user_id;
	
		$uname = addslashes($uname);
	
		if(strlen($uname) <= 32)
		{
			$qry = 'UPDATE admin_table SET username =  "' . $uname;
			$result = mysql_query($qry, $GLOBALS['connection']);
		}
	
		$username = $uname;
	}
	
		
		
		//Returns a user email
		public function getEmail()
		{
			global $email;
			return $email;
		}
		
		//Edits a user email
		public function editEmail($mail)
		{
			global $email;
			global $user_id;
		
			$mail = addslashes($mail);

			if(strlen($mail) <= 120)
			{
			$qry = 'UPDATE admin_table SET email =  "' . $mail;
			$result = mysql_query($qry, $GLOBALS['connection']);
			}
		
			$email = $mail;
		}
		
		
		//Returns the password for a manager
		public function getPassword()
		{
			global $password;
		
			return $password;
		}
		//edits the password of a manager
		public function editPassword($pword)
		{
			global $password;
			global $user_id;
		
			$pword = addslashes($pword);

			if(strlen($pword) <= 32)
			{
			$qry = 'UPDATE admin_table SET password =  "' . $pword . '" WHERE user_id = '. $user_id;
			$result = mysql_query($qry, $GLOBALS['connection']);
			}
		
			$password = $pword;
		}
		
		//Returns whether or not the manager is an administrator
		public function getIs_admin()
		{
			global $is_admin;
		
			return $is_admin;
		}
		//edits the password of a manager
		public function editIs_admin($admin)
		{
			global $is_admin;
			global $user_id;
		
			$admin = addslashes($admin);

			if($admin = 0 || $admin = 1)
			{
			$qry = 'UPDATE manager SET is_admin =  "' . $admin . '" WHERE user_id = '. $user_id;
			$result = mysql_query($qry, $GLOBALS['connection']);
			}
			
			else
			{
			echo('Invalid input, manager will not be set as an admin');
			}
		
			$password = $admin;
		}
		
		//Inserts a new manager into the table 
		public static function insertManager($fname, $lname, $mail, $pNum, $uname, $pword, $admin)
		{
			$fname = addslashes($fname);
			$lname = addslashes($lname);
			$mail = addslashes($mail);
			$pNum = addslashes($pNum);
			$lname = addslashes($uname);
			$mail = addslashes($pword);
			$pNum = addslashes($admin);
			
			if(strlen($fname) <= 32 && strlen($lname) <=32 && strlen($mail) <= 120 && strlen($pNum) <= 10 && strlen($uname) <= 32 && strlen($pword) <= 32 && ($admin == true || $admin == false))
			{
				$qry = 'INSERT INTO manager (first_name, last_name, email, phone, username, password, is_admin) VALUES ("' . $fname . '", "' . $lname . '", "' . $mail . '", "' . $pNum . '", "' . $uname . '", "' . $pword . '", "' . $admin . '")';
				$result = mysql_query($qry, $GLOBALS['connection']);
			}
		}
		
		//Searches the table by last name
		public static function searchManager_last_name($keyword)
		{
			$qry = 'SELECT * FROM manager WHERE last_name LIKE "%' . $keyword . '%"';
			$result = mysql_query($qry, $GLOBALS['connection']);
			return $result;
		}
		//Searches the table by first name
		public static function searchManager_first_name($keyword)
		{
			$qry = 'SELECT * FROM manager WHERE first_name LIKE "%' . $keyword . '%"';
			$result = mysql_query($qry, $GLOBALS['connection']);
			return $result;
		}
		//Searches the table by email
		public static function searchStudent_email($keyword)
		{
			$qry = 'SELECT * FROM manager WHERE email LIKE "%' . $keyword . '%"';
			$result = mysql_query($qry, $GLOBALS['connection']);
			return $result;
		}
		//Searches the table by phone
		public static function searchManager_phone($keyword)
		{
			$qry = 'SELECT * FROM manager WHERE phone LIKE "%' . $keyword . '%"';
			$result = mysql_query($qry, $GLOBALS['connection']);
			return $result;
		}
		//Searches the table by last name
		public static function searchManager_username($keyword)
		{
			$qry = 'SELECT * FROM manager WHERE last_name LIKE "%' . $keyword . '%"';
			$result = mysql_query($qry, $GLOBALS['connection']);
			return $result;
		}
		//Searches the table by first name
		public static function searchManager_password($keyword)
		{
			$qry = 'SELECT * FROM manager WHERE first_name LIKE "%' . $keyword . '%"';
			$result = mysql_query($qry, $GLOBALS['connection']);
			return $result;
		}
		//Searches the table by admin status
		public static function searchManager_is_admin($keyword)
		{
			$qry = 'SELECT * FROM manager WHERE email LIKE "%' . $keyword . '%"';
			$result = mysql_query($qry, $GLOBALS['connection']);
			return $result;
		}
		
		//Deletes an Student based on their email
		public static function deleteManager($uname)
		{
			$qry = 'DELETE FROM manager WHERE username = "' . $uname . '"';
			$result = mysql_query($qry, $GLOBALS['connection']);
		}
	}
?>