<?php

if (isset($_GET["cookie"])){
setcookie("Transaction_ID", "", time() - 3600);
setcookie("Problem", "", time() - 3600);
}

else if (isset($_COOKIE["Email"])){

$Email = $_COOKIE["Email"];

define('DB_HOST', '107.180.20.80');
define('DB_NAME', 'BidSpot');
define('DB_USER','bala');
define('DB_PASSWORD','bala1');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$queryspots = mysql_query("SELECT *  FROM Spots where Email = '".$_COOKIE[Email]."'");

$num_rows = (int) mysql_num_rows($queryspots);
if ($num_rows>0){
header('Location: waiting.php');
die();
}
else if (isset($_COOKIE["Problem"])){
$Trans_ID = $_COOKIE["Transaction_ID"];
$sql = mysql_query("Select * FROM Transaction WHERE Transaction_ID = ".$Trans_ID);
		   $row = mysql_fetch_array($sql);
if($Email == $row["Buyer"]) 
		   {
header('Location: exproblem.php');
die();
}
else {
header('Location: exproblemseller.php');
die();
}
}

else if (isset($_COOKIE["Transaction_ID"])){

$Trans_ID = $_COOKIE["Transaction_ID"];
$sql = mysql_query("Select * FROM Transaction WHERE Transaction_ID = ".$Trans_ID);
		   $row = mysql_fetch_array($sql);
if($Email == $row["Buyer"]) 
{
header('Location: transaction.php?cancel=true');
die();
}
else {
header('Location: transactionseller.php');
die();
}


}


}
?><?php
if (isset($_COOKIE["Email"])){
setcookie("Email", $_COOKIE["Email"], time() + 3600);

define('DB_HOST', '107.180.20.80');
define('DB_NAME', 'BidSpot');
define('DB_USER','bala');
define('DB_PASSWORD','bala1');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
  
$query = mysql_query("SELECT *  FROM User where Email = '".$_COOKIE[Email]."'");
	$row = mysql_fetch_array($query);
$cars = (int) $row['Num_of_Cars'];
if ($cars >0){

}
else{
header('Location: excarreg.php');
die();}

}
else {
header('Location: login.php');
die();
}

if (isset($_GET["cookie"])){
setcookie("Transaction_ID", "", time() - 3600);
setcookie("Problem", "", time() - 3600);

}
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<!--

DONE!
                _________________
               /                /|
              /                / |
             /________________/ /|
          ###|      ____      |//|
         #   |     /   /|     |/.|
        #  __|___ /   /.|     |  |_______________
       #  /      /   //||     |  /              /|                  ___
      #  /      /___// ||     | /              / |                 / \ \
      # /______/!   || ||_____|/              /  |                /   \ \
      #| . . .  !   || ||                    /  _________________/     \ \
      #|  . .   !   || //      ________     /  /\________________  {   /  }
      /|   .    !   ||//~~~~~~/   0000/    /  / / ______________  {   /  /
     / |        !   |'/      /9  0000/    /  / / /             / {   /  /
    / #\________!___|/      /9  0000/    /  / / /_____________/___  /  /
   / #     /_____\/        /9  0000/    /  / / /_  /\_____________\/  /
  / #                      ``^^^^^^    /   \ \ . ./ / ____________   /
 +=#==================================/     \ \ ./ / /.  .  .  \ /  /
 |#                                   |      \ \/ / /___________/  /
 #                                    |_______\__/________________/
 |                                    |               |  |  / /       
 |                                    |               |  | / /       
 |                                    |       ________|  |/ /________       
 |                                    |      /_______/    \_________/\       
 |                                    |     /        /  /           \ )       
 |                                    |    /OO^^^^^^/  / /^^^^^^^^^OO\)       
 |                                    |            /  / /        
 |                                    |           /  / /
 |                                    |          /___\/
 |                                    |           oo
 |____________________________________|


Aaron was here 5/1/2016 at 1:51 A.M.

-->
<head>
    <meta charset="utf-8" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="images/car-icon2.png">
    <meta id="meta" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/exprofile.css" type="text/css" />
    <title></title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">

