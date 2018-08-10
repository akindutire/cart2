// JavaScript Document
$(function()
{
	/*  Search for products by category */
    $('#payment').click(function () {
        result = $(this).val();
        $.ajax({
            url: 'payment.php',
            type: 'POST',
            data: {},
            success: function (data) {
                $('#viewProducts').html();
                $('#viewProducts').html(data);
                //window.location = 'view.php';

            }
        });
    });

    /* End of Search for products by category    */
	
	
	/*  Search for products by category */
    $('#searchcategory').change(function () {
        result = $(this).val();
        $.ajax({
            url: 'searchCategory.php',
            type: 'POST',
            dataType: "JSON",
            data: { 'keyword': result,},
            success: function (data) {
                var tableData = '<table class="table" width="100%"><tr><td id="ajaxresult" colspan="2"  style="color:#2A9F00; text-align:center; font-size:14px;"></td></tr>';
                tableData+='<tr><td>Product Description</td><td>Add Product</td></tr>';
				$.each(data, function (k, v) {
					
                    tableData += '<tr><td>'+v.product_name+'</td><td><button type="submit" value="'+v.product_id+'" class="button"><i><img src="image/add.png" /></i></button></td></tr>';
                });
      
                tableData += '<tr><td colspan="2"><label><a href="viewSales.php">Proceed &raquo; </a></label></td></tr></table>';
                //alert(tableData);
                $('#searchCategory').html();
                $('#searchCategory').html(tableData);
                //window.location = 'view.php';

            }
        });
    });

    /* End of Search for products by category    */
	
	/*  Search for products */
    $('#search').keyup(function () {
        result = $(this).val();
        $.ajax({
            url: 'searchProduct.php',
            type: 'POST',
            dataType: "JSON",
            data: { 'keyword': result,},
            success: function (data) {
                var tableData = '<table class="table" width="100%"><tr><td id="ajaxresult" colspan="2"  style="color:#2A9F00; text-align:center; font-size:14px;"></td></tr>';
                tableData+='<tr><td>Product Description</td><td>Add Product</td></tr>';
				$.each(data, function (k, v) {
					
                    tableData += '<tr><td>'+v.product_name+'</td><td><button type="submit" value="'+v.product_id+'" class="button"><i><img src="image/add.png" /></i></button></td></tr>';
                });
      
                tableData += '<tr><td colspan="2"><label><a href="viewSales.php">Proceed &raquo; </a></label></td></tr></table>';
                //alert(tableData);
                $('#searchResult').html();
                $('#searchResult').html(tableData);
                //window.location = 'view.php';

            }
        });
    });

    /* End of Search for products    */
	
	/* create user    */
	
	$('#createUser').click(function()
	{
		
		var counter = 0;
		var proffFields = $('form').find('input','select');
		proffFields.each(function(index, element) {
            if($(this).val()==0){
				counter++;
				$(this).css('border-color','#A00');
			} else {
				$(this).css('border-color','#2A9F00');
			}
        });
		if (counter==0)
		{
			var username = $('#username').val();
			var password = $('#password').val();
			var role = $('#role').val();
			var status = $('#status').val();
			$.ajax({
				url:'ProcreateUser.php',
				type:"POST",
				data:{'username':username,'password':password,'role':role,'status':status},
				beforeSend: function()
				{
					$('.ajaxMsg').html('<img src="image/ajax-loader.gif" />');
				},
				success: function(data)
				{
					$('.ajaxMsg').css('color','#2A9F00').html(data);
				}
				
				});
		} else {
			var msg = '<img src="image/error.png" /> Fields highlighted in reds should be filled!';
			$('.ajaxMsg').html(msg);
		}
		return false;
		
	});
	
	/*  end of create user                               */
	
	
	/*   Manage User */
	
	
	$('#manageUser').click(function()
	{
		
			var username = $('#username').val();
			var role = $('#role').val();
			var status = $('#status').val();
			$.ajax({
				url:'PromanageUser.php',
				type:"POST",
				data:{'username':username,'role':role,'status':status},
				beforeSend: function()
				{
					$('.ajaxMsg').html('<img src="image/ajax-loader.gif" />');
				},
				success: function(data)
				{
					$('.ajaxMsg').css('color','#2A9F00').html(data);
				}
				
				});
		return false;
		
	});
	
	
	/*  End of manage user          */
	
	
	 
	 /*  create product                  */
	 
	$('#createProduct').click(function()
	{
		
		var counter = 0;
		    var productId = $('#productId').val();
		    var product =  $('#prodt').val();
			var quantity = $('#quantity').val();
			var costprice = $('#costprice').val();
			var unitprice = $('#unitprice').val();
			var category = $('#category').val();
			
		var proffFields = $('form').find('input');
		proffFields.each(function(index, element) {
            if($(this).val()==0){
				counter++;
				$(this).css('border-color','#A00');
			} else {
				$(this).css('border-color','#2A9F00');
			}
        });
		if (counter==0)
		{
			$.ajax({
				url:'ProcreateProduct.php',
				type:"POST",
				data:{'product':product,'quantity':quantity,'costprice':costprice,'unitprice':unitprice,'cat_id':category,'productId':productId},
				beforeSend: function()
				{
					$('.ajaxMsg').html('<img src="image/ajax-loader.gif" />');
				},
				success: function(data)
				{
					$('.ajaxMsg').css('color','#2A9F00').html(data);
				}
				
				});
		} else {
			var msg = '<img src="image/error.png" /> Fields highlighted in reds should be filled!';
			$('.ajaxMsg').html(msg);
		}
		return false;
		
	});
	
	/*   end of create product           */
	
	$('#createCategory').click(function()
	{
		
		var counter = 0;
			var category = $('#category').val();
			var categoryId = $('#categoryId').val();
			
		var proffFields = $('form').find('input');
		proffFields.each(function(index, element) {
            if($(this).val()==0){
				counter++;
				$(this).css('border-color','#A00');
			} else {
				$(this).css('border-color','#2A9F00');
			}
        });
		if (counter==0)
		{
			$.ajax({
				url:'ProcreateCategory.php',
				type:"POST",
				data:{'category':category,'categoryId':categoryId},
				beforeSend: function()
				{
					$('.ajaxMsg').html('<img src="image/ajax-loader.gif" />');
				},
				success: function(data)
				{
					$('.ajaxMsg').css('color','#2A9F00').html(data);
				}
				
				});
		} else {
			var msg = '<img src="image/error.png" /> Fields highlighted in reds should be filled!';
			$('.ajaxMsg').html(msg);
		}
		return false;
		
	});
	
	$('#login').click(function()
	{
		
		var counter = 0;
			var username = $('#username').val();
			var password = $('#password').val();
			
		var proffFields = $('form').find('input');
		proffFields.each(function(index, element) {
            if($(this).val()==0){
				counter++;
				$(this).css('border-color','#A00');
			} else {
				$(this).css('border-color','#2A9F00');
			}
        });
		if (counter==0)
		{
			$.ajax({
				url:'ProLogin.php',
				type:"POST",
				data:{'username':username,'password':password},
				beforeSend: function()
				{
					$('.ajaxMsg').html('<img src="image/ajax-loader.gif" />');
				},
				success: function(data)
				{
					if(data=='dashboard.php')
					{
					window.location=data;
					} else {
						$('.ajaxMsg').html();
						$('.ajaxMsg').css('color','#A00').html(data);
					}
				},
				complete:function()
				{
					/*$('.ajaxMsg').css('color','#2A9F00').html('Login was Successfull Processed!');*/
				}
				
				});
		} else {
			var msg = '<img src="image/error.png" /> Field(s) highlighted in reds should be filled!';
			$('.ajaxMsg').html(msg);
		}
		return false;
		
	});
});