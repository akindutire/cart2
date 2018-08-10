<?php
/*
This interface contains the public methods that concerns the login Details
*/
interface iLoginDetails
{
	/*
This function userlogin creates the login for the user 
@params: email,password
email: the valid email supplied by the user
password: the password that the user creates for himself
*/
	public function userLogin($email,$password);
/*
  This function checks for the valid email of the user, then sent the retrieved login details to the user
  @params: email
  email: the valid email the user supplied
*/
	/*public function retrievePassword($email);*/
}
?>