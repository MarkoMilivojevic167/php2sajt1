$(document).ready(function() {
    reservationMenu();
});





function reservationMenu(){
    document.querySelector("#buttonReservation").addEventListener("click",function(){
        document.getElementById("reservationDiv").style.width = "400px";
    });
      
      document.querySelector("#exitButtonReservation").addEventListener("click",function(){
        document.getElementById("reservationDiv").style.width = "0";
    });
}