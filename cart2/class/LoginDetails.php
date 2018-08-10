<?php session_start();
require_once('interface/iLoginDetails.php');
/*
This class contains the public methods that concerns the login Details
*/
class loginDetails implements iLoginDetails
{
	private $userLoginEmail;
	private $userLoginPassword;
	private $emailPassword;
	
	public function dbConnect()
	{
		if($_SERVER['DOCUMENT_ROOT'] == 'C:/xampp/htdocs')
		{
			  $dbhost = "localhost";
			  $dbusername="root";
			  $dbpassword="";
		   mysql_connect($dbhost,$dbusername,$dbpassword)or die(mysql_error());
		   mysql_select_db('drugstore')or die(mysql_error());
		}
	}
	
	/*
This function userlogin creates the login for the user 
@params: email,password
email: the valid email supplied by the user
password: the password that the user creates for himself
*/
	public function userLogin($email,$password)
	{
		$Array1DResults = array();
		$this->dbConnect();
			$this->userLoginEmail=$email;
			$this->userLoginPassword=$password;
		 
		$sql = mysql_query(sprintf("SELECT * FROM user WHERE username ='%s' AND password = '%s' AND status != 'blocked'",
		get_magic_quotes_gpc() ? $this->userLoginEmail : addslashes($this->userLoginEmail),
		get_magic_quotes_gpc() ? base64_encode($this->userLoginPassword):  base64_encode(addslashes($this->userLoginPassword))));
		
		if (mysql_num_rows($sql) > 0)
		{
			$result = mysql_fetch_array($sql);
			 
			 $_SESSION['username']=$result["username"];
			 $_SESSION['role'] = $result['role'];
			 $_SESSION['id']= $result['id'];
			 
			  echo 'dashboard.php';
			
		} else {
			
			echo "Invalid Login Details!";
			
		}
		
		// return $_SESSION['result'];
	}
	    
	

}
?>