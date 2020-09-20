<?php
include 'simple_html_dom.php';
include 'style_admin.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>    
</head>

<body>
<main>
    
    <div class="flex-link">
        <a href="http://localhost/Car_Rental/admin-html.php">ADMIN TOOLS</a>        
    </div>
    
    <h1>Actual car prices from budget.co.uk website</h1>
    
<?php
    
$html = file_get_html('https://secure.budget.co.uk/booking?pickupCountry=GB&pickupState=&pickuplocation=Airport&pickupLocations=AIR_MAN_GB&etaDate=19%2F05%2F20&ETAHour=14&pickupMins=00&returnCountry=GB&returnState=&returnlocation=Airport&returnLocations=&ettDate=20%2F05%2F20&ETTHour=14&dropMins=00&discountNumber=&yds-applicable=1&dateOfBirth=&modifyFlag=false&bookingNumber_DisplayDetails=&surname_DisplayDetails=&hirefleet=car&sortIndicator=&returnDate=20%2F05%2F20&returnHours=14&returnMins=00');

$price = $html->find('p[class="detailed-car-group__price"]');
$type = $html->find('p[class="detailed-car-group__size"]');
$model = $html->find('h3[class="detailed-car-group__make-model"]');

for($i = 0; $i < sizeof($price); $i++) {
    
//parsing string for first part till or word;
   $modelType = explode("or", $model[$i]->plaintext, 2);    
   $data = $modelType[0];
    
    echo "<div class='flex-scrap'>
          <div style='color: #ffeecc'>CAR MODEL: ".$data."</div>  
          <div style='color: #ccffe6'>PRICE: ".$price[$i]->plaintext."</div>
          <div style='color: #b3daff'>CAR TYPE: ".$type[$i]->plaintext."</div>          
         </div>";
}
?>
    
<h1>Banger car prices</h1>

<div style='color: #ffeecc'>CAR TYPE: small town car  PRICE: 40£</div>
<div style='color: #ffeecc'>CAR TYPE: small family hatchback  PRICE: 55£</div>
<div style='color: #ccffe6'>CAR TYPE: large family saloon  PRICE: 75£</div>
<div style='color: #b3daff'>CAR TYPE: medium van  PRICE: 70£</div>    
    
</main>   

</body>
</html>