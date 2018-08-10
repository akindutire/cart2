<?php
session_start();
class Cart
{
	public  $addProducts = array();
	private $viewProduct = array();
	private $payProduct = array();
    private $deleteProduct = array();
	private $productId;
	private $productQty;
	
	
	public function productPayment($Array1DProducts)
	{
		if(is_array($Array1DProducts))
		{
			$sum = 0;
			if(empty($Array1DProducts))
			{
				echo 'No Products Selected in Cart';
			} else {
			$this->payProduct=$Array1DProducts;
			$table = '<table class="table"><tr><td>S/N</td><td>Product Description</td><td>Quantity</td><td>Unit Price</td><td>Price</td></tr>';
			$sn = 1;
			foreach($this->payProduct as $key => $value)
			{
			 $sql = mysql_query(sprintf("SELECT * FROM product WHERE product_id = '%s'",
			 get_magic_quotes_gpc() ? $key : addslashes($key)));
			 if (mysql_num_rows($sql)> 0)
			 {
				 while($products = mysql_fetch_array($sql))
				 {
					 $sum+= (int)($products['unit_price']*$value); 
					  $table .= '<tr><td> '.$sn.'</td><td>'.$products['product_name'].'</td>
					  <td>'.$value.'</td>
					  <td>'.$products['unit_price'].'</td>
					  <td class="price" id='.$key.'>'.(int)($products['unit_price']*$value).'</td></tr>';
			
			 $sn++;
					 
				 }
			 }
			
			}
			$table .= '<tr><td colspan="5" align="right"> Total Price : '.$sum.' </td></tr>';
			$table .= '</table>';
			
			echo $table;
			//echo json_encode($this->payProduct);
			}
			
		} else {
			echo 'No Product(s) Added yet!';
		}
		return $this;
		
	}
	public function ViewProductz($Array1DProducts)
	{
		if(is_array($Array1DProducts))
		{
			$sum = 0;
			if(empty($Array1DProducts))
			{
				echo 'No Products Selected in Cart';
			} else {
			$this->viewProduct=$Array1DProducts;
			$table = '<table class="table"><tr><td>S/N</td><td>Product Description</td><td>Quantity</td><td>Unit Price</td><td>Price</td><td>Remove</td></tr>';
			$sn = 1;
			foreach($this->viewProduct as $key => $value)
			{
			 $sql = mysql_query(sprintf("SELECT * FROM product WHERE product_id = '%s'",
			 get_magic_quotes_gpc() ? $key : addslashes($key)));
			 if (mysql_num_rows($sql)> 0)
			 {
				 while($products = mysql_fetch_array($sql))
				 {
					 $sum+= (int)($products['unit_price']*$value); 
					  $table .= '<tr><td> '.$sn.'</td><td>'.$products['product_name'].'</td>
					  <td><input type="text" name="qty" value='.$value.' size="3" id='.$key.' class="qty" /></td>
					  <td>'.$products['unit_price'].'</td>
					  <td class="price" id='.$key.'>'.(int)($products['unit_price']*$value).'</td><td>
					  <button type="submit" id='.$key.' class="delete"><i><img src="image/remove.png" /></i></button></td></tr>';
			
			 $sn++;
					 
				 }
			 }
			
			}
			$table .= '<tr><td  align="right" colspan="4"><label style="margin-top:10px; color:green;">Proceed to Payment</label> <button type="submit" id="payment"><i><img src="image/payment.png" /></i></button></td><td colspan="4" align="right"> Total Price : '.$sum.' </td></tr>';
			$table .= '</table>';
			
			echo $table;
			//echo json_encode($this->viewProduct);
			}
			
		} else {
			echo 'No Product(s) Added yet!';
		}
		return $this;
		
	}
	
	public function AddProduct($pID,$pQty)
	{
		if (!empty($pID) && !empty($pQty))
		{
			$this->productId=$pID;
			$this->productQty=$pQty;
		}
		$_SESSION['addProducts'][$this->productId]= $this->productQty;
		return ($_SESSION['addProducts']);
		return $this;
	}
	public function AddProducts($pID,$pQty)
	{
		if (!empty($pID) && !empty($pQty))
		{
			$this->productId=$pID;
			$this->productQty=$pQty;
		}
		$_SESSION['addProducts'][$this->productId]= $this->productQty;
		echo json_encode($_SESSION['addProducts']);
		return $this;
	}
	
	public function ViewProducts($Array1DProducts)
	{
		if(is_array($Array1DProducts))
		{
			$sum = 0;
			if(empty($Array1DProducts))
			{
				echo 'No Products Selected in Cart';
			} else {
			$this->viewProduct=$Array1DProducts;
			$table = '<table class="table"><tr><td>S/N</td><td>Product Description</td><td>Quantity</td><td colspan="2">Price<td></tr>';
			$sn = 1;
			foreach($this->viewProduct as $key => $value)
			{
			 $table .= '<tr><td> '.$sn.'</td><td>Product name display here</td><td><input type="text" name="qty" value='.$value.' size="3" id='.$key.' class="qty" /></td><td class="price" id='.$key.'>'.(int)($key*$value).'</td><td><button type="submit" id='.$key.' class="delete">Delete</button></td></tr>';
			 $sum+= (int)($key*$value);
			 $sn++;
			}
			$table .= '<tr><td colspan="4" align="right"> Total Price : '.$sum.' </td></tr>';
			$table .= '</table>';
			
			echo $table;
			//echo json_encode($this->viewProduct);
			}
			
		} else {
			echo 'No Product(s) Added yet!';
		}
		return $this;
		
	}

    public function deleteProducts($Array1DProducts,$key)
	{
		if(is_array($Array1DProducts) && (!empty($key)))
		{
			$this->deleteProduct=$Array1DProducts;

            if(array_key_exists($key,$this->deleteProduct))
            {
                unset($this->deleteProduct[$key]);
            }
		} else
        {
            echo 'No Product(s) in the view to Delete';
        }
         
		return $this->deleteProduct;
		//return $this;
	}
	 
}

/*mysql_connect("localhost","root","");
mysql_select_db("drugstore");
$productObject = new Cart();
$product = array(1=>2,2=>2);
$productObject->ViewProductz($product);*/
/*$array = array( 1=>2,3=>5);
if (array_key_exists(1,$array))
{
//echo true;
 unset($array[1]);
}
else 
echo false;
print_r($array);
*/