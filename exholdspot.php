<?php

if (isset($_COOKIE["Email"])){

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

$queryone = mysql_query("SELECT *  FROM Spots where Email = '".$_COOKIE[Email]."'");
$rowone = mysql_fetch_array($queryone);
if ($rowone["Taken"] == 'No'){
header('Location: waiting.php');}
else{

}
}
else {
header('Location: login.php');
die();
}
?>

﻿<!DOCTYPE html>
<html>
<!--



             ,,########################################,,
          .*##############################################*
        ,*####*:::*########***::::::::**######:::*###########,
      .*####:    *#####*.                 :*###,.#######*,####*.
     *####:    *#####*                      .###########*  ,####*
  .*####:    ,#######,                        ##########*    :####*
  *####.    :#########*,                       ,,,,,,,,.      ,####:
    ####*  ,##############****************:,,               .####*
     :####*#####################################**,        *####.
       *############################################*,   :####:
        .#############################################*,####*
          :#####:*****#####################################.
            *####:                  .,,,:*****###########,
             .*####,                            *######*
               .####* :*#######*               ,#####*
                 *###############*,,,,,,,,::**######,
                   *##############################:
                     *####*****##########**#####*
                      .####*.            :####*
                        :####*         .#####,
                          *####:      *####:
                           .*####,  *####*
                             :####*####*
                               *######,
                                 *##,


                                  VS


                    ,.ood888888888888boo.,
               .od888P^""            ""^Y888bo.
           .od8P''   ..oood88888888booo.    ``Y8bo.
        .odP'"  .ood8888888888888888888888boo.  "`Ybo.
      .d8'   od8'd888888888f`8888't888888888b`8bo   `Yb.
     d8'  od8^   8888888888[  `'  ]8888888888   ^8bo  `8b
   .8P  d88'     8888888888P      Y8888888888     `88b  Y8.
  d8' .d8'       `Y88888888'      `88888888P'       `8b. `8b
 .8P .88P            """"            """"            Y88. Y8.
 88  888                                              888  88
 88  888                                              888  88
 88  888.        ..                        ..        .888  88
 `8b `88b,     d8888b.od8bo.      .od8bo.d8888b     ,d88' d8'
  Y8. `Y88.    8888888888888b    d8888888888888    .88P' .8P
   `8b  Y88b.  `88888888888888  88888888888888'  .d88P  d8'
     Y8.  ^Y88bod8888888888888..8888888888888bod88P^  .8P
      `Y8.   ^Y888888888888888LS888888888888888P^   .8P'
        `^Yb.,  `^^Y8888888888888888888888P^^'  ,.dP^'
           `^Y8b..   ``^^^Y88888888P^^^'    ..d8P^'
               `^Y888bo.,            ,.od888P^'
                    "`^^Y888888888888P^^'"         


                 Spoiler --- Superman dies!






































-->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="shortcut icon" href="images/car-icon2.png">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    
    <meta id="meta" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/holdspot.css" type="text/css" />
    <title>TroyParking</title>


</head>
<body>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Map</h4>
                </div>
<?php
 


	$Email = $_COOKIE["Email"]; //gets current Email

		$conn = mysql_connect('107.180.20.80','bala','bala1');
		if(! $conn ) 
		{
			die('Could not connect: ' . mysql_error());
		}

		   mysql_select_db('BidSpot');
		   $sql = mysql_query("Select ParkingType FROM User WHERE Email = '$Email'");
		   $row = mysql_fetch_assoc($sql);
		   $type = $row['ParkingType'];
		   
		   if($type == "Student") //If type is Student --> Student Map
		   {
				echo '<div class="modal-body">
                    <img src="images/RainbowLMS.png" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location=\'images/RainbowLMS.png\';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>';
		   }
		   else							//Else type is Faculty --> Faculty Map
		   {
				echo '<div class="modal-body">
                    <img src="images/RainbowLMF.png" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location=\'images/RainbowLMF.png\';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>';
		   }
		   
		   mysql_close($conn);
						
			

?>
            </div>
        </div>
    </div>

    <a data-toggle="modal" href="#myModal"><img src="images/map-icon2.png" style="position: fixed;right:0;top:0; z-index:2;" /></a>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">





<div style="margin-top: -10px; margin-bottom: -5px;">
<div style="color: white; text-align: left; width: 100%;">
<a href="home.php" style="color: white;"><span style="font-size: 12px;"><i class="fa fa-home" aria-hidden="true"></i> Home</span></a></div>
<!--<div style="color: white; text-align: right; width: 49%; display: inline-block;">
<a href="#"><span style="font-size: 12px;">Sign Out <i class="fa fa-sign-out" aria-hidden="true"></i></span></a></div>--></div>



                <div class="card hovercard" style="padding-bottom:20px;">
                    <div class="cardheader">

                    </div>

                    <div class="info">


                    </div>

                    <div class="bottom">
                        <h2>Hold Spot</h2>
                        <div class="desc" style="margin-top:10px; margin-bottom:20px; text-align:left;">
                            Holding your spot allows you to earn tickets which you can turn around and trade for another spot when you need it!
                        </div>

                        <form class="form-register" method="post" action="holdspot.php" autocomplete="on"> <!--CHANGE THE .PHP ACTION HERE-->
                            <!--<script src="edmund.js"></script>-->
                            <!--THE LOTS DROP DOWN WILL NEED TO SHOW STUDENT LOTS OR FACULTY LOTS BASED
                                ON WHICH CLASSIFICATION THE LOGGED USER IS. NEED TO FIX THIS LATER
                                
                                
                                ALSO NAMES OF LOTS MAY CHANGE. WE WILL JUST KEEP UP WITH NUMBERS AND CHANGE THE NAMES AS WE SEE FIT.

                                -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:5px; padding: 0px;"><div class="desc">Which parking-lot are you located?</div>
                                <div class="desc" style="font-size: 10px;">(If you are unsure of the parking lot name, click the map icon in the top right.)</div></div>
                            <div class="form-group"><select id=Lot name="Lot" class="form-control" required>
