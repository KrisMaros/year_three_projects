<script>
    document.getElementById('car-id').value = "<?php echo $_POST['car-id'];?>";
    
</script>

<?php
 //retriving bookings for car id    
 if(isset($_POST['submit']))  {     
     
    $select_id = $_POST['car-id'] ;     
    
    $sql = "SELECT * FROM booking where car_id=".$select_id." ORDER BY bo_start_date ASC;";

    $result = mysqli_query($conn, $sql);
   
    //checking if number of rows in table is true
    $resultCheck = mysqli_num_rows($result);     
    
    if($resultCheck > 0) {
        $i = 0;
        //fetch data and put in $row as array of records from DB
        while($row = mysqli_fetch_assoc($result)) {          
           
            $data["booking_id"] = $row["booking_id"];
            $data["customer_id"] = $row["customer_id"];
            $data["car_id"] = $row["car_id"];            
            $data["bo_date"] = $row["bo_date"];
            $data["bo_start_date"] = $row["bo_start_date"];
            $data["bo_end_date"] = $row["bo_end_date"];            
            
            $json = json_encode($data);
            echo "<div id='emp" .$i. "' style='display: none;' >" . $json . "</div>";
            $i++;
        }         
    }     
 }   
?>