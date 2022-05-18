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
function deleteSales(){
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
        data: {deleteSaleR: id},
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
        data: {deleteSaleR: saleId},
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





// CREATE EXCEL
$(document).ready(function(){  
$('#createExcel').click(function(){  
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to export this table to excel?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Export it!'
      }).then((result) => {
        if (result.isConfirmed) {
            var excelData = $('#showSalesTable').html();
            window.location = "http://localhost/ASIMS/php/excel.php?data=" +excelData;
            console.log(excelData);
            Swal.fire(
                'Exported!',
                'Inventory Table has been export to excel file',
                'success'
            )
        }
      })
});  
});  
// CREATE EXCEL

