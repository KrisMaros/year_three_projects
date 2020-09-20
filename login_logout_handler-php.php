<?php
   if(isset($_SESSION['userId'])) {
       
       $username = $_SESSION['userUser_name'];
       echo          
           '<form action="back-end/logout.php" method="post">                 
               <b><button style="width: auto" type="submit" name="logout-submit">Logout</button>Welcome '.$username.'!</b>
            </form>';
   }
   else {
       
       echo '<form action="back-end/login.php" method="post">
               <input type="text" name="userid" placeholder="Username">
               <input type="password" name="pwd" placeholder="Password">
               <button style="width: auto" type="submit" name="login-submit">Login</button>         
              </form>';
       
        if(isset($_GET['login'])) {

              $logincheck = $_GET['login'];

              if($logincheck == 'user_is_blacklisted') {

              echo "<p class='error'>User banned !</p>";
           }
       }
   }
   
   ?>