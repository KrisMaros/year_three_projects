<?php
      
      include_once 'back-end/dbconn.php';     
      session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel=stylesheet href="jquery.datetimepicker.min.css">
    <script src="jquery.js"></script>
    <script src="jquery.datetimepicker.full.js"></script>
    
</head>    
    
<?php
    include 'style.php';
?>
    
<body>       
    
<?php
   include 'login_logout_handler-php.php';    
   include 'age_check-php.php';
?>
    
<main class="flex-container">
    
    <div id="d0"></div>
    <div id="d1"></div>
    <div id="d2"></div>
    <div id="d3"></div>
    <div id="d4"></div>
    <div id="d5"></div>
    <div id="d6"></div>
    <div id="d7"></div>
    <div id="d8"></div>
    <div id="d9"></div>
    <div id="d10"></div>   
       
</main>   
    
<?php
    include 'get_bookings-php.php';
    include 'validation_functions-js.php';
    include 'booking_view_parser-js.php';
    include 'booking_form-php.php';
    include 'form_validation_messages-php.php';
?>
    
</body>
</html>