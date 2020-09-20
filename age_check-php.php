<?php

if(isset($_SESSION['age'])) {
       
       $userage = $_SESSION['age'];
   }
   else {
        $userage = 0;
   }        
        
   if($userage <= 25) {       
   
   echo          
       '<h2>CAR RENTAL BOOKING SERVICE</h2>
        <p>List of available cars</p>
        <form class="select-form" action="" method="post">
           <select name="car-id" id="car-id">
              <option value="1">SMALL TOWN CAR (HYBRID) - 40£ per day</option>
              <option value="2">SMALL TOWN CAR (PETROL) - 40£ per day</option>              
           </select>
            <button type="submit" name="submit">Check bookings dates</button>    
        </form> ';
   }
   else {
       
   echo '<h2>CAR RENTAL BOOKING SERVICE</h2>
         <p>available cars list</p>
         <form class="select-form" action="" method="post">
           <select name="car-id" id="car-id">
              <option value="1">SMALL TOWN CAR (HYBRID) - 40£ per day</option>
              <option value="2">SMALL TOWN CAR (PETROL) - 40£ per day</option>
              <option value="3">SMALL FAMILY HATCHBACK (DISEL AUTOMATIC) - 55£ per day</option>
              <option value="4">SMALL FAMILY HATCHBACK (PETROL MANUAL) - 55£ per day</option>
              <option value="5">LARGE FAMILY SALOON - 60£ per day</option>
              <option value="6">LARGE FAMILY ESTATE - 75£ per day</option>
              <option value="7">MEDIUM VAN WHITE - 70£ per day</option>
              <option value="8">MEDIUM VAN BLACK - 70£ per day</option>
           </select>
            <button type="submit" name="submit">Check bookings dates</button>    
        </form>';                  
   }    
?>