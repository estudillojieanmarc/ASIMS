// FUNCTION TRIGGER     
$(document).ready(function(){
    showSales();
});
// END FUNCTION TRIGGER  




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