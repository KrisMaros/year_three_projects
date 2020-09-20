<?php


verifyCustomer();

function verifyCustomer() {
    
    require 'dbconn.php';
    require 'insurer_dbconn.php';

    if(isset($_POST['verify-licence'])) {

        $custName = $_POST['cust_name'];
        $custSurname = $_POST['cust_surname'];
        $custDob = date('Y-m-d', strtotime($_POST['cust_dob']));
        $custLicenceNum = $_POST['cust_licence_num'];
        $licenceState = $_POST['licence_state'];
        $suspendDate = $_POST['suspend_date']; 

    //    if(getimagesize($_FILES['licence_img']['tmp_name']) == false) {
    //        
    //        header("Location: ../customer_veryfication-html.php?veryfication=image_not_selected");
    //        exit();
    //    }
    //    else {
    //        $image = addslashes(file_get_contents($_FILES['licence_img']['tmp_name']));     
    //        $image = base64_encode($image);
    //    }

        if(!empty($custName) && !empty($custSurname) && !empty($custDob) && !empty($custLicenceNum) && !empty($licenceState)) {        

            $sqi = "UPDATE customer SET cust_dob=?, cust_licence_num=? 
            WHERE cust_name=? AND cust_family_name=?";        

            $sql = "SELECT * FROM register";

            $result = mysqli_query($conn_insurer, $sql);

            //checking if number of rows in table is true
            $resultCheck = mysqli_num_rows($result);  

            if($resultCheck > 0) {

            //fetch data and put in $row as array of records from DB
            while($row = mysqli_fetch_assoc($result)) {          

                if($custName == $row["reg_name"] && $custSurname == $row["reg_family_name"] 
                   && strtolower($custLicenceNum) == strtolower($row["reg_licence_num"])) {

                    if($licenceState == 'not valid') {

                       $claimDate = $row["reg_claim_date"];                    

                       header("Location: ../customer_veryfication-html.php?veryfication=claims_and_dvla_records_detected&claim_date=$claimDate&suspend_date=$suspendDate");
                       exit(); 
                    }
                    else {

                       $claimDate = $row["reg_claim_date"];

                       header("Location: ../customer_veryfication-html.php?veryfication=claims_detected&claim_date=$claimDate");
                       exit(); 
                    }                   
                }                                          
            }         
        }    
        else {

            header("Location: ../customer_veryfication-html.php?veryfication=empty_field");
            exit();
        }            
            $stmt = $conn->prepare($sqi);        

        if($stmt) {        

            $stmt->bind_param("ssss", $custDob, $custLicenceNum, $custName, $custSurname);
            $stmt->execute();            

            header("Location: ../customer_veryfication-html.php?veryfication=success&dob=$custDob&num=$custLicenceNum&state=$licenceState");
            exit();
        }
        else {

             header("Location: ../customer_veryfication-html.php?veryfication=sqlerror");
             exit();
        }
      }
    } 
}
    
?>    
