// FUNCTION TRIGGER     
$(document).ready(function(){
    showHistory();
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



// SHOW INVENTORY
function showHistory(){
    $.ajax({
        url: "./fetch/fetchHistory.php",
        method: 'POST',
        data: {getHistory: 1},
        success : function(data) {
            $("#showHistory").html(data);
        }
    })
}
// END SHOW INVENTORY





// SEARCH FUNCTION
$(document).ready(function(){
    // INVENTORY
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#showHistory tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
// SEARCH FUNCTION