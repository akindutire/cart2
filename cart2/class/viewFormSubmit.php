<?php
require_once('interface/interfaceViewSubmit.php');
/* This interface contains the public methods to be implemented */
class viewFormSubmit implements IformSubmitView
{
	public $allUser=array();
	public $allCategory=array();
	public $allProduct=array();
	public $soldproduct=array();
	public $productCategory=array();
	public $productFound=array();
	public $availableCategory=array();
	public $productInCategory=array();
	public $showProduct=array();
	public $productSum= array();
	
/* This method view all users  
	@params: void arguments       */
	
public function viewUsers()
{
	$sql = mysql_query("SELECT DISTINCT * FROM user WHERE 1 ORDER BY username ASC");
	 if (mysql_num_rows($sql)>0)
	 {
		 while($allUsers = mysql_fetch_assoc($sql))
		 {
			 array_push($this->allUser,$allUsers);
		 }
	 }
	 return $this->allUser;
}

/* This method view all category  
	@params: void arguments         */

public function viewCategory($id)
{
	if ($id==true)
	{
		$sql = mysql_query(sprintf("SELECT DISTINCT cat_name,cat_id FROM category WHERE cat_id='%s'",
		get_magic_quotes_gpc() ? $id : addslashes($id)));
	}else {
	$sql = mysql_query("SELECT DISTINCT cat_name,cat_id FROM category") or die(mysql_error());
	}
	 if (mysql_num_rows($sql)>0)
	 {
		 while($allCat = mysql_fetch_assoc($sql))
		 {
			 array_push($this->allCategory,$allCat);
		 }
	 }
	 return $this->allCategory;
}

/* This method view all products 
	@params: void arguments      */


public function viewProduct($id)
{
	if ($id==true)
	{
		$sql = mysql_query(sprintf("SELECT  * FROM product p,category c  WHERE p.cat_id=c.cat_id AND p.product_id='%s'",
		get_magic_quotes_gpc() ? $id : addslashes($id)));
	}
	else {
	$sql = mysql_query("SELECT DISTINCT * FROM product WHERE 1"); 
	}
	 if (mysql_num_rows($sql)>0)
	 {
		 while($allProduct = mysql_fetch_assoc($sql))
		 {
			 array_push($this->allProduct,$allProduct);
		 }
	 }
	 return $this->allProduct;
}

/* This method view all soldproducts 
	@params: void arguments      */

public function sumQuantity($id)
{
	if ($id==true)
	 {
		$sql = mysql_query("SELECT product_id,cost_price,quantity FROM product WHERE product_id='$id'")or die(mysql_error());
	 } else{
		 $sql = mysql_query("SELECT product_id,cost_price,quantity FROM product  WHERE 1") or die(mysql_error());
          }
		  if (mysql_num_rows($sql)>0)
	 {
		 while($product = mysql_fetch_assoc($sql))
		 {
			 array_push($this->productSum,$product);
		 }
	 }
	 return $this->productSum;
		  
}

public function viewSoldProduct($dateFrom,$dateTo,$userID,$productID)
{
	 if ($dateFrom==false && $dateTo==false && $userID==false && $productID==false)
	 {
		 $sql = mysql_query("SELECT *  FROM soldproduct sp,product pr WHERE sp.product_id=pr.product_id ORDER BY pr.product_name ASC");
	 } elseif($userID==true && $dateFrom==false && $dateTo==false && $productID==false)
	 {
		$sql= mysql_query(sprintf("SELECT * FROM soldproduct sp,user u,product pr WHERE sp.product_id=pr.product_id AND sp.staff_id=u.id AND u.id='%s' ORDER BY pr.product_name ASC",
		 get_magic_quotes_gpc() ? $userID: addslashes($userID))); 
		 
	 } elseif ($dateFrom==true && $userID==true && $dateTo==false && $productID==false)
	 {
		 $sql= mysql_query(sprintf("SELECT * FROM soldproduct sp,user u,product pr WHERE sp.product_id=pr.product_id AND sp.staff_id=u.id AND sp.sold_date='%s' AND u.id='%s' ",
		 get_magic_quotes_gpc() ? $dateFrom: addslashes($dateFrom),
		  get_magic_quotes_gpc() ? $userID: addslashes($userID)
		 ));
	 } elseif ($dateFrom==true && $userID==true && $dateTo==true && $productID==false)
	 {
		 $sql= mysql_query(sprintf("SELECT * FROM soldproduct sp,user u,product pr  WHERE sp.product=pr.product_id AND sp.staff_id=u.id AND sp.sold_date BETWEEN '%s' AND '%s' AND u.id='%s' ORDER BY pr.product_name ASC",
		  get_magic_quotes_gpc() ? $dateFrom: addslashes($dateFrom),
		  get_magic_quotes_gpc() ? $dateTo: addslashes($dateTo),
		  get_magic_quotes_gpc() ? $userID: addslashes($userID)
		 ));
	 }
	 elseif($dateFrom==true && $dateTo==false && $userID==false && $productID==false)
	 {
		 $sql= mysql_query(sprintf("SELECT * FROM soldproduct sp,product pr  WHERE sp.product_id = pr.product_id AND
		  sp.sold_date >= '%s' ORDER BY pr.product_name ASC",
		 get_magic_quotes_gpc() ? $dateFrom: addslashes($dateFrom))) or die(mysql_error());
		 //echo 1;
		 
	 }elseif($dateFrom==true && $dateTo==false && $userID==false && $productID==true)
	 {
		 $sql= mysql_query(sprintf("SELECT * FROM soldproduct sp,product pr  WHERE sp.product_id = pr.product_id AND
		  sp.sold_date >= '%s' AND sp.product_id='%s' ORDER BY pr.product_name ASC",
		 get_magic_quotes_gpc() ? $dateFrom: addslashes($dateFrom),
		 get_magic_quotes_gpc() ? $productID: addslashes($productID))) or die(mysql_error());
		 
	 } elseif($dateFrom==true && $dateTo==false && $userID==true && $productID==true)
	 {
		 $sql= mysql_query(sprintf("SELECT * FROM soldproduct sp,product pr WHERE sp.product_id = pr.product_id AND
		  sp.sold_date >= '%s' AND sp.product_id='%s' AND sp.staff_id = '%s' ORDER BY pr.product_name ASC",
		 get_magic_quotes_gpc() ? $dateFrom: addslashes($dateFrom),
		 get_magic_quotes_gpc() ? $productID: addslashes($productID),
		  get_magic_quotes_gpc() ? $userID: addslashes($userID))) or die(mysql_error());
		 
	 }
	 elseif($dateFrom==false && $dateTo==false && $userID==false && $productID==true)
	 {
		 $sql= mysql_query(sprintf("SELECT * FROM soldproduct sp,product pr  WHERE sp.product_id = pr.product_id AND pr.product_id='%s' ORDER BY pr.product_name ASC",
		 get_magic_quotes_gpc() ? $productID: addslashes($productID))) or die(mysql_error());

	 }
	 elseif ($dateFrom==true && $dateTo==true && $userID==false && $productID==false)
	 {$sql= mysql_query(sprintf("SELECT * FROM soldproduct sp,product pr  WHERE sp.sold_date BETWEEN '%s' AND '%s' AND sp.product_id = pr.product_id ORDER BY pr.product_name ASC",
		 get_magic_quotes_gpc() ? $dateFrom: addslashes($dateFrom),
		  get_magic_quotes_gpc() ? $dateTo: addslashes($dateTo))) or die(mysql_error());
	 }elseif ($dateFrom==true && $dateTo==true && $userID==false && $productID==true)
	 {$sql= mysql_query(sprintf("SELECT * FROM soldproduct sp,product pr  WHERE sp.sold_date BETWEEN '%s' AND '%s' AND sp.product_id = pr.product_id  AND pr.product_id='%s' ORDER BY pr.product_name ASC",
		  get_magic_quotes_gpc() ? $dateFrom: addslashes($dateFrom),
		  get_magic_quotes_gpc() ? $dateTo: addslashes($dateTo),
		  get_magic_quotes_gpc() ? $productID: addslashes($productID))) or die(mysql_error());
	 }
	 elseif ($dateFrom==true && $dateTo==true && $userID==true && $productID==true)
	 {$sql= mysql_query(sprintf("SELECT * FROM soldproduct sp,product pr  WHERE sp.sold_date BETWEEN '%s' AND '%s' AND sp.product_id = pr.product_id  AND pr.product_id='%s'
	 AND sp.staff_id = '%s' ORDER BY pr.product_name ASC",
		  get_magic_quotes_gpc() ? $dateFrom: addslashes($dateFrom),
		  get_magic_quotes_gpc() ? $dateTo: addslashes($dateTo),
		  get_magic_quotes_gpc() ? $productID: addslashes($productID),
		   get_magic_quotes_gpc() ? $userID: addslashes($userID))) or die(mysql_error());
	 }
	 if (mysql_num_rows($sql)>0)
	 {
		 while($soldproduct = mysql_fetch_assoc($sql))
		 {
			 array_push($this->soldproduct,$soldproduct);
		 }
	 }
	 return $this->soldproduct;
}
/* This method view all soldproducts 
	@params: void arguments      */
	public function viewProductCategory()
	{
		$sql = mysql_query("SELECT DISTINCT product.cat_id,product.quantity,product.product_name,category.cat_id,category.cat_name FROM 
		product,category 
		WHERE product.cat_id = category.cat_id ORDER BY category.cat_name ASC");
	 if (mysql_num_rows($sql)>0)
	 {
		 while($productCategory = mysql_fetch_assoc($sql))
		 {
			 array_push($this->productCategory,$productCategory);
		 }
	 }
	 return $this->productCategory;
	}
	
	public function productsInCategory($cat_id)
	{
		$sql = mysql_query("SELECT * FROM product p ,category c WHERE p.cat_id = c.cat_id AND  c.cat_id ='$cat_id'") or die(mysql_error());
		
	 if (mysql_num_rows($sql)>0)
	 {
		 while($productCategory = mysql_fetch_assoc($sql))
		 {
			 array_push($this->productInCategory,$productCategory);
		 }
	 } else {
		 echo 'No Record Found!';
	 }
	 echo json_encode($this->productInCategory);
	}
	
	public function showProducts()
	{
		$sql = mysql_query("SELECT * FROM product WHERE quantity  != 0 ORDER BY RAND() LIMIT 5 ");
		
	 if (mysql_num_rows($sql)>0)
	 {
		 while($showProduct = mysql_fetch_assoc($sql))
		 {
			 array_push($this->showProduct,$showProduct);
		 }
	 }
	 return $this->showProduct;
	 return $this;
	}
	public function searchProducts($keyword)
	{
		$sql = mysql_query("SELECT product_id,product_name FROM product WHERE product_name LIKE '%".mysql_real_escape_string($keyword)."%' AND quantity!=0");
		if(mysql_num_rows($sql)>0)
		{
			while($foundProducts=mysql_fetch_assoc($sql))
			{
				array_push($this->productFound,$foundProducts);
			}
		} else {
			echo 'Product not Available for now!';
		}
		echo json_encode( $this->productFound);
	}
	
	public function allCategory()
	{
		$sql = mysql_query("SELECT DISTINCT cat_name,cat_id FROM category ORDER BY cat_name ASC");
		if(mysql_num_rows($sql)>0)
		{
			while($allCategory=mysql_fetch_assoc($sql))
			{
				array_push($this->availableCategory,$allCategory);
			}
		} else {
			echo 'Product not Available for now!';
		}
		return $this->availableCategory;
	}
}
?>