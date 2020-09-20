

<!DOCTYPE html>
<html>
<head>
    <title></title>    
</head>
<?php
    include 'style_admin.php';
?> 
    
<body>
<main>
    
    <h2>ADMINISTRATOR TOOLS</h2>
    
    <div class="flex-link">
        <a href="http://localhost/Car_Rental/index.php">HOME PAGE</a>
        <a href="http://localhost/Car_Rental/customer_veryfication-html.php">CUSTOMER VERYFICATION</a>
        <a href="http://localhost/Car_Rental/web_scraper-html.php">COMPARE CAR RENTAL PRICES FROM EXTERNAL WEBSITE</a>
    </div>
    
    <div class="flex-container">
        <div id="d0"></div>
        <div id="d1"></div>                                
    </div>
    
    <form class="flex-form" action="back-end/admin.php" method="post">
        <input style="color: white" type="text" name="customerid" placeholder="customer id">
        <p><input type="checkbox" name="blacklisted" value="1">tick to ban</p>
        <p><input type="checkbox" name="unbanning" value="0">tick to unban</p>
        <button type="submit" name="submit-ban">Execute</button>
    </form>   
    
</main>
    
<?php
    include 'admin_customer_blocking.php';
?>    

</body>
</html>