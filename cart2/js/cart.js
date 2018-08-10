// JavaScript Document
$(function () {
	
	/* Adding Products to cart*/
    $(document).delegate(".button","click",function() {
        result = $(this).val();
        productQty = 1;
        $.ajax({
            url: 'add.php',
            type: 'POST',
            dataType: "JSON",
            data: { 'key': result, 'value': productQty },
            success: function (data) {
                i = 0;
                $.each(data, function (k, v) {
                    //alert(k);
                    i++;
                });
                $('#ajaxresult').html(i + ' Items in the Cart ');
            }
        });
        return false;
    });

    /* End of Adding Products to cart*/
	
    /* Adding Products to cart*/
    $('.button').on('click',function() {
        result = $(this).val();
        productQty = 1;
        $.ajax({
            url: 'add.php',
            type: 'POST',
            dataType: "JSON",
            data: { 'key': result, 'value': productQty },
            success: function (data) {
                i = 0;
                $.each(data, function (k, v) {
                    //alert(k);
                    i++;
                });
                $('#result').html(i + ' Items in the Cart ');
            }
        });
        return false;
    });

    /* End of Adding Products to cart*/


    /*  Update of quantity from the view */
    $('.qty').blur(function () {
        result = $(this).attr('id');
        productQty = $(this).val();
		//alert(productQty);
        $.ajax({
            url: 'update.php',
            type: 'POST',
            data: { 'key': result, 'value': productQty },
            success: function (data) {
				
				if (data=='true')
				{ window.location = 'viewsales.php';
				}else if(data==0)
				{
					alert(data);
				}else {
					alert('Quantity Left is ' + data);
					//$(this).attr('value',data);
				}

            }
        });
        return false;
    });

    /* End of Quantity update from view   */

      /*  Delete of quantity from the view */
    $('.delete').click(function () {
        result = $(this).attr('id');
        //productQty = $(this).val();
        $.ajax({
            url: 'delete.php',
            type: 'POST',
            dataType: "JSON",
            data: { 'key': result},
            success: function (data) {
				//alert(data);
               /* var sum = 0;

                var tableData = '<table><tr><td>Product ID</td><td>Quantity</td><td>Price</td></tr>';
                $.each(data, function (k, v) {
                    sum += parseFloat(k * v);
                    tableData += '<tr><td> ' + k + '</td><td><input type="text" name="qty" value=' + v + ' size="3" id=' + k + ' class="qty" /></td><td class="price" id=' + k + '>' + parseFloat(k * v) + '</td></tr>';
                });
                tableData += '<tr><td colspan="3" align="right"> Total Price : ' + sum + ' </td></tr>';
                tableData += '</table>';
                //alert(tableData);
                $('#viewProducts').html();
                $('#viewProducts').html(tableData);*/
                window.location = 'viewsales.php';

            }
        });
        return false;
    });

    /* End of Delete of quantity from the view  */
});

