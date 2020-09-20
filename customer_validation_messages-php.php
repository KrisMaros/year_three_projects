<?php

customerValidationMessage();

function customerValidationMessage() {
    
      if(!isset($_GET['veryfication'])) {
            exit();
      }
      else {
          $veryfication_check = $_GET['veryfication'];

          if ($veryfication_check == 'claims_and_dvla_records_detected') {

              $claimDate = $_GET['claim_date'];
              $suspendDate = $_GET['suspend_date'];

              echo "<p class='error'>Customer record found in Association of British Insurers database
                       regarding fraudulent claim that occured at: ".$claimDate." !</p>";
              echo "<p class='error'>Customer record found in DVLA database shows that provided licence has been suspended till           
                    ".$suspendDate." !</p>";        
          }
          else if ($veryfication_check == 'claims_detected') {

              $claimDate = $_GET['claim_date'];
              echo "<p class='error'>Customer record found in Association of British Insurers database
                       regarding fraudulent claim that occured at: ".$claimDate." !</p>";   
          }
          else if ($veryfication_check == 'empty_field') {
              echo "<p class='error'>Some fields are empty !</p>";         
          }
          else if ($veryfication_check == 'sqlerror') {
              echo "<p class='error'>SQL connection error !</p>";         
          }
          else if ($veryfication_check == 'success') {

              echo "<p class='massage'>Veryfication successful !</p>"; 
          }
     }  
}             
 
?>