<?php
define('DB_HOST', '107.180.20.80');
define('DB_NAME', 'BidSpot');
define('DB_USER','bala');
define('DB_PASSWORD','bala1');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
$Email = $_COOKIE["Email"];
$query = mysql_query("SELECT * FROM User where Email = '".$Email."'");
	$row = mysql_fetch_array($query);
$type = $row["ParkingType"];
if ($type == "Student"){
echo                                                   '<option value="1 Patterson">1-S. Patterson</option>
                                                        <option value="2 Pit">2-S. Pit</option>
                                                        <option value="3 Art Building">3-S. Art Building</option>
                                                        <option value="4 Trojan Center">4-S. Trojan Center</option>
                                                        <option value="5 Bus-Stop">5-S. Bus-Stop</option>
                                                        <option value="6 Stadium">6-S. Stadium</option>
                                                        <option value="7 Baseball Field">7-S. Baseball Field</option>
                                                        <option value="8 Sartain">8-S. Sartain</option>
                                                        <option value="9 Gravel">9-S. Gravel</option>
                                                        <option value="10Alumni">10-S. Alumni</option>';
}
else{echo                                              '<option value="11Patterson">1-F. Patterson </option>
                                                        <option value="12Library">2-F. Library </option>
                                                        <option value="13Art">3-F. Art </option>
                                                        <option value="14Stadium">4-F. Stadium </option>
                                                        <option value="15Sartain">5-F. Sartain </option>
                                                        <option value="16Hawking/Smith">6-F. Hawking/Smith </option>
                                                        <option value="17Administration">7-F. Administration</option>';
}

?>
                                                        
                                                        
                                </select></div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:5px; padding: 0px;"><div class="desc">How would you rate the location of YOUR SPOT in this parking lot?</div>
                                <div class="desc" style="font-size: 10px;">(Closest being nearest to buildings, Furthest being the most distant from buildings)</div></div>
                            <div class="form-group"><select id=Rating name="Rating" class="form-control" required>
                                                        <option value="Close"> Closest </option>
                                                        <option value="Mid"> Mid-way </option>
                                                        <option value="Far"> Furthest </option>
                                 </select></div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:5px; padding: 0px;"><div class="desc">How many tickets do you want to receive for this spot?</div></div>
                            <div class="form-group"><select id=Tickets name="Tickets" class="form-control" required>
                                                        <option value="1"> 1 Ticket </option>
                                                        <option value="2"> 2 Ticket </option>
                                                        <option value="3"> 3 Ticket </option>
                                                        <option value="4"> 4 Ticket </option>
                                                        <option value="5"> 5 Ticket </option>
                                </select></div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:5px; padding: 0px;"><div class="desc">Which car are you in?</div></div>
                            <div class="form-group">
                                <select id=Car name="Car" class="form-control" required>    
<?php
$servername = "107.180.20.80";
$username = "bala";
$password = "bala1";
$dbname = "BidSpot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$Email = $_COOKIE["Email"];
$sql = "SELECT *  FROM Car where Email = '".$Email."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
echo "<option value='";
echo $row["ID"];
echo "'>";
echo $row["Color"];
echo " ";
echo $row["Make"];
echo " ";
echo $row["Model"];

echo "</option>";
}
}
?>                               
                                </select>
                            </div>                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:20px; padding: 0px;">
                                <div class="desc" style="font-size: 10px;">
                                    If you are having trouble getting rid of a spot, try asking less for it! 
                                </div>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block btn-find" type="submit" id="Submit">Hold Spot</button>
                            <!--<input type="submit" value="Register" style="width:125px; height:25px;" id="Submit" />-->

                        </form>

                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <hr />
                    	<a href="http://www.facebook.com/troyparking" target="_blank"><div style="width: 49%; text-align: left; padding-right: 0px; margin-top: 10px; display:inline-block;">
                    <i class="fa fa-facebook-square" style="font-size:50px; color: rgb(17, 49, 81);" aria-hidden="true"></i>
                    <div style="display: inline; color: rgb(17, 49, 81); font-size: 12px;">Facebook</div>
                    
                </div></a>
                <a href="logout.php"><div style="width: 49%; text-align: right; padding-right: 0px; margin-top: 10px; display: inline-block;">
                    <i class="fa fa-sign-out" style="font-size:50px; color: rgb(17, 49, 81);" aria-hidden="true"></i>
                    <div style="display: inline; color: rgb(17, 49, 81); font-size: 12px;">Sign Out</div>
                    
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