<?php

if(isset($_POST['login-submit'])) {
    
    
    $userid = $_POST['userid'];
    $password = $_POST['pwd']; 
    checkCredentials($userid, $password);  
}
else {
    header("Location: ../index.php");
    exit();
}

function checkCredentials($userid, $password) {
    require 'dbconn.php';
    
    if(empty($userid) || empty($password)) {
        header("Location: ../index.php?login=emptyfields");
        exit();        
    }
    else {
       $sql = "SELECT * FROM customer WHERE cust_user_id=?;"; 
       $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?login=sqlerror");
            exit(); 
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $userid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)) {

                if($password != $row['cust_pwd']) {

                    header("Location: ../index.php?login=wrongpassword");
                    exit();
                }
                else {                    

                    if ($row['cust_user_id'] == 'Admin') {                        

                         header("Location: ../admin-html.php?login=success");
                         exit();
                    }
                    else if ($row['cust_blacklisted'] == 1) {

                        header("Location: ../index.php?login=user_is_blacklisted");
                        exit();                        
                    }
                    else {

                        session_start();
                        $_SESSION['userId'] = $row['customer_id'];
                        $_SESSION['userUser_name'] = $row['cust_user_id'];
                        $_SESSION['full_name'] = $row['cust_name'];
                        $_SESSION['address'] = $row['cust_address'];
                        $_SESSION['age'] = $row['cust_age'];
                        $_SESSION['block'] = $row['cust_blacklisted'];                        

                        header("Location: ../index.php?login=success");
                        exit();                        
                    }                    
                }                
            }
            else {
                header("Location: ../index.php?login=nouser");
                exit();
            }
        }
    }        
} 