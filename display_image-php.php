<?php    
    
    displayImage();
    
    function displayImage() {
        
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $db_name = "new_car_booking";

        $conn = mysqli_connect($servername, $db_username, $db_password, $db_name);

        if(!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
        
        $sql = "select * from customer";
        
        $result = mysqli_query($conn, $sql);
        
        $resultCheck = mysqli_num_rows($result);         

        if($resultCheck >= 0) {
           
            while($row = mysqli_fetch_assoc($result)) {
        
                echo '<img height="300" width="300" src="data:image;base64,'.$row['cust_img_licence'].'"> ';
                echo '<div>'.$row['cust_licence_num'].'</div>';
           }           
        }        
    }   
?>