<div style="margin-top: 10px; margin-bottom: -5px;">
<div style="color: white; text-align: left; width: 100%;">
<a href="home.php" style="color: white;"><span style="font-size: 12px;"><i class="fa fa-home" aria-hidden="true"></i> Home</span></a></div>
<!--<div style="color: white; text-align: right; width: 49%; display: inline-block;">
<a href="#"><span style="font-size: 12px;">Sign Out <i class="fa fa-sign-out" aria-hidden="true"></i></span></a></div>--></div>



                <div class="card hovercard" style="padding-bottom:20px;">
                    <div class="cardheader">

                    </div>
                    <div class="avatar">
                    <a href="profile.php">
                    	
                        <img alt="" style="visibility: hidden;" src="ShowProfileImage.php" id="profile-loaded" >
                        <script>
                        window.onload = function() {
                        	var theImg = document.getElementById('profile-loaded');
                        	if (theImg.width > theImg.height) {
                        		theImg.height = 150;
                        		var tempWidth = theImg.width;
                        		var middle = tempWidth / 2;
                        		var toLeft = middle - 75;
                        		document.getElementById("profile-loaded").style.right = "-" + toLeft + "px";
                        		document.getElementById("profile-loaded").style.visibility = "visible";
                        		
                        	}
                        	else if (theImg.width < theImg.height) {
                        		theImg.width = 150;
                        		var tempHeight = theImg.height;
                        		var middle = tempHeight / 2;
                        		var toTop = middle - 75;
                        		document.getElementById("profile-loaded").style.top = "-" + toTop + "px";
                        		document.getElementById("profile-loaded").style.left = "-4px";
                        		document.getElementById("profile-loaded").style.visibility = "visible"; 
                        	}
                        	else {
                        		document.getElementById("profile-loaded").style.width = "150px";
                        		document.getElementById("profile-loaded").style.height = "150px";
                        		document.getElementById("profile-loaded").style.left = "-4px";
                        		document.getElementById("profile-loaded").style.visibility = "visible"; 
                        	}
                        	}
                        </script>
</a>
                    </div>
                    
                            <div class="info">
                                <div class="desc">Welcome, 
                                
<?php 

mysql_connect('107.180.20.80','bala','bala1') or die("Failed to connect to MySQL: " . mysql_error());
$Email = $_COOKIE["Email"];
mysql_select_db('BidSpot') or die("Failed to connect to MySQL: " . mysql_error());
if (mysql_query("SELECT FirstName, LastName FROM User WHERE Email='$Email'")){
   $result = mysql_query("SELECT FirstName, LastName FROM User WHERE Email='$Email'");
   $row = mysql_fetch_assoc($result);
   echo $row["FirstName"]." ".$row["LastName"];
   } 
?>

                                !</div>
                                <div class="title">
                                    <span>
<?php 
mysql_connect('107.180.20.80','bala','bala1') or die("Failed to connect to MySQL: " . mysql_error());
$t = time() - 900;

$result = mysql_query("SELECT * FROM Spots WHERE Taken='No' AND Time >= $t");
$num_rows = mysql_num_rows($result);

echo $num_rows;
?></span>
                                </div>
                                <div class="desc">Spots Available!</div>
                            </div>                            
                        
                        <div class="bottom">
                            <span><span class="btn btn-small btn-primary-2"><span class="tickettext">
<?php 

mysql_connect('107.180.20.80','bala','bala1') or die("Failed to connect to MySQL: " . mysql_error());
$Email = $_COOKIE["Email"];
mysql_select_db('BidSpot') or die("Failed to connect to MySQL: " . mysql_error());
if (mysql_query("SELECT Points FROM User WHERE Email='$Email'")){
   $result = mysql_query("SELECT Points FROM User WHERE Email='$Email'");
   $row = mysql_fetch_assoc($result);
$pts = (int)$row["Points"];
if (isset($_COOKIE["Temp_ID"])){
$resultpts = mysql_query("SELECT Pts FROM TempPts WHERE Email='$Email' AND Expired = 0 AND ID =".$_COOKIE["Temp_ID"]);
   $rowpts = mysql_fetch_assoc($resultpts);
$temppts = (int)$rowpts["Pts"];
}
   echo $pts+$temppts;
   } 
?>
                            </span></span> <i class="fa fa-ticket"></i></span>
                            
                    
                            
                        </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button class="btn btn-lg btn-primary btn-block btn-find"

<?php
if ($cars<2){
echo 'onclick="window.location=\'findspot.php\';">Find A Spot</button>';
}
else {
echo 'onclick="window.location=\'pickyourcar.php\';">Find A Spot</button>';
}

?>

                            <button class="btn btn-lg btn-primary btn-block btn-find" onclick="window.location='exholdspot.php';">Hold A Spot</button>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <hr />
                    	<a href="http://www.facebook.com/troyparking" target="_blank"><div style="width: 49%; text-align: left; padding-right: 0px; margin-top: 10px; display:inline-block;">
                    <i class="fa fa-facebook-square" style="font-size:50px; color: rgb(17, 49, 81);" aria-hidden="true"></i>
                    <div style="display: inline; color: rgb(17, 49, 81); font-size: 12px;">Facebook</div>
                    
                </div></a>
                <a href="logout.php" class="bottom-link"><div style="width: 49%; text-align: right; padding-right: 0px; margin-top: 10px; display: inline-block;">
                    <i class="fa fa-sign-out" style="font-size:50px; color: rgb(17, 49, 81);" aria-hidden="true"></i>
                    <div style="display: inline; color: rgb(17, 49, 81); font-size: 12px; height= 50px;">Sign Out</div>
                    
                </div></a>
                    </div>
                

                </div>
                
                 
                

                
            </div>

        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>