<?php

$bookingcheck = "";

validatingMessages($bookingcheck);

function validatingMessages($bookingcheck) {
    
    if(!isset($_GET['booking'])) {
        exit();
      }
      else {
          $bookingcheck = $_GET['booking'];

          if ($bookingcheck == 'datebooked') {
              echo "<p class='error'>The date and time is already booked !</p>";         
          }
          else if ($bookingcheck == 'date_expire') {
              echo "<p class='error'>The date expired, select availabe date !</p>";         
          }
          else if ($bookingcheck == 'starting_date_older_then_end_date') {
              echo "<p class='error'>The date range is not valid, select availabe date !</p>";         
          }
          else if ($bookingcheck == 'sqlerror') {
              echo "<p class='error'>Database connection error !</p>";         
          }
          else if ($bookingcheck == 'booking_less_than_5hours') {
              echo "<p class='error'>Car booking must be for minimum five hours !</p>";         
          }
          else if ($bookingcheck == 'booking_more_that_2weeks') {
              echo "<p class='error'>Maximum time for car booking is two weeks !</p>";         
          }
          else if ($bookingcheck == 'wrong_time_range') {
              echo "<p class='error'>Time range is not allowed !</p>";         
          }
          else if ($bookingcheck == 'success') {

              echo "<p class='massage'>Success !</p>"; 
          }
     }   
}

?>