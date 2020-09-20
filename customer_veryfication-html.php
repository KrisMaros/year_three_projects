
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--  <link rel="stylesheet" href="/resources/demos/style.css">-->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--  email server -->
  <script src="https://smtpjs.com/v3/smtp.js">

</script>
</head>
<?php
    include 'style_admin.php';    
?> 
    
<body>    
<main>
    
    <h2>CUSTOMER DATA VERYFICATION</h2>
    
    <div class="flex-link">
        <a href="http://localhost/Car_Rental/index.php">HOME PAGE</a>
        <a href="http://localhost/Car_Rental/admin-html.php">ADMIN TOOLS</a>    
    </div>   
    
    <form class="flex-form" action="back-end/customer_veryfication-php.php" method="post" enctype="multipart/form-data">
        <input  type="text" name="cust_name" placeholder="name">
        <input  type="text" name="cust_surname" placeholder="surname">
        <input  id="datepicker" name="cust_dob" placeholder="date of birth">
        <div><input  type="file" name="licence_img">upload licence image</div>
        <div><input  type="file" name="profile_img">upload profile image</div>
        <div><input  type="file" name="bill_img">upload utility bill</div>
        <input  id="bill_date" name="bill_date" placeholder="utility bill date validation">
        <input  id="licence" type="text" name="cust_licence_num" placeholder="DVLA licence validation">
        <input  id="state" type="text" name="licence_state" >
        <input  id="suspend_date" type="text" name="suspend_date" >
        <button id="btn" type="submit" name="verify-licence">Verify licence</button>
    </form>   
    
</main>
    
<?php    
      include 'DVLA_record_date_validation-js.php';
      include 'utility_bill_validation-js.php';
//    include 'display_image-php.php';
      include 'licence_validation-js.php';
      include 'customer_validation_messages-php.php';
      
?>
</body>
</html>