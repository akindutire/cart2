<?php
/* This interface contains the public methods to be implemented */
interface IformSubmitView
{
	
/* This method takes 1 dimensional Array and submit users to the database 
	@params: 1DuserArray        */
	
public function viewUsers();

/* This method takes catName  and submit product category to the database 
	@params: catName        */

public function viewCategory($id);

/* This method takes 1 dimensional Array and cat_id add products to the database 
	@params: productArray,catID       */


public function viewProduct($id);

/* This method takes 1 dimensional Array  the product id,staff id and submit users to the database 
	@params: soldArray,productID,staffID        */


public function viewSoldProduct($dateFrom,$dateTo,$userID,$productID);

/* This method view all soldproducts 
	@params: void arguments      */

public function viewProductCategory();

}

?>