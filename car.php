<?php
	$Email = $_COOKIE["Email"];

	
		$conn = mysql_connect('107.180.20.80','bala','bala1');
		if(! $conn ) 
		{
			die('Could not connect: ' . mysql_error());
		}
		
		//Should only upload the car details if they leave the image null
$imageString= mysql_real_escape_string($_FILES['image']['type']);

                        if(substr($imageString,0,5)=='image')
		{

                        $Make = mysql_escape_string($_POST['Make']); // Set Make variable
			$Model = mysql_escape_string($_POST['Model']); // Set Model variable
			$Year = mysql_escape_string($_POST['Year']); // Set Year variable
			$Color = mysql_escape_string($_POST['Color']); // Set Color variable
			$imageName= mysql_real_escape_string($_FILES['image']['name']);
			$imageData= mysql_real_escape_string(file_get_contents($_FILES['image']['tmp_name']));
			$imageType= mysql_real_escape_string($_FILES['image']['type']);
                        if(substr($imageType,0,5)=='image'){

mysql_select_db('BidSpot');
if (mysql_query("SELECT Num_of_Cars FROM User WHERE Email='".$Email."'"))
				{

$result = mysql_query("SELECT Num_of_Cars FROM User WHERE Email='".$Email."'");
				   $row = mysql_fetch_assoc($result);
				   $cars = (int) $row['Num_of_Cars'];

					if ($cars < 3)
					{

			$update = mysql_query("UPDATE User SET Num_of_Cars=$cars+1 WHERE Email='".$Email."'");
						
	$insert = mysql_query("Insert into Car (Email, Make, Model, Year, Color, Picture, Type) Values ('$Email', '$_POST[Make]', '$_POST[Model]', $_POST[Year], '$_POST[Color]', '$imageData', '$imageType')") or die(mysql_error());
$result = mysql_query("SELECT ID FROM Car WHERE Email='$Email'");
$row = mysql_fetch_assoc($result);
   $car = (int) $row['ID'];
$updateagain = mysql_query("UPDATE User SET CurrentCar = $car WHERE Email='".$Email."'");
header('Location: home.php');
die();
					}
else
					{
						//print need to delete one car in order to register another car. Can only register up to 3 cars
						echo 'You Currently have 3 cars registered. In order to register another car you must first delete 1 car and then you may add another.<br>';
					}
}
}
}
else
		{

			$Make = mysql_escape_string($_POST['Make']); // Set Make variable
			$Model = mysql_escape_string($_POST['Model']); // Set Model variable
			$Year = mysql_escape_string($_POST['Year']); // Set Year variable
			$Color = mysql_escape_string($_POST['Color']); // Set Color variable
			
			mysql_select_db('BidSpot');
			
			if (mysql_query("SELECT Num_of_Cars FROM User WHERE Email='".$Email."'"))
			{
			   $result = mysql_query("SELECT Num_of_Cars FROM User WHERE Email='".$Email."'");
			   $row = mysql_fetch_assoc($result);
			   $cars = (int) $row['Num_of_Cars'];
				if ($cars < 3)
				{
					$update = mysql_query("UPDATE User SET Num_of_Cars=$cars+1 WHERE Email='".$Email."'");
					$insert = mysql_query("Insert into Car (Email, Make, Model, Year, Color) Values ('$Email', '$_POST[Make]', '$_POST[Model]', $_POST[Year], '$_POST[Color]')") or die(mysql_error());
$result = mysql_query("SELECT ID FROM Car WHERE Email='$Email'");
$row = mysql_fetch_assoc($result);
   $car = (int) $row['ID'];
$updateagain = mysql_query("UPDATE User SET CurrentCar = $car WHERE Email='".$Email."'");
header('Location: home.php');
die();
				}
				else
				{
					//print need to delete one car in order to register another car. Can only register up to 3 cars
					echo 'You Currently have 3 cars registered. In order to register another car you must first delete 1 car and then you may add another.<br>';
				}
							 

				         
			}
		}
		
			


?>