// FUNCTION TRIGGER     
$(document).ready(function(){
    showNoStock();
    showBrand();
    showCategory();
    pageNoStock();
    count_pending();
});
// END FUNCTION TRIGGER     


// FUNCTION FOR ADDING QTY IN TODO BADGE
    function count_pending(){
    $.ajax({
        url: "./fetch/taskBadge.php",
        method : "POST",
        data : {count_pending:1},
        success : function(data){
            $("#todoQty").html(data);
        }
    })
    }
// FUNCTION FOR ADDING QTY IN TODO BADGE


// FUNCTION FOR FETCH BRAND FOR DROP DOWN
    function showBrand(){
        $.ajax({
        url: './fetch/fetchBrand.php',
        dataType:"json",
        method:"GET",
        success:function(response){
            var data = "";
            data+="<option selected>Brand</option>";
            for(i=0;i<response.length;i++){
                data+="<option value='"+response[i].brand_id+"'>"+response[i].brand+"</option>"
            }
            $('#itemBrand').html(data)
            $('#updateItemBrand').html(data)
        },
        error:function(error){
            console.log(error)
        }
    })
    }
// END FUNCTION FOR FETCH BRAND FOR DROP DOWN






// FUNCTION FOR FETCH CATEGORY FOR DROP DOWN
    function showCategory(){
        $.ajax({
        url: './fetch/fetchCategory.php',
        dataType:"json",
        method:"GET",
        success:function(response){
            var data = "";
            data+="<option selected>Category</option>";
            for(i=0;i<response.length;i++){
                data+="<option value='"+response[i].cat_id+"'>"+response[i].category+"</option>"
            }
            $('#itemCategory').html(data)
            $('#updateItemCategory').html(data)
        },
        error:function(error){
            console.log(error)
        }
    })
    }
// END FUNCTION FOR FETCH CATEGORY FOR DROP DOWN






// SHOW NO STOCK 
    function showNoStock(){
        $.ajax({
            url: "./fetch/fetchNoStock.php",
            method: 'POST',
            data: {getNoStock: 1},
            success : function(data) {
                $("#showNoStock").html(data);
            }
        })
    }
// END SHOW NO STOCK







// FUNCTION FOR FETCH DATA TO THE UPDATE MODAL 
function updateInventory(id){
    $('#updateInventoryModal').modal('show')
    $.ajax({
        url: './fetch/editInventory.php',
        type: 'POST',
        dataType: 'json',
        data: {inventoryId: id},
    })
    .done(function(response) {
        $('#updateItemID').val(response[0].id)
        $('#updateImage').attr("src","/ASIMS/assets/inventory/"+response[0].item_image)
        $('#updateItemName').val(response[0].item_name)
        $('#updateItemCode').val(response[0].item_barcode)
        $('#updateItemDescription').val(response[0].item_description)
        $('#updateItemBrand').val(response[0].item_brand)
        $('#updateItemCategory').val(response[0].item_category)
        $('#updateItemStock').val(response[0].item_stock)
        $('#updateItemPrice').val(response[0].item_price)
        })
}
// FUNCTION FOR FETCH DATA TO THE UPDATE MODAL 







// FUNCTION FOR UPDATING INVENTORY DETAILS
    $('#updateButton').click(function(e){
    e.preventDefault();
    Swal.fire({
    title: 'Are you sure?',
    text: "Do you want to update this item?",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, update it!'
    }).then((result) => {
    if (result.isConfirmed) {
        var currentForm = $('#updateInventoryForm')[0];
        var data = new FormData(currentForm);
        $.ajax({
            url: './php/updateInventory.php',
            method: "POST",
            dataType: "text",
            data:data,
            cache: false,
            contentType: false,
            processData: false,
            success:function(response){
                if(response == 'Sorry, the file is too large.'){
                    Swal.fire(
                    'Update Failed',
                    'Sorry the file is too large.',
                    'error'
                    )
                }else if(response == 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'){
                    Swal.fire(
                    'Update Failed',
                    'Sorry, only JPG, JPEG, PNG & GIF files are allowed.',
                    'error'
                    )
                }else if(response == 1){
                    Swal.fire({
                        title: 'Update Success',
                        text: "Item Details Has Been Updated",
                        icon: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            showNoStock();
                        }
                    })
                }else if(response == 0){
                    Swal.fire(
                    'Update Failed',
                    'Sorry the Medicine details has not updated.',
                    'error'
                    )
                }
            },
        error:function(error){console.log(error)}  }); 
        }
    })
    });
// FUNCTION FOR UPDATING INVENTORY DETAILS






// SEARCH FUNCTION
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#showNoStock tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
// SEARCH FUNCTION







// REMOVING ALL THE SELECTED INVENTORY
$("#checkAllItem").change(function(){
$('.checkItem').prop("checked", $(this).prop("checked"));
});

$('#deleteAll').click(function(e){
var id = [];
$(':checkbox:checked').each(function(a){
    id[a] = $(this).val();
});
if(id.length === 0){
    Swal.fire(
    'Delete Failed',
    'Please select the item to remove',
    'error'
    )
}else{
    Swal.fire({
    title: 'Are you sure?',
    text: "Do you want to delete this item?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Delete it'
    }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
        url: './php/delete.php',
        type: 'POST',
        data: {removeInventory: id},
    });
    Swal.fire({
        title: 'Item Deleted',
        text: "Item was delete successfully",
        icon: 'success',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continue'
    }).then((result) => {
    if (result.isConfirmed) {
        $('#checkAllItem').prop("checked", false);
        showNoStock();
        pageNoStock();
    }
    });
    }
    });

}
});
// REMOVING ALL THE SELECTED INVENTORY






// FUNCTION FOR PAGE IN IN NO INVENTORY
function pageNoStock(){
    $.ajax({
        url: "./fetch/fetchNoStock.php",
        method	:	"POST",
        data	:	{page:1},
        success	:	function(data){
            $("#pageno").html(data);
        }
    })
}
// FUNCTION FOR PAGE IN IN NO INVENTORY






// FUNCTION FOR PAGINATION NO INVENTORY
$("body").delegate("#paginationNoStock","click",function(){
    var pn = $(this).attr("paginationNoStock");
    $.ajax({
        url	:	"./fetch/fetchNoStock.php",
        method	:	"POST",
        data	:	{getNoStock:1,setPage:1,pageNumber:pn},
        success	:	function(data){
            $("#showNoStock").html(data);
        }
    })
});
// FUNCTION FOR PAGINATION NO INVENTORY


