// FUNCTION TRIGGER     
    $(document).ready(function(){
        showSales();
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


// ADD SALES
    $('#addSalesButton').click(function(){
        var currentForm = $('#addSalesForm')[0];
        var data = new FormData(currentForm);
        if($('#itemBarcode').val()=='' || $('#itemQty').val()=='' || $('#totalSale').val()==''){
                Swal.fire(
                'Submit Failed',
                'Please, Input all the missing fields',
                'warning'
                )
                }else{
                    $.ajax({
                            url: "./php/addSale.php",
                            method: "POST",
                            dataType: "text",
                            data:data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success:function(response){
                                if(response == 1){
                                    showSales();
                                    $("#addSalesForm").trigger("reset");
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: 'NEW SALE HAS BEEN SUBMIT',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                }else if(response == 0){
                                        Swal.fire(
                                        'Added Failed',
                                        'Sorry, New sale has not been submit.',
                                        'error'
                                        )
                                }else if(response == 'Item barcode are not exist'){
                                        Swal.fire(
                                        'Added Failed',
                                        'Sorry, The item barcode are not exist',
                                        'error'
                                        )
                                }else if(response == 'Sorry not enough stock'){
                                        Swal.fire(
                                        'Added Failed',
                                        'Sorry, Not enough stock',
                                        'error'
                                        )
                                }else if(response == 'try'){
                                    Swal.fire(
                                    'Added Failed',
                                    'Sorry, Not enough stock',
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
// END ADD SALES





// SHOW SALES
    function showSales(){
        $.ajax({
            url: "./fetch/fetchSales.php",
            method: 'POST',
            data: {getSales: 1},
            success : function(data) {
                $("#showSales").html(data);
            }
        })
    }
// SHOW SALES





// SEARCH FUNCTION
    $(document).ready(function(){
        // INVENTORY
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#showSales tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
// SEARCH FUNCTION







// FUNCTION FOR DELETING SALES
    function deleteSales(id){
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to delete this sales?",
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
            data: {deleteSales: id},
        });
        Swal.fire({
            title: 'Sale Deleted',
            text: "Sale was delete successfully",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Continue'
        }).then((result) => {
        if (result.isConfirmed) {
            showSales();
        }
        });
        }
        });
    }
// FUNCTION FOR DELETING SALES





// REMOVING ALL THE SELECTED REPORT SALES
    $("#checkAllSales").change(function(){
    $('.checkSale').prop("checked", $(this).prop("checked"));
    
    });

    $('#deleteAllSales').click(function(e){
    var saleId = [];
    $(':checkbox:checked').each(function(i){
        saleId[i] = $(this).val();
    });
    if(saleId.length === 0){
        Swal.fire(
        'Delete Failed',
        'Please select the sale report to remove',
        'error'
        )
    }else{
        Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to remove this sale report?",
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
            data: {deleteSale: saleId},
        });
        Swal.fire({
            title: 'Sale Report Deleted',
            text: "Sale report was delete successfully",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Continue'
        }).then((result) => {
        if (result.isConfirmed) {
            $('#checkAllSales').prop("checked", false);
            showSales();
        }
        });
        }
        });
    }
    });

// REMOVING ALL THE SELECTED REPORT SALES






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
            url	:	"./fetch/fetchSales.php",
            method	:	"POST",
            data	:	{getSales:1,setPage:1,pageNumber:pn},
            success	:	function(data){
                $("#showSales").html(data);
            }
        })
    });
// FUNCTION FOR PAGINATION