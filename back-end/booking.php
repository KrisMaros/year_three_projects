<?php

if(isset($_POST['submit-booking'])) {
    
    require 'dbconn.php';
    
    date_default_timezone_set('Europe/London');
    $userid = $_POST['custid'];
    $carid = $_POST['carID'];   
    $bo_date = date('Y-m-d H:i:s');
    $bo_start_date = $_POST['start-date'];
    $bo_end_date = $_POST['end-date'];    
    $fiveHoursValue = 18000;
    $twoWeeksValue = 1209600;    

    $equipment = bookEquipment();        
    $datestampValue = checkdataTimeStamp($bo_start_date, $bo_end_date);
    $dateOrderCheck = checkdataTimeStamp($bo_start_date, $bo_end_date);
    $startTimeRangeCheck = checkStartTimeInRange($bo_start_date);
    $endTimeRangeCheck = checkEndTimeInRange($bo_end_date);
    $startTimeRangeCheck2 = checkStartTimeInRange($bo_end_date);
    $endTimeRangeCheck2 = checkEndTimeInRange($bo_start_date);

    $sql = "SELECT * FROM booking where car_id=".$carid." ORDER BY bo_start_date ASC;";
    $result = mysqli_query($conn, $sql);
    //checking if number of rows in table is true
    $resultCheck = mysqli_num_rows($result);         

    if($resultCheck >= 0) {

        //fetch data and put in $row as array of records from DB
        while($row = mysqli_fetch_assoc($result)) {                

           //booking avelibility check 1
           $availabilityCheck =  bookingAvailabilityCheck($bo_start_date, $row["bo_start_date"], $row["bo_end_date"]);
           $availabilityCheck2 =  bookingAvailabilityCheck($bo_end_date, $row["bo_start_date"], $row["bo_end_date"]);

           if($availabilityCheck == false) {

                $test1 = strtotime($bo_start_date);
                $test2 = strtotime($row["bo_start_date"]);
                $test3 = strtotime($row["bo_end_date"]);

                header("Location: ../index.php?booking=datebooked&checkedStartTime=$bo_start_date&startTime=$test2&endTime=$test3");
                exit();
           }
           //booking avelibility check 2   
           if($availabilityCheck2 == false) {

                $test1 = strtotime($bo_end_date);
                $test2 = strtotime($row["bo_start_date"]);
                $test3 = strtotime($row["bo_end_date"]);

                header("Location: ../index.php?booking=datebooked&checkedEndTime2=$bo_end_date&startTime2=$test2&endTime2=$test3");
                exit();
           }                              
        }     

        if ($bo_date > $bo_start_date || $bo_date > $bo_end_date) {

            header("Location: ../index.php?booking=date_expire&startTime=$bo_start_date&endTime=$bo_end_date");
            exit();
        }
        else if($dateOrderCheck < 0) {

            header("Location: ../index.php?booking=starting_date_older_then_end_date&test=$dateOrderCheck");
            exit();
        }
//          check if booking greater than 5 hours
        else if ($datestampValue < $fiveHoursValue) {           

            header("Location: ../index.php?booking=booking_less_than_5hours&test=$datestampValue&fiveHoursValue=$fiveHoursValue");
            exit();
        }
        else if ($datestampValue > $twoWeeksValue) {           

            header("Location: ../index.php?booking=booking_more_that_2weeks&datestampValue=$datestampValue&2weeksvalue=$twoWeeksValue");
            exit();
        }
         else if ($startTimeRangeCheck == false) {

            $startTime = date("H:i:s", strtotime('08:00:00'));
            $endTime = date("H:i:s", strtotime('18:00:00'));
            $pickupTime = date("H:i:s", strtotime($bo_start_date));
            $dropoffTime = date("H:i:s", strtotime($bo_end_date));

            header("Location: ../index.php?booking=wrong_time_range&startTime=$startTime&endTime=$endTime&pickupTime=$pickupTime&dropoffTime=$dropoffTime");
            exit();
        }
        else if ($endTimeRangeCheck == false) {

            $startTime = date("H:i:s", strtotime('08:00:00'));
            $endTime = date("H:i:s", strtotime('18:00:00'));
            $pickupTime = date("H:i:s", strtotime($bo_start_date));
            $dropoffTime = date("H:i:s", strtotime($bo_end_date));

            header("Location: ../index.php?booking=wrong_time_range&startTime=$startTime&endTime=$endTime&pickupTime=$pickupTime&dropoffTime=$dropoffTime");
            exit();
        }
        else if ($startTimeRangeCheck2 == false) {

            $startTime = date("H:i:s", strtotime('08:00:00'));
            $endTime = date("H:i:s", strtotime('18:00:00'));
            $pickupTime = date("H:i:s", strtotime($bo_start_date));
            $dropoffTime = date("H:i:s", strtotime($bo_end_date));

            header("Location: ../index.php?booking=wrong_time_range&startTime=$startTime&endTime=$endTime&pickupTime=$pickupTime&dropoffTime=$dropoffTime");
            exit();
        }
        else if ($endTimeRangeCheck2 == false) {

            $startTime = date("H:i:s", strtotime('08:00:00'));
            $endTime = date("H:i:s", strtotime('18:00:00'));
            $pickupTime = date("H:i:s", strtotime($bo_start_date));
            $dropoffTime = date("H:i:s", strtotime($bo_end_date));

            header("Location: ../index.php?booking=wrong_time_range&startTime=$startTime&endTime=$endTime&pickupTime=$pickupTime&dropoffTime=$dropoffTime");
            exit();
        }
        else {

            $sql = "INSERT INTO booking (customer_id, car_id, bo_date, bo_start_date, bo_end_date) VALUES (?, ?, ?, ?, ?)"; 
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {

                header("Location: ../index.php?booking=sqlerror");
                exit();
            }
            else {
                    mysqli_stmt_bind_param($stmt, "sssss", $userid, $carid, $bo_date, $bo_start_date, $bo_end_date);
                    mysqli_stmt_execute($stmt);
                }
        }

        $sql = "SELECT * FROM booking WHERE bo_date='".$bo_date."';";
        $result = mysqli_query($conn, $sql);           

        if (mysqli_num_rows($result)>0) {               

            $row = mysqli_fetch_assoc($result);
            global $booking_id;
            $booking_id = $row['booking_id'];
//          assigned value to pass to a new file
            session_start();
            $_SESSION['booking_id'] = $row['booking_id'];
            $sql2 = "INSERT INTO equipment_booking (equipment_id, booking_id) VALUES (?, ?)";
            $stmt2 = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt2, $sql2)) {

                header("Location: ../index.php?equipmentbooking=sqlerror");
                exit();
            }
            else {
                 foreach ($equipment as $value) {

                    if($value !=0) {

                        mysqli_stmt_bind_param($stmt2, "ss", $value, $booking_id);
                        mysqli_stmt_execute($stmt2);                            
                    }                        
                }
                header("Location: ../back-end/bookingConfirmation-html.php?bookingid=$booking_id");
                exit();
           }
        }
    }            
}    


