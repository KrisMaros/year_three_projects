<?php

// booking form 
   if(isset($_SESSION['userId'])) {
       
     $userid = $_SESSION['userId'];     
       
     if(isset($_POST['car-id'])) {
                
        $carid = $_POST['car-id']; 
     }
     else {
         $carid = 1; 
     }         
    
    echo  '<h2>BOOKING FORM</h2>
      <p>All bookings must be completed between 8:00 am to 18:00 pm !</p>
      <p>Minimum booking time is five hours and maximum two weeks !</p>
      <form class="flex-form" action="back-end/booking.php" method="post">
       <div>       
             <input class="input-styling" id="datetime1" placeholder="pick-up time" name="start-date">       
       </div>
        <div>
            <input class="input-styling" id="datetime2" placeholder="drop-off time" name="end-date">';      
            
     echo  '<input type="hidden" name="carID" id="carID" value="'.$carid.'">
            <input type="hidden" name="custid" value="'.$userid.'"><br> 
            <input type="checkbox" name="gps" value="1"> GPS navigation <br> 
            <input type="checkbox" name="baby-seat" value="2"> Baby seat <br> 
            <input type="checkbox" name="wine-chiller" value="3"> Wine chiller
        </div><br>    
       <button type="submit" name="submit-booking">Submit booking</button>         
      </form> '; 
   }
   
?>

<script>
    $("#datetime1").datetimepicker({
//        step: 30
        allowTimes: ['8:00', '9:00', '10:00', '11:00', '12:00', '13:00', '14:00',
                     '15:00', '16:00', '17:00', '18:00']
    });
    
    $("#datetime1").attr("autocomplete", "off");
    
    $("#datetime2").datetimepicker({
//        step: 30
        allowTimes: ['8:00', '9:00', '10:00', '11:00', '12:00', '13:00', '14:00',
                     '15:00', '16:00', '17:00', '18:00']
    });
    
    $("#datetime2").attr("autocomplete", "off");

</script>