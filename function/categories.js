// FUNCTION TRIGGER     
$(document).ready(function(){
    showTotalCategory();
    page();
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
                                Swal.fire({
                                    title: 'Added Successfully',
                                    text: 'The category have already been stored.',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1000
                                    }).then((result) => {
                                      if (result) {
                                          showTotalCategory();
                                          page();
                                          $("#addCategoryForm").trigger("reset");
                                      }
                                    })
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
        url: './fetch/editCategory.php',
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




// FUNCTION FOR PAGE IN BRAND
function page(){
    $.ajax({
        url	:	"./fetch/fetchAllCategory.php",
        method	:	"POST",
        data	:	{page:1},
        success	:	function(data){
            $("#pageno").html(data);
        }
    })
}
// FUNCTION FOR PAGE IN BRAND





// FUNCTION FOR PAGINATION
$("body").delegate("#page","click",function(){
    var pn = $(this).attr("page");
    $.ajax({
        url	:	"./fetch/fetchAllCategory.php",
        method	:	"POST",
        data	:	{getCategory:1,setPage:1,pageNumber:pn},
        success	:	function(data){
            $("#showCategory").html(data);
        }
    })
});
// FUNCTION FOR PAGINATION








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
                    showCancelButton: false,
                    showConfirmButton: false,
                    timer: 1000
                }).then((result) => {
                    if (result) {
                        showTotalCategory();   
                        page();
                    }
                })
            }
        },
    error:function(error){console.log(error)}  }); 
    }
})
});
// FUNCTION FOR UPDATING CATEGORY DETAILS








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
    showConfirmButton: false,
    timer: 1000
}).then((result) => {
if (result) {
    $('#checkAllCategory').prop("checked", false);
    showTotalCategory();
    page();
}
});
}
});

}
});
// REMOVING ALL THE SELECTED CATEGORY






// SEARCH FUNCTION
$(document).ready(function(){
    // CATEGORIES
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#showCategory tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
// SEARCH FUNCTION