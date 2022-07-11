
// FUNCTION TRIGGER     
$(document).ready(function(){
    showTotalBrand();
    page();   
    count_pending();
});
// END FUNCTION TRIGGER  








// FUNCTION FOR SHOW BRAND CONTENT
    function showTotalBrand(){
        $.ajax({
            url: "./fetch/fetchAllBrands.php",
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
                                Swal.fire({
                                    title: 'Added Successfully',
                                    text: 'The brand have already been stored.',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1000
                                    }).then((result) => {
                                      if (result) {
                                          $('#checkAllBrand').prop("checked", false);
                                          showTotalBrand();
                                          page();
                                      }
                                    })
                            }else if(response == 'Sorry, The brand are already exist'){
                                    Swal.fire(
                                    'Added Failed',
                                    'Sorry, The brand are already exist',
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








// REMOVING ALL THE SELECTED BRAND
$("#checkAllBrand").change(function(){
    $('.checkBrand').prop("checked", $(this).prop("checked"));
    const elements = document.getElementsByClassName('brandRows');
    elements[0].style.backgroundColor = 'green';
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
        showConfirmButton: false,
        timer: 1000
    }).then((result) => {
    if (result) {
        $('#checkAllBrand').prop("checked", false);
        showTotalBrand();
        page();
    }
    });
    }
    });
}
});
// REMOVING ALL THE SELECTED BRAND






// FUNCTION FOR PAGE IN BRAND
function page(){
    $.ajax({
        url	:	"./fetch/fetchAllBrands.php",
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
        url	:	"./fetch/fetchAllBrands.php",
        method	:	"POST",
        data	:	{getBrand:1,setPage:1,pageNumber:pn},
        success	:	function(data){
            $("#showBrand").html(data);
        }
    })
});
// FUNCTION FOR PAGINATION







// SEARCH FUNCTION
$(document).ready(function(){
    // BRAND
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#showBrand tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
// SEARCH FUNCTION








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
                            showCancelButton: false,
                            showConfirmButton: false,
                            timer: 1000
                        }).then((result) => {
                            if (result) {
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