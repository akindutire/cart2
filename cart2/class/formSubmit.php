<?php
require('interface/interfaceSubmit.php');
/* This class submits all the form needed for drug store supermarket */
class formSubmit implements IformSubmit
{
	public $addUsersMsg;
	public $addCatMsg;
	public $addProductMsg;
	public $soldProductMsg;
	
/* This method takes 1 dimensional Array and submit users to the database 
	@params: 1DuserArray  */
	
public function addUsers($id,$userArray)
{
 if ($id==true)
 {
	 if(count($userArray)< 4)
	 {
		 $sql=mysql_query(sprintf("UPDATE user SET role='%s',status='%s' WHERE id='%s'",
		get_magic_quotes_gpc() ? $userArray['role'] : addslashes($userArray['role']),
		get_magic_quotes_gpc() ? $userArray['status'] : addslashes($userArray['status']),
		get_magic_quotes_gpc() ? $id : addslashes($id)))or die(mysql_error());
	 } else {
	    $sql=mysql_query(sprintf("UPDATE user SET username='%s',password='%s',role='%s',status='%s' WHERE id='%s'",
		get_magic_quotes_gpc() ? $userArray['username'] : addslashes($userArray['username']),
		get_magic_quotes_gpc() ? base64_encode($userArray['password']) : base64_encode(addslashes($userArray['password'])),
		get_magic_quotes_gpc() ? $userArray['role'] : addslashes($userArray['role']),
		get_magic_quotes_gpc() ? $userArray['status'] : addslashes($userArray['status']),
		get_magic_quotes_gpc() ? $id : addslashes($id)))or die(mysql_error());
	 }
		
		if ($sql==true)
		{
			$this->addUsersMsg='User Account was successfully Updated';
		} else {
			$this->addUsersMsg='Error in Updating User Account Try Again';
		}
 } else {
	if (is_array($userArray))
	{
		$sql=mysql_query(sprintf("INSERT INTO user (username,password,role,status) VALUE('%s','%s','%s','%s')",
		get_magic_quotes_gpc() ? $userArray['username'] : addslashes($userArray['username']),
		get_magic_quotes_gpc() ? base64_encode($userArray['password']) : base64_encode(addslashes($userArray['password'])),
		get_magic_quotes_gpc() ? $userArray['role'] : addslashes($userArray['role']),
		get_magic_quotes_gpc() ? $userArray['status'] : addslashes($userArray['status'])))or die(mysql_error());
		
		if ($sql==true)
		{
			$this->addUsersMsg='User Account was successfully Created';
		} else {
			$this->addUsersMsg='Error in creating User Account Try Again';
		}
	}
 }
    return $this->addUsersMsg;
}

/* This method takes catName  and submit product category to the database 
	@params: catName        */

public function addCategory($id,$catName)
{
  if ($id==true)
  {
	    $sql = mysql_query(sprintf("UPDATE category SET cat_name ='%s' WHERE cat_id='%s'",
		get_magic_quotes_gpc() ? $catName : addslashes($catName),
		get_magic_quotes_gpc() ? $id : addslashes($id)))or die(mysql_error());
		
		if ($sql==true)
		{
			$this->addCatMsg='Product Category was successfully Updated';
		} else {
			$this->addCatMsg='Error in Updating Product Category Try Again';
		}
	  
  } else {
	if (!empty($catName))
	{
		$sql=mysql_query(sprintf("INSERT INTO category (cat_name) VALUE('%s')",
		get_magic_quotes_gpc() ? $catName : addslashes($catName)
		))or die(mysql_error());
		
		if ($sql==true)
		{
			$this->addCatMsg='Product Category was successfully Created';
		} else {
			$this->addCatMsg='Error in creating Product Category Try Again';
		}
	}
  }
   return $this->addCatMsg;
}

/* This method takes 1 dimensional Array and cat_id add products to the database 
	@params: productArray,catID       */


public function addProduct($id,$catID,$productArray)
{
  if($id==true)
  {
	  $sql=mysql_query(sprintf("UPDATE product SET product_name='%s',quantity=quantity+'%s',unit_price='%s',
	  cost_price='%s' WHERE product_id='%s'",
		get_magic_quotes_gpc() ? $productArray['product'] : addslashes($productArray['product']),
		get_magic_quotes_gpc() ? $productArray['quantity'] : addslashes($productArray['quantity']),
		get_magic_quotes_gpc() ? $productArray['unitprice'] : addslashes($productArray['unitprice']),
		get_magic_quotes_gpc() ? $productArray['costprice'] : addslashes($productArray['costprice']),
		get_magic_quotes_gpc() ? $id : addslashes($id)))or die(mysql_error());
		
		if ($sql==true)
		{
			$this->addProductMsg='Product was successfully Updated';
		} else {
			$this->addProductMsg='Error in Updating Product Try Again';
		}
	  
  } else {
	if ( is_array($productArray) && (!empty($catID)))
	{
		$sql=mysql_query(sprintf("INSERT INTO product (cat_id,product_name,quantity,unit_price,cost_price) VALUE('%s','%s','%s','%s','%s')",
		get_magic_quotes_gpc() ? $catID : addslashes($catID),
		get_magic_quotes_gpc() ? $productArray['product'] : addslashes($productArray['product']),
		get_magic_quotes_gpc() ? $productArray['quantity'] : addslashes($productArray['quantity']),
		get_magic_quotes_gpc() ? $productArray['unitprice'] : addslashes($productArray['unitprice']),
		get_magic_quotes_gpc() ? $productArray['costprice'] : addslashes($productArray['costprice'])))or die(mysql_error());
		
		if ($sql==true)
		{
			$this->addProductMsg='Product was successfully Created';
		} else {
			$this->addProductMsg='Error in creating Product Try Again';
		}
	}
  }
   return $this->addProductMsg;
}

/* This method takes 1 dimensional Array  the product id,staff id and submit users to the database 
	@params: soldArray,productID,staffID        */


public function soldProducts($staffID,$soldDate,$soldArray)
{
	if (is_array($soldArray))
	{
		foreach($soldArray as $productId => $productQty)
		{
		$sql=mysql_query(sprintf("INSERT INTO soldproduct (product_id,staff_id,sold_quantity,sold_date) VALUE('%s','%s','%s','%s')",
		get_magic_quotes_gpc() ? $productId: addslashes($productId),
		get_magic_quotes_gpc() ? $staffID : addslashes($staffID),
		get_magic_quotes_gpc() ? $productQty : addslashes($productQty),
		get_magic_quotes_gpc() ? $soldDate : addslashes($soldDate)))or die(mysql_error());
		
		/////////////////////  Updating the sold products in product table ////////////////////////////
		
		$sql= mysql_query(sprintf("UPDATE product SET quantity=quantity-'%s' WHERE product_id='%s'",
		get_magic_quotes_gpc() ? $productQty : addslashes($productQty),
		get_magic_quotes_gpc() ? $productId: addslashes($productId)
		)) or die(mysql_error());
		////////////////////// End of Update on Product table /////////////////////////////////////////
		}
		if ($sql==true)
		{
			$this->soldProductMsg='Transaction successfull';
		} else {
			$this->soldProductMsg='Error in Transaction Try Again';
		}
	} else {
		echo 'Not here';
	}
	return $this->soldProductMsg;
}

}
/*mysql_connect('localhost','root','');mysql_select_db('drugstore');
$submit = new formSubmit();
$product = array(1=>2,2=>1);
$date = date('F j Y');
$staffId = 1;
$submit->soldProducts($staffId,$date,$product);
echo $submit->soldProductMsg;*/
?>