// FUNCTION TRIGGER     
$(document).ready(function(){
    showInventory();
    showCategory();
    showBrand();
    showTotalCategory();
    showTotalBrand();
    showNoStock();
});
// END FUNCTION TRIGGER     









// ADD INVENTORY
    $('#addButton').click(function(){
        var currentForm = $('#addInventoryForm')[0];
        var data = new FormData(currentForm);
        if($('#itemName').val()=='' || $('#itemCode').val()=='' 
        || $('#itemImage').val()=='' || $('#itemDescription').val()=='' 
        || $('#itemStock').val()=='' || $('#itemCategory').val()=='' || $('#itemPrice').val()==''){
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










// ADD BRAND
    $('#addBrandButton').click(function(event){
        event.preventDefault();
        var currentForm = $('#addBrandForm')[0];
        var data = new FormData(currentForm);
        if($('#brandName').val() == '' ){
                Swal.fire(
                'Submit Failed',
                'Please, Input the missing field',
                'warning'
                )
                }else{
                    $.ajax({
                            url: "./php/newBrand.php",
                            method: "POST",
                            dataType: "text",
                            data:data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success:function(response){
                                if(response == 'Added Successfully'){
                                    $('#checkAllBrand').prop("checked", false);
                                    showTotalBrand();
                                    showBrand();
                                    $("#addBrandForm").trigger("reset");
                                        Swal.fire(
                                        'Added Successfully',
                                        'The brand have already been stored.',
                                        'success'
                                        )
                                }else if(response == 'Sorry, Added Failed'){
                                        Swal.fire(
                                        'Added Failed',
                                        'Sorry, The brand has not been stored.',
                                        'error'
                                        )
                                }else if(response == 'Sorry, Added Failed'){
                                        Swal.fire(
                                        'Added Failed',
                                        'Sorry, The brand are already exist',
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
// END ADD BRAND











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









// ADD CATEGORY
    $('#addCategoryButton').click(function(event){
        event.preventDefault();
        var currentForm = $('#addCategoryForm')[0];
        var data = new FormData(currentForm);
        if($('#category').val() == '' ){
                Swal.fire(
                'Submit Failed',
                'Please, Input the missing field',
                'warning'
                )
                }else{
                    $.ajax({
                            url: "./php/newCategory.php",
                            method: "POST",
                            dataType: "text",
                            data:data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success:function(response){
                                if(response == 'added Successfully'){
                                    showTotalCategory();
                                    showCategory();
                                    $("#addCategoryForm").trigger("reset");
                                        Swal.fire(
                                        'Added Successfully',
                                        'The category have already been stored.',
                                        'success'
                                        )
                                }else if(response == 'Sorry, Failed'){
                                        Swal.fire(
                                        'Added Failed',
                                        'Sorry, The category has not been stored.',
                                        'error'
                                        )
                                }else if(response == 'Sorry, Failed'){
                                    Swal.fire(
                                    'Added Failed',
                                    'Sorry, The category has not been stored.',
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
// END ADD CATEGORY










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









// FUNCTION FOR DELETING INVENTORY
    function DeleteInventory(id){
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
            dataType: 'json',
            data: {deleteInventory: id},
        });
        Swal.fire({
            title: 'Item Deleted',
            text: "Item was delete successfully",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Continue'
        }).then((result) => {
        if (result.isConfirmed) {
            showInventory();
        }
        });
        }
        });
    }
// FUNCTION FOR DELETING INVENTORY










// SEARCH FUNCTION
    $(document).ready(function(){
        // INVENTORY
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#showInventory tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        // CATEGORIES
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#showCategory tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        // BRAND
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#showBrand tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#showNoStock tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
// SEARCH FUNCTION








// FUNCTION FOR SHOW CATEGORY CONTENT
    function showTotalCategory(){
        $.ajax({
            url: "./fetch/fetchAllCategory.php",
            method: 'POST',
            data: {getCategory: 1},
            success : function(data) {
                $("#showCategory").html(data);
            }
        })
    }
// FUNCTION FOR SHOW CATEGORY CONTENT









// FUNCTION FOR FETCH DATA TO THE CATEGORY UPDATE MODAL 
    function updateCategory(id){
        $('#updateCategoryModal').modal('show')
        $.ajax({
            url: './fetch/updateCategory.php',
            type: 'POST',
            dataType: 'json',
            data: {categoryID: id},
        })
        .done(function(response) {
            $('#updateCat_id').val(response[0].cat_id)
            $('#updateCategory').val(response[0].category)
            })
    }
// FUNCTION FOR FETCH DATA TO THE CATEGORY UPDATE MODAL








// FUNCTION FOR SHOW BRAND CONTENT
    function showTotalBrand(){
        $.ajax({
            url: "./fetch/fetchAllBrand.php",
            method: 'POST',
            data: {getBrand: 1},
            success : function(data) {
                $("#showBrand").html(data);
            }
        })
    }
// FUNCTION FOR SHOW BRAND CONTENT








// FUNCTION FOR FETCH DATA TO THE BRAND UPDATE MODAL 
    function updateBrand(id){
        $('#updateBrandModal').modal('show')
        $.ajax({
            url: './fetch/editBrand.php',
            type: 'POST',
            dataType: 'json',
            data: {brandID: id},
        })
        .done(function(response) {
            $('#updatebrand_id').val(response[0].brand_id)
            $('#updateBrand').val(response[0].brand)
            })
    }
// FUNCTION FOR FETCH DATA TO THE BRAND UPDATE MODAL










// FUNCTION FOR FETCH DATA TO THE CATEGORY UPDATE MODAL 
    function updateCategory(id){
    $('#updateCategoryModal').modal('show')
    $.ajax({
        url: './fetch/editCategory.php',
        type: 'POST',
        dataType: 'json',
        data: {categoryId: id},
    })
    .done(function(response) {
        $('#updateCat_id').val(response[0].cat_id)
        $('#updateCategory').val(response[0].category)
        })
    }
// FUNCTION FOR FETCH DATA TO THE CATEGORY UPDATE MODAL








// FUNCTION FOR UPDATING BRAND DETAILS
    $('#updateBrandButton').click(function(e){
    e.preventDefault();
    Swal.fire({
    title: 'Are you sure?',
    text: "Do you want to update this brand?",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, update it!'
    }).then((result) => {
    if (result.isConfirmed) {
        var currentForm = $('#updateBrandForm')[0];
        var data = new FormData(currentForm);
        $.ajax({
            url: './php/updateBrand.php',
            method: "POST",
            dataType: "text",
            data:data,
            cache: false,
            contentType: false,
            processData: false,
            success:function(response){
                if(response == 0){
                    Swal.fire(
                    'Update Failed',
                    'Sorry the item was not update',
                    'error'
                    )
                }else if(response == 1){
                    Swal.fire({
                        title: 'Update Success',
                        text: "Brand Has Been Updated",
                        icon: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            showTotalBrand();                        
                        }
                    })
                }
            },
        error:function(error){console.log(error)}  }); 
        }
    })
    });
// FUNCTION FOR UPDATING BRAND DETAILS










// FUNCTION FOR UPDATING CATEGORY DETAILS
    $('#updateCategoryButton').click(function(e){
    e.preventDefault();
    Swal.fire({
    title: 'Are you sure?',
    text: "Do you want to update this category?",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, update it!'
    }).then((result) => {
    if (result.isConfirmed) {
        var currentForm = $('#updateCategoryForm')[0];
        var data = new FormData(currentForm);
        $.ajax({
            url: './php/updateCategory.php',
            method: "POST",
            dataType: "text",
            data:data,
            cache: false,
            contentType: false,
            processData: false,
            success:function(response){
                if(response == 0){
                    Swal.fire(
                    'Update Failed',
                    'Sorry the category was not update',
                    'error'
                    )
                }else if(response == 1){
                    Swal.fire({
                        title: 'Update Success',
                        text: "Category Has Been Updated",
                        icon: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            showCategory();
                            showTotalCategory();                        
                        }
                    })
                }
            },
        error:function(error){console.log(error)}  }); 
        }
    })
    });
// FUNCTION FOR UPDATING CATEGORY DETAILS











// FUNCTION FOR DELETING CATEGORY
    function deleteCategory(id){
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to remove this category?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Remove it'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
            url: './php/delete.php',
            type: 'POST',
            dataType: 'json',
            data: {removeCategory: id},
        });
        Swal.fire({
            title: 'Category Deleted',
            text: "Category was delete successfully",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Continue'
        }).then((result) => {
        if (result.isConfirmed) {
            showTotalCategory();
        }
        });
        }
        });
    }
// FUNCTION FOR DELETING CATEGORY












// FUNCTION FOR DELETING BRAND
    function deleteBrand(id){
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to remove this brand?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Remove it'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
            url: './php/delete.php',
            type: 'POST',
            dataType: 'json',
            data: {removeBrand: id},
        });
        Swal.fire({
            title: 'Brand Deleted',
            text: "Brand was delete successfully",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Continue'
        }).then((result) => {
        if (result.isConfirmed) {
            showTotalBrand();
        }
        });
        }
        });
    }
// FUNCTION FOR DELETING BRAND







// HIGHLIGHT THE TABLE DATA
    $(document).ready(function(){
        $("#showInventory tbody tr#stockRows").each(function() {
        var $tableCells = $('td', this);

        if($tableCells.text() === 1 ){
            $('#stockRows').attr("class","bg-danger")
        }else{
            $tableCells.css('backgroundColor','yellow');  
        }
        });
    });
// HIGHLIGHT THE TABLE DATA






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
        }
        });
        }
        });

    }
    });
