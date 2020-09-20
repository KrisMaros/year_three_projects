<?php

accountVeryfication();

function accountVeryfication() {
    
   require 'dbconn.php';
  
    if(isset($_POST['submit-ban'])) {

        $customerId = $_POST['customerid'];
        $banned = $_POST['blacklisted'];
        $unbanned = $_POST['unbanning'];

        if(isset($_POST['blacklisted'])) {

            $sql = "UPDATE customer SET cust_blacklisted=? WHERE customer_id=?";
            $value = $banned;
        }
        else if (isset($_POST['unbanning'])) {

            $sql = "UPDATE customer SET cust_blacklisted=? WHERE customer_id=?";
            $value = $unbanned;
        }
        else {

            header("Location: ../admin-html.php?banning=checkbox_not_set");
            exit();
        }

        $stmt = $conn->prepare($sql);

        if($stmt) {
            $stmt->bind_param("ii", $value, $customerId);
            $stmt->execute();

            header("Location: ../admin-html.php?banning=success&value=$value&id=$customerId");
            exit();
        }
        else {

             header("Location: ../admin-html.php?banning=sqlerror");
             exit();
        }
    }
}    
?>    