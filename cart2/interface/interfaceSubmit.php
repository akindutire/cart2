<?php
/* This interface contains the public methods to be implemented */
interface IformSubmit
{
/* This method takes 1 dimensional Array and submit users to the database 
	@params: 1DuserArray        */
	
public function addUsers($id,$userArray);

/* This method takes catName  and submit product category to the database 
	@params: catName        */

public function addCategory($id,$catName);

/* This method takes 1 dimensional Array and cat_id add products to the database 
	@params: productArray,catID       */


public function addProduct($id,$catID,$productArray);

/* This method takes 1 dimensional Array  the product id,staff id and submit users to the database 
	@params: soldArray,productID,staffID        */


public function soldProducts($staffID,$soldDate,$soldArray);

}

?>