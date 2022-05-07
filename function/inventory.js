// FUNCTION TRIGGER     
    $(document).ready(function(){
        showInventory();
        showBrand();
        showAllBrand();
        showAllCategory()
        showCategory();
        pageStock();
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
            if(response == 0){
                data+="<option value='All'>No Brand Stored</option>"
            }else{
                var data = "";
                for(i=0;i<response.length;i++){
                    data+="<option value='"+response[i].brand_id+"'>"+response[i].brand+"</option>"
                }
            }
            $('#itemBrand').html(data)
            $('#updateItemBrand').html(data)
            $('#allItemBrand').html(data)
        },
        error:function(error){
            console.log(error)
        }
    })
    }
// END FUNCTION FOR FETCH BRAND FOR DROP DOWN


// FUNCTION FOR FETCH ALL BRAND FOR DROP DOWN
    function showAllBrand(){
        $.ajax({
        url: './fetch/fetchBrand.php',
        dataType:"json",
        method:"GET",
        success:function(response){
            if(response == 0){
                data+="<option value='All'>No Brand Stored</option>"
            }else{
                var data = "";
                data+="<option value='All'>All Brand</option>"
                for(i=0;i<response.length;i++){
                    data+="<option value='"+response[i].brand_id+"'>"+response[i].brand+"</option>"
                }
            }
                $('#allItemBrand').html(data)
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
            if(response == 0){
                data+="<option value='All'>No Category Stored</option>"
            }else{
                var data = "";
                for(i=0;i<response.length;i++){
                    data+="<option value='"+response[i].cat_id+"'>"+response[i].category+"</option>"
                }
            }
            $('#itemCategory').html(data)
            $('#updateItemCategory').html(data)
            $('#allItemCategory').html(data)
        },
        error:function(error){
            console.log(error)
        }
    })
    }
// END FUNCTION FOR FETCH CATEGORY FOR DROP DOWN


// FUNCTION FOR FETCH ALL CATEGORY FOR DROP DOWN
    function showAllCategory(){
        $.ajax({
        url: './fetch/fetchCategory.php',
        dataType:"json",
        method:"GET",
        success:function(response){
            if(response == 0){
                data+="<option value='All'>No Category Stored</option>"
            }else{
                var data = "";
                data+="<option value='All'>All Category</option>"
                for(i=0;i<response.length;i++){
                    data+="<option value='"+response[i].cat_id+"'>"+response[i].category+"</option>"
                }
            }
            $('#allItemCategory').html(data)
        },
        error:function(error){
            console.log(error)
        }
    })
    }
// END FUNCTION FOR FETCH ALL CATEGORY FOR DROP DOWN


// ADD INVENTORY
    $('#addButton').click(function(){
        var currentForm = $('#addInventoryForm')[0];
        var data = new FormData(currentForm);

        if($('#itemBrand').val()=='' || $('#itemCategory').val()=='' || $('#itemName').val()=='' || $('#itemCode').val()=='' || $('#itemImage').val()=='' || $('#itemDescription').val()=='' || $('#itemStock').val()=='' || $('#itemPrice').val()==''){
            Swal.fire(
            'Submit Failed',
            'Please, Input all the missing fields',
            'warning'
            )
        }else{
            $.ajax({
                    url: "./php/newInventory.php",
                    method: "POST",
                    dataType: "text",
                    data:data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        if(response == 'added Successfully'){
                            showInventory();
                            $("#addInventoryForm").trigger("reset");
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'NEW ITEM HAVE ALREADY BEEN STORED',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                        }else if(response == 'Sorry, failed'){
                                Swal.fire(
                                'Added Failed',
                                'Sorry, The item has not been stored.',
                                'error'
                                )
                        }else if(response == 'Sorry, The item are already exist'){
                                Swal.fire(
                                'Added Failed',
                                'Sorry, The item are already exist',
                                'error'
                            )
                        }else if(response == 'File is not an image.'){
                                Swal.fire(
                                'Added Failed',
                                'Sorry, File is not an image.',
                                'error'
                                )
                        }else if(response == 'Sorry, the file is too large.'){
                                Swal.fire(
                                'Added Failed',
                                'Sorry, The image is too large.',
                                'error'
                                )
                        }else if(response == 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'){
                                Swal.fire(
                                'Added Failed',
                                'Sorry, Only JPG, JPEG, PNG & GIF files are allowed.',
                                'error'
                            )
                        }else if(response == 'Sorry, your file was not uploaded.'){
                                Swal.fire(
                                'Added Failed',
                                'Sorry, Your image was not uploaded.',
                                'error'
                            )
                        }else if(response == 'No brand and category'){
                                Swal.fire(
                                'No Brand and Category',
                                'Please, store first the brand and category',
                                'error'
                        )
                    }
                    },
                    error:function(error){
                        console.log(error)
                    }
                }) 
            }
    })
// END ADD INVENTORY


// SHOW INVENTORY
    function showInventory(){
        $.ajax({
            url: "./fetch/fetchInventory.php",
            method: 'POST',
            data: {getInventory: 1},
            success : function(data) {
                $("#showInventory").html(data);
            }
        })
    }
// END SHOW INVENTORY


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
                            showInventory();
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
        // INVENTORY
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#showInventory tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
// SEARCH FUNCTION



// FUNCTION FOR PAGE IN IN INVENTORY
    function pageStock(){
        $.ajax({
            url: "./fetch/fetchInventory.php",
            method	:	"POST",
            data	:	{page:1},
            success	:	function(data){
                $("#pageno").html(data);
            }
        })
    }
// FUNCTION FOR PAGE IN IN INVENTORY



// FUNCTION FOR PAGINATION IN INVENTORY
    $("body").delegate("#paginationStock","click",function(){
        var pn = $(this).attr("paginationStock");
        $.ajax({
            url	:	"./fetch/fetchInventory.php",
            method	:	"POST",
            data	:	{getInventory:1,setPage:1,pageNumber:pn},
            success	:	function(data){
                $("#showInventory").html(data);
            }
        })
    });
// FUNCTION FOR PAGINATION IN INVENTORY