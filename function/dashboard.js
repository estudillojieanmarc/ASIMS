// FUNCTION TRIGGER     
$(document).ready(function(){
    showSales();
    showStocks();
    showNoStocks();
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