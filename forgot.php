<?php
 $dbhost = '107.180.20.80';
   $dbuser = 'bala';
   $dbpass = 'bala1';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);

   mysql_select_db('BidSpot');

   if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    setcookie("Email", $_GET['email'], time() + 3600);
    $email = mysql_escape_string($_GET['email']); // Set email variable
    $hash = mysql_escape_string($_GET['hash']); // Set hash variable
                 
    $search = mysql_query("SELECT Email, hash FROM User WHERE Email='".$email."' AND hash='".$hash."'") or die(mysql_error()); 
$match  = mysql_num_rows($search);
$hashone = md5( rand(0,1000) );
$sql = mysql_query("UPDATE User SET hash='".$hashone."'"." WHERE Email='".$email."'") or die(mysql_error());
                   
    if($match > 0){
header('Location: forgot.html');
                
    }else{
                echo "Invalid Link";
    }
                 
}

else{
                echo "Invalid Link";
    }
?>