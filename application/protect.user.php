<!--
Arthur ==> ADAMS PAUL OHIANI
Title ==> ADVANCED WEB LOGIN OPTION(PATTERN)

-->
<?php

require_once('configurations.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($uname,$umail,$upass,$randomstring)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO users(user_name,user_email,user_pass,pr_id) VALUES(:uname, :umail, :upass, :randomstring)");
												  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);
			$stmt->bindparam(":randomstring", $randomstring);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}

		public function changepat($pat, $pr_id)
				{
			try 
				{
			$hashpassword = password_hash($pat, PASSWORD_DEFAULT);
			$stmt = $this->conn->prepare("UPDATE users SET pattern=:hashpassword where pr_id=:pr_id");						  						  
			$stmt->bindparam(":hashpassword", $hashpassword);
			$stmt->bindparam(":pr_id", $pr_id);
			$stmt->execute();
			return $stmt;
				
			} catch(PDOException $e)
			{
			echo $e->getMessage();
			}				

			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
	
				}





		public function changepass($password, $pr_id)
				{
			try 
				{
			$hashpassword = password_hash($password, PASSWORD_DEFAULT);
			$stmt = $this->conn->prepare("UPDATE users SET user_pass=:hashpassword where pr_id=:pr_id");						  						  
			$stmt->bindparam(":hashpassword", $hashpassword);
			$stmt->bindparam(":pr_id", $pr_id);
			$stmt->execute();
			return $stmt;
				
			} catch(PDOException $e)
			{
			echo $e->getMessage();
			}				

			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
	
				}







	public function doLogin($uname,$umail,$upass,$upat)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT user_id, user_name, user_email, user_pass, pattern FROM users WHERE user_name=:uname OR user_email=:umail ");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['user_pass']) OR password_verify($upat, $userRow['pattern']))
				{
					$_SESSION['user_session'] = $userRow['user_id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>