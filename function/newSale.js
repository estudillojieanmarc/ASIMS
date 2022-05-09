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
                    if(data == '0'){
                        Swal.fire(
                            'Barcode Not Exist',
                            'Please check the item barcode',
                            'warning'
                        )
                    }else{
                        tr.find("#itemName").val(data);
                        tr.find("#itemStock").val(data);
                        tr.find("#itemPrice").val(data);
                        tr.find("#grandTotal").html(tr.find("#itemQty").val() * tr.find("#itemPrice").val());
                    }
                }
            })
        }
    });





});