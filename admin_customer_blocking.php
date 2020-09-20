<?php
require 'back-end/dbconn.php';

$sql = "SELECT * FROM customer" ;     
            
    $result = mysqli_query($conn, $sql);           

    if (mysqli_num_rows($result)>0) {
        $i = 0;
        while($row = mysqli_fetch_assoc($result)) {

            $data['customer_id'] = $row['customer_id'];
            $data['cust_user_id'] = $row['cust_user_id'];                
            $data['cust_name'] = $row['cust_name'];                
            $data['cust_address'] = $row['cust_address'];
            $data['cust_age'] = $row['cust_age'];
            $data['cust_blacklisted'] = $row['cust_blacklisted'];

            $json = json_encode($data);
            echo "<div id='emp" .$i. "' style='display: none;' >" . $json . "</div>";
            $i++;                
        }                        
    }   
?>

<script>

var count = <?= $GLOBALS['i'] ?>;

customerView(count);

function customerView(count) {
    
    for(var i=0; i< count; i++) {

        var row = JSON.parse(document.getElementById('emp'+i).innerHTML );
         
        if (row.cust_user_id != 'Admin')  {
            
            document.getElementById('d'+i).innerHTML='<div>Customer id : '+row.customer_id+' || Username : '+row.cust_user_id+
                                                     ' || Name : '+row.cust_name+' || Address : '+row.cust_address+' || Age : '+row.cust_age+
                                                     ' || Blacklisted : '+row.cust_blacklisted+'</div>' ;   
        }          
    }    
}   

</script>