function renderTime(){
    //DATE
    var myDate = new Date();
    var myYear = myDate.getFullYear();
         if(myYear < 1000){
            myYear += 1900;
         }
    var day = myDate.getDay();
    var month = myDate.getMonth();
    var dayM = myDate.getDate();
    var dayArray = new Array("Sunday", "Monday" , "Tuesday" , "Wednesday" , "Thursday" , "Friday" , "Saturday" );
    var monthArray = new Array ("January" ,"February" , "March" , "April" , "May" , "June" , "July" , "August" ,"September" , "October" , "November" , "December");

        //Time
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();
         

        var amPm = ( hours > 12 ) ? "AM" : "PM";
        
        var myDate =document.getElementById("dateDisplay");
        myDate.textContent = ""+dayArray[day]+ " , " +monthArray[month]+ "  " +dayM+ " , " +myYear+ " , " +hours+ " | " +minutes+ " | " +seconds+ " | " +amPm;
        myDate.innerText =  monthArray[month]+ " | " +dayM+ " | " +myYear;
}
renderTime();

      window.onload = displayClock();
      function displayClock(){
         var time = new Date().toLocaleTimeString();
         document.getElementById("clockDisplay").innerHTML = time;
         setTimeout(displayClock, 1000); 
      }