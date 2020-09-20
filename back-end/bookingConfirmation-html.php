    
<?php
require 'dbconn.php';
//session pass booking_id from booking.php file.
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>    
</head>
<style> 
    
    body { 
        background-color: #48486a;
        color: black;
        font-family: serif;
        
    }
    
    .flex-container {
      display: flex;        
      flex-direction: column;
      border: outset;
    }

    .flex-container > div {
      border: outset;
      background-color: #d9d9d9;
      width: 230px;
      margin: 8px;
      align-self: center;
      text-align: center;
      line-height: 30px;
      font-size: 17px;      
    }    
    
</style>
<body>

<main>
    <div class="flex-container">
        <div id="data1"></div>
        <div id="data2"></div>
        <div id="data3"></div>
        <div id="data4"></div>
        <div id="data5"></div>
        <div id="d0"></div>
        <div id="d1"></div>
        <div id="d2"></div>                
    </div>
    
    <form action="http://localhost/Car_Rental/index.php">
        <input type="submit" value="Home page" />
    </form>
</main>
    
<?php
    include 'booking_confirmation-php.php';
?>
    
</body>
</html>