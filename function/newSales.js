$(document).ready(function(){
	addNewRow();
        // TRIGGER THE ADD PURCHASE LIST
	$("#add").click(function(){
        addNewRow();
	});
    
    // ADD PURCHASE LIST
	function addNewRow(){
		$.ajax({
            url: "./fetch/newList.php",
			method : "POST",
			data : {getNewOrderItem:1},
			success : function(data){
				$("#purchasedList").append(data);
				var n = 0;
				$(".number").each(function(){
					$(this).html(++n);
				})
			}
		})
	}

    // REMOVE ITEM
	$("#remove").click(function(){
            $("#purchasedList").children("tr:last").remove();
	});

    // FUNCTION FOR SEARCH PRODUCT
    $("body").delegate("#searchBcode","click",function(e){
        e.preventDefault();
        var tr = $(this).parent().parent().parent().parent();
        var itemBarcode = $("#barcode").val();
        if(itemBarcode != ""){
            $.ajax({
                url: "./fetch/fetchInventory.php",
                method: "POST",              
                data: {search:1,itemBarcode:itemBarcode},
                success : function(data){
                    data = JSON.parse(data)
                    if(data == '0'){
                        Swal.fire(
                            'Barcode Not Exist',
                            'Please check the item barcode',
                            'warning'
                        )
                    }else if(data == 3){
                        Swal.fire(
                            'No Stock',
                            'Sorry, The item has no stock',
                            'warning'
                        )
                        tr.find("#itemName").val();
                        tr.find("#itemStock").val();
                        tr.find("#itemQty").val(1);
                        tr.find("#itemPrice").val();
                        tr.find("#grandTotal").html();
                    }else{
                            tr.find("#itemName").val(data[0].item_name);
                            tr.find("#itemStock").val(data[0].item_stock);
                            tr.find("#itemQty").val(1);
                            tr.find("#itemPrice").val(data[0].item_price);
                            tr.find("#grandTotal").html("P"+ tr.find("#itemQty").val() * tr.find("#itemPrice").val()+".00");
                    }
                }
            })
        }
    });

    // QUANTITY
    $("#purchasedList").delegate("#itemQty","keyup",function(){
        var qty = $(this);
        var tr = $(this).parent().parent();
        if (isNaN(qty.val())) {
            Swal.fire(
                'Invalid Quantity',
                'Sorry, Please enter a valid quantity',
                'warning'
            )
        }else{
            if ((qty.val() - 0) > (tr.find("#itemStock").val()-0)) {
                Swal.fire(
                    'Invalid Quantity',
                    'Sorry, The Quantity is greater than stock',
                    'warning'
                )
                $("#purchasedList").children("tr:last").remove();
			}else{
                tr.find("#grandTotal").html("P"+ tr.find("#itemQty").val() * tr.find("#itemPrice").val()+".00");
			}
        }
    });

    
});


