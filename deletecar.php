<?php
 

	//Need to test this to make sure it works.
	$Email = $_COOKIE["Email"];

		$conn = mysql_connect('107.180.20.80','bala','bala1');
		if(! $conn ) 
		{
			die('Could not connect: ' . mysql_error());
		}

                           mysql_select_db('BidSpot');
			   $carID = $_GET['carID'];
			   $result = mysql_query("SELECT Num_of_Cars FROM User WHERE Email='$Email'");
			   $row = mysql_fetch_assoc($result);
		           $cars = (int) $row['Num_of_Cars'];
                           $delete = mysql_query("Delete FROM Car WHERE Email = '$Email' AND ID = $carID");
                           $update = mysql_query("UPDATE User SET Num_of_Cars=$cars-1 WHERE Email='$Email'");
                           mysql_close($conn);
						   header("Location: profile.php");
                           die();
                           //mysql_query("UPDATE User SET Percentage = 50 WHERE Email = '$Email'");
						
			

?>