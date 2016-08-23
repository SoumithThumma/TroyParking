<?php
 

	//Need to test this to make sure it works.
	$Email = $_COOKIE["Email"];

		$conn = mysql_connect('107.180.20.80','bala','bala1');
		if(! $conn ) 
		{
			die('Could not connect: ' . mysql_error());
		}

			$imageName= mysql_real_escape_string($_FILES['image']['name']);
			$imageData= mysql_real_escape_string(file_get_contents($_FILES['image']['tmp_name']));
			$imageType= mysql_real_escape_string($_FILES['image']['type']);
			
                        if(substr($imageType,0,5)=='image')
                        {
                           mysql_select_db('BidSpot');
			   $carID = $_POST['carID'];
                           $update = mysql_query("UPDATE Car SET Picture='$imageData', Type='$imageType' WHERE Email = '$Email' AND ID = $carID");
                           mysql_close($conn);
						   header("Location: profile.php");
                           die();
                           //mysql_query("UPDATE User SET Percentage = 50 WHERE Email = '$Email'");
	
			}
			else
			{
				header("Location: profile.php?support=false");
                           die();
			}
						
			

?>