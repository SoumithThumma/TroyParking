<?php
   $dbhost = '107.180.20.80';
   $dbuser = 'bala';
   $dbpass = 'bala1';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

$hash = md5( rand(0,1000) );

	$sql = "INSERT INTO User (FirstName, LastName, Email, Password, ParkingType, hash) VALUES ('$_POST[Fname]','$_POST[Lname]',
   	'$_POST[Email]','$_POST[Pass]', '$_POST[radioBtn]', '$hash')";
      
   mysql_select_db('BidSpot');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }

$to      = $_POST[Email]; // Send email to our user
$subject = 'Signup Verification - Troy Parking'; // Give the email a subject 
$message = '
Thanks for signing up!
Your account has been created.
 
Please click this link to activate your account:
http://www.troyparking.com/bidspot/verify.php?email='.$_POST[Email].'&hash='.$hash.'
 
';
                     
$headers = 'From:noreply@troyparking.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email


header('Location: thanks.html');

mysql_close($conn);
?>