<?php

logoutUser();

function logoutUser() {    
   session_start();
   session_unset();
   session_destroy();
   header("Location: ../index.php");    
}

?>