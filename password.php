<?php
 $dbhost = '107.180.20.80';
   $dbuser = 'bala';
   $dbpass = 'bala1';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);

   

    // Verify data
    $email = $_COOKIE["Email"]; // Set email variable
                 mysql_select_db('BidSpot');
        // We have a match, activate the account
        mysql_query("UPDATE User SET Password='$_POST[Pass]' WHERE Email='".$email."'") or die(mysql_error());
        
header('Location: login.php');
   setcookie("Email", "", time() - 3600);
                 

?>