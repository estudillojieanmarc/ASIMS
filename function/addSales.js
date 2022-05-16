// FUNCTION TRIGGER     
    $(document).ready(function(){
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
        data.append('total', $('.total').text());
        if($('#receipNo').val()=='' || $('#purchasedOn').val()=='' || $('#customerName').val()==''  || $('.itemBarcode').val()==''  || $('#quantity').val()==0){
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
                                        'Sorry, Invalid Quantity',
                                        'error'
                                        )
                                }else if(response == 'try'){
                                    Swal.fire(
                                    'Added Failed',
                                    'Sorry, Invalid Quantity',
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





// ADD ROWS
 $(document).ready(function(){
    var i = 1;
    $('#addRows').click(function(){
        i++;
        $('#purchasedList').append('<tr id="row"><td>'+i+'<input type="hidden" class="itemId form-control form-control-sm text-center" name="itemId"></td><td style="width:10rem;"><div class="input-group text-center"><input type="text" class="form-control form-control-sm text-center itemBarcode" name="itemBarcode" placeholder="Item Barcode"><button class="btn btn-outline-secondary btn-sm searchBcode" type="button"><i class="fa-solid fa-magnifying-glass"></i></button></div></td><td class="name"></td><td class="price"></td><td class="stock"></td><td class="px-4"><input type="number" value="0" min="0" class="form-control text-center form-control-sm quantity"></td><td class="total"></td><td><button name="removeR" id="'+i+'" type="button" class="btn btn-danger btn-sm removeRows">Remove</button></td></tr>')});
    
        $(document).on('click', '.removeRows', function(){
            $("#row").remove();
    })
});
// ADD ROWS





// SEARCH PRODUCT
$("body").delegate(".searchBcode","click",function(e){
    let itemBarcode = $(this).parent().find(".itemBarcode").val();
    let quantity = $(this).parent().parent().parent().find(".quantity").val();
    let total = $(this).parent().parent().parent().find(".total").html();
    let price = $(this).parent().parent().parent().find(".price").html();
    e.preventDefault();
    var tr = $(this).parent().parent().parent();
    if(itemBarcode != ''){
        $.ajax({
            url: "./fetch/fetchProduct.php",
            method: "POST",              
            data: {search:1,itemBarcode:itemBarcode},
            success : function(data){
                if(data == 'Barcode Not Exist'){
                    Swal.fire(
                        'Barcode Not Exist',
                        'Please check the item barcode',
                        'warning'
                        )
                    }else if(data == "No Stock"){
                        Swal.fire(
                            'No Stock',
                            'Sorry, The item has no stock',
                            'warning'
                            )
                    }else{
                        data = JSON.parse(data);
                        tr.find(".itemId").val(data[0].id);
                        tr.find(".name").html(data[0].item_name);
                        tr.find(".price").html(data[0].item_price);
                        tr.find(".stock").html(data[0].item_stock);
                        tr.find(".total").html(tr.find(".quantity").val() * tr.find(".price").html());                     
                }
            }
        })
    }
});
// SEARCH PRODUCT