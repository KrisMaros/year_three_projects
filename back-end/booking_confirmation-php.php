<?php
$booking_id = $_SESSION['booking_id'];

//checked query    
$sql = "SELECT * FROM booking bo 
        LEFT JOIN car cu  
        ON cu.car_id = bo.car_id
        LEFT JOIN equipment_booking eb
        ON eb.booking_id = bo.booking_id
        LEFT JOIN equipment eq
        ON eb.equipment_id = eq.equipment_id
        WHERE bo.booking_id = $booking_id" ;     
            
        $result = mysqli_query($conn, $sql);           

        if (mysqli_num_rows($result)>0) {
            $i = 0;
            while($row = mysqli_fetch_assoc($result)) {
                
                $data['bo_date'] = $row['bo_date'];
                $data['bo_start_date'] = $row['bo_start_date'];
                $data['bo_end_date'] = $row['bo_end_date'];
                $data['car_type'] = $row['car_type'];                
                $data['car_price'] = $row['car_price'];
//              looped three times
                $data['equip_name'] = $row['equip_name'];
                
                $json = json_encode($data);
                echo "<div id='emp" .$i. "' style='display: none;' >" . $json . "</div>";
                $i++;                
            }                        
        }
?>
    
<script>
    
var count = <?= $GLOBALS['i'] ?>;

for(var i=0; i< count; i++) {

    var row = JSON.parse(document.getElementById('emp'+i).innerHTML );

    if (i == 0)  {

        document.getElementById('data1').innerHTML='<div>Booking date : '+row.bo_date+'</div>' ;
        document.getElementById('data2').innerHTML='<div>Pick-up time : '+row.bo_start_date+'</div>' ;
        document.getElementById('data3').innerHTML='<div>Drop-off time : '+row.bo_end_date+'</div>' ;
        document.getElementById('data4').innerHTML='<div>Car type booked : '+row.car_type+'</div>' ;

        var totalPrice = totalPrice(row.bo_start_date, row.bo_end_date, row.car_price);
        document.getElementById('data5').innerHTML='<div>Total price : '+totalPrice+'£ </div>' ;
    }

    if (row.equip_name != null) {

        document.getElementById('d'+i).innerHTML='<div>Equipment requested : '+row.equip_name+'</div>' ;
    }        
}
     
    
function totalPrice(date1, date2, price)  {        
        
    var rate = 0;
    var total = 0;
    var diffTime = Math.abs(Date.parse(date2) - Date.parse(date1));
    var hours = Math.ceil(diffTime / (1000*60*60));

    if (hours == 5) {
        return price / 2; 
    }
    else if (hours > 24) {
       rate = hours / 24;
       total = rate * price;            
       return total;
    }
    else if (hours <= 24) {

        return total = price; 
    }
    else {
        return 0;
    }        
}
    
</script> 