function checkdataTimeStamp($d1, $d2) {
        
       $date1 = new DateTime($d1);
       $date2 = new DateTime($d2);
       return $date2->getTimestamp() - $date1->getTimestamp(); 
}

function checkStartTimeInRange($t) {
    
    $startTime = date("H:i:s", strtotime('08:00:00'));    
    $pickupTime = date("H:i:s", strtotime($t));   
    
    if($pickupTime >= $startTime) {        
        return true;
    }
    else {
        return false;
    }
}

function checkEndTimeInRange($t) {    
    
    $endTime = date("H:i:s", strtotime('18:00:00'));     
    $dropoffTime = date("H:i:s", strtotime($t));   
    
    if($dropoffTime <= $endTime) {        
        return true;
    }
    else {
        return false;
    }
}

function bookingAvailabilityCheck ($date, $startDate, $endDate) {
    
    $checkDate =  strtotime($date);
    $dateStart = strtotime($startDate);
    $dateEnd = strtotime($endDate);
    
    if(($checkDate >= $dateStart) && ($checkDate <= $dateEnd)) {
        
        return false;
    }    
    else {        
        return true;
    }    
}

function bookEquipment() {
        
            // seting equipment id's
        if(isset($_POST['gps'])) {

            $equipment[0] = $_POST['gps']; 
         }
         else {
             $equipment[0] = 0; 
         }

        if(isset($_POST['baby-seat'])) {

            $equipment[1] = $_POST['baby-seat']; 
         }
         else {
             $equipment[1] = 0; 
         }

         if(isset($_POST['wine-chiller'])) {

            $equipment[2] = $_POST['wine-chiller']; 
         }
         else {
             $equipment[2] = 0; 
         }
        return $equipment;
    }
        
        
