<?php
   $dbhost = '107.180.20.80';
   $dbuser = 'bala';
   $dbpass = 'bala1';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

$str = substr($_POST[Lot], 2);
$strtwo = substr($_POST[Lot], 0, 2);

$t = time();

	$sql = "INSERT INTO Spots (Email, Parkinglot, Points, Distance, CurrentCar, LotName, Time) VALUES ('$_COOKIE[Email]','$strtwo',
   	'$_POST[Tickets]','$_POST[Rating]', '$_POST[Car]', '$str', $t)";

$carsql = "UPDATE User SET CurrentCar = ".$_POST[Car]." WHERE Email = '".$_COOKIE['Email']."'";
      
   mysql_select_db('BidSpot');
   $retval = mysql_query( $sql, $conn );

$result = mysql_query($carsql, $conn );
   
   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
header('Location: waiting.php');
die();
   
   mysql_close($conn);
?>