// FUNCTION TRIGGER     
$(document).ready(function(){
    showSales();
    showStocks();
    showNoStocks();
    showTask();
    count_pending();
});
// END FUNCTION TRIGGER 



// FUNCTION FOR SHOW TOTAL SALES
function showSales(){
    $.ajax({
        url: "./fetch/totalSales.php",
        method: 'POST',
        data: {getSales: 1},
        success : function(data) {
            $("#totalSales").html(data);
        }
    })
}
// FUNCTION FOR SHOW TOTAL SALES

// FUNCTION FOR SHOW TOTAL STOCKS
function showStocks(){
    $.ajax({
        url: "./fetch/totalStocks.php",
        method: 'POST',
        data: {getStocks: 1},
        success : function(data) {
            $("#totalStocks").html(data);
        }
    })
}
// FUNCTION FOR SHOW TOTAL STOCKS

// FUNCTION FOR SHOW TOTAL NO STOCKS 
function showNoStocks(){
    $.ajax({
        url: "./fetch/totalNoStocks.php",
        method: 'POST',
        data: {getNoStocks: 1},
        success : function(data) {
            $("#totalNoStocks").html(data);
        }
    })
}
// FUNCTION FOR SHOW TOTAL NO STOCKS 

// FUNCTION FOR SHOW TOTAL NO STOCKS 
function showTask(){
    $.ajax({
        url: "./fetch/totalTask.php",
        method: 'POST',
        data: {getTask: 1},
        success : function(data) {
            $("#totalTask").html(data);
        }
    })
} 
// FUNCTION FOR SHOW TOTAL NO STOCKS 

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

