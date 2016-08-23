<?php
 setcookie("Problem", "", time() - 3600);

	//Need to test this to make sure it works.
	//This assumes that one is buyer and one is seller.
	//Need to make certain they cannot access this page unless they have made a transaction and the transaction has taken place
	$Email = $_COOKIE["Email"];
	$Trans_ID = $_COOKIE["Transaction_ID"];
        $ID = (int) $Trans_ID; 
        $desc = $_POST['Description'];

		$conn = mysql_connect('107.180.20.80','bala','bala1');
		if(! $conn ) 
		{
			die('Could not connect: ' . mysql_error());
		}

		   mysql_select_db('BidSpot');
		   $sql = mysql_query("Select * FROM Transaction WHERE Transaction_ID = $Trans_ID");
		   $row = mysql_fetch_array($sql);
                   $pts = (int) $row['Points_Worth'];
		   
		   if($Email == $row["Buyer"]) //If Email = Buyer, then the buyer is filing the problem
		   {
			   $who_Filed = $row["Buyer"];
			   $filed_Agst = $row["Seller"];
		  $insert = mysql_query("Insert into Problem (Problem_ID, Pts, Who_Filed, Filed_Against, Description) Values ($ID, $pts, '$who_Filed','$filed_Agst', '$desc')"); //Insert into Problem Table
		   $tempInsert = mysql_query("Insert into TempPts Values ($ID, $pts, '$Email', 0)");  //Insert into TempPts Table
setcookie("Temp_ID", $_COOKIE["Transaction_ID"], time() + 900);
setcookie("Transaction_ID", "", time() - 3600);
header('Location: exfiledbuyer.html');
exit;
		   }
		   else							//Else Seller is filing the problem
		   {
			   $who_Filed = $row["Seller"];
			   $filed_Agst = $row["Buyer"];	
		  $insert = mysql_query("Insert into Problem (Problem_ID, Pts, Who_Filed, Filed_Against, Description) Values ($ID, $pts, '$who_Filed','$filed_Agst', '$desc')"); //Insert into Problem Table
setcookie("Transaction_ID", "", time() - 3600);
header('Location: exfiledseller.html');
exit;		   
		   }
 
						
			

?>