// REMOVING ALL THE SELECTED INVENTORY





// REMOVING ALL THE SELECTED CATEGORY
    $("#checkAllCategory").change(function(){
            $('.checkCategory').prop("checked", $(this).prop("checked"));
    });

    $('#deleteAllCategory').click(function(e){
    var categoryId = [];
    $(':checkbox:checked').each(function(a){
        categoryId[a] = $(this).val();
    });
    if(categoryId.length === 0){
        Swal.fire(
        'Delete Failed',
        'Please select the category to remove',
        'error'
        )
    }else{
        Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to remove this category?",
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
            data: {deleteCategory: categoryId},
        });
        Swal.fire({
            title: 'Category Deleted',
            text: "Category was delete successfully",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Continue'
        }).then((result) => {
        if (result.isConfirmed) {
            $('#checkAllCategory').prop("checked", false);
            showCategory();
        }
        });
        }
        });

    }
    });
// REMOVING ALL THE SELECTED CATEGORY






// REMOVING ALL THE SELECTED BRAND
    $("#checkAllBrand").change(function(){
    $('.checkBrand').prop("checked", $(this).prop("checked"));
    });

    $('#deleteAllBrand').click(function(e){
    var brandId = [];
    $(':checkbox:checked').each(function(b){
        brandId[b] = $(this).val();
    });
    if(brandId.length === 0){
        Swal.fire(
        'Delete Failed',
        'Please select the brand to remove',
        'error'
        )
    }else{
        Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to remove this brand?",
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
            data: {deleteBrand: brandId},
        });
        Swal.fire({
            title: 'Brand Deleted',
            text: "Brand was delete successfully",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Continue'
        }).then((result) => {
        if (result.isConfirmed) {
            $('#checkAllBrand').prop("checked", false);
            showBrand();
        }
        });
        }
        });

    }
    });

// REMOVING ALL THE SELECTED BRAND