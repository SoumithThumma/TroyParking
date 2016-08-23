<?php

$Email = $_COOKIE["Email"];

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

if (isset($_GET["cancel"])){
setcookie("Problem", "", time() - 3600);
}
else {
$sqlbuyer = "SELECT * FROM User WHERE Email = '".$Email."'";
$resultbuyer = $conn->query($sqlbuyer);
$rowbuyer = $resultbuyer->fetch_assoc();


$sql = "SELECT * FROM Spots WHERE Email = '".$_GET['email']."'"." AND Taken = 'No'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($result->num_rows > 0) {}
else {header('Location: getspot.php?id=' .$_GET["id"].'&fail=true');
die ();
}

if (isset($_COOKIE["Temp_ID"])){
$sqltpts = "SELECT Pts FROM TempPts WHERE Email='".$Email."' AND Expired = 0 AND ID =".$_COOKIE["Temp_ID"];
$resultpts = $conn->query($sqltpts);
$rowpts = $resultpts->fetch_assoc();
$temppts = (int)$rowpts["Pts"];
}

$bpoints =(int)$rowbuyer["Points"]+ $temppts;
$spoints = (int)$row ["Points"];
if ($bpoints<$spoints){
header('Location: getspot.php?id=' .$_GET["id"].'&points=false');
die ();}


$t = time();
$insert = "INSERT INTO Transaction (Buyer, Seller, Points_Worth, Parking_Lot, Time) 
                       Values ('".$Email."', '".$_GET['email']."', ".$row['Points'].", '".$row['Parkinglot']."', $t )";
$insertResult = $conn->query($insert);

$sqltransaction = "SELECT * FROM Transaction WHERE Time = ".$t." AND Buyer ='".$Email."'";
$resulttransaction = $conn->query($sqltransaction);
$rowResult = $resulttransaction->fetch_assoc();

$update = "UPDATE Spots SET Taken = 'Yes' WHERE Email = '".$_GET['email']."'";
$updateResult = $conn->query($update);

$sqlseller = "SELECT * FROM User WHERE Email = '".$_GET['email']."'";
$resultseller = $conn->query($sqlseller);
$rowseller = $resultseller->fetch_assoc();

$points = (int) $row["Points"];
$sellerpoints = (int) $rowseller["Points"];
$buyerpoints = (int) $rowbuyer["Points"];
 
$add = $points + $sellerpoints ;

$addpoints = "UPDATE User SET Points = ".$add." WHERE Email = '".$_GET['email']."'";
$updateadd = $conn->query($addpoints);

if (isset($_COOKIE["Temp_ID"])){
if ($temppts>$points){
$newtemppts = $temppts-$points;
$newbuyerpts = $buyerpoints+$newtemppts;
$subpoints = "UPDATE User SET Points = ".$newbuyerpts." WHERE Email = '".$Email."'";
$updatesub = $conn->query($subpoints);

$del = "UPDATE TempPts SET Expired = 1 WHERE Email='".$Email."' AND Expired = 0 AND ID =".$_COOKIE["Transaction_ID"];
$updatedel = $conn->query($del);
setcookie("Temp_ID", $pts, time() - 3600 );
}
else if ($temppts<$points){
$leftpts = $points-$temppts;
$sub = $buyerpoints - $leftpts;

$subpoints = "UPDATE User SET Points = ".$sub." WHERE Email = '".$Email."'";
$updatesub = $conn->query($subpoints);
$del = "UPDATE TempPts SET Expired = 1 WHERE Email='".$Email."' AND Expired = 0 AND ID =".$_COOKIE["Transaction_ID"];
$updatedel = $conn->query($del);
setcookie("Temp_ID", $pts, time() - 3600 );
}

else {
$del = "UPDATE TempPts SET Expired = 1 WHERE Email='".$Email."' AND Expired = 0 AND ID =".$_COOKIE["Transaction_ID"];
$updatedel = $conn->query($del);
setcookie("Temp_ID", $pts, time() - 3600 );
}

}
else{
$sub = $buyerpoints - $points;

$subpoints = "UPDATE User SET Points = ".$sub." WHERE Email = '".$Email."'";
$updatesub = $conn->query($subpoints);
}

$updateid = "UPDATE Spots SET Transaction_ID =".$rowResult['Transaction_ID']." WHERE Email = '".$_GET['email']."'";
$updateresult = $conn->query($updateid);

setcookie("Transaction_ID", $rowResult['Transaction_ID'], time()+3600);

}

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="images/car-icon2.png">
    <meta id="meta" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/timer.css" type="text/css" />
    <title>TroyParking Registration</title>


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
						
			

?>            </div>
        </div>
    </div>

    <a data-toggle="modal" href="#myModal"><img src="images/map-icon2.png" style="position: fixed;right:0;top:0; z-index:2;" /></a>


    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">

                <div class="card hovercard" style="padding-bottom:20px;">
                    <!--<div class="cardheader">

                    </div>-->

                    <div class="info">


                    </div>

                    <div class="bottom">
                        <h2 style="font-family: 'Orbitron', sans-serif;"><div id='countdown'></div></h2>
                        <div class="desc" style="margin-top:10px; text-align:left;">
                            Be on the lookout for this vehicle:
                        </div>
<?php

$Email = $_COOKIE["Email"];

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

if (isset($_GET["cancel"])){
$sql = "SELECT Seller FROM Transaction WHERE Transaction_ID = ".$_COOKIE['Transaction_ID'];
}
else {
$sql = "SELECT Seller FROM Transaction WHERE Transaction_ID = ".$rowResult['Transaction_ID'];
}

$result = $conn->query($sql);

$row = $result->fetch_assoc();

$sqllot = "SELECT * FROM Spots WHERE Email = '".$row["Seller"]."'";

$resultlot = $conn->query($sqllot);

$rowlot = $resultlot->fetch_assoc();

$sqlseller = "SELECT * FROM User WHERE Email = '".$row["Seller"]."'";

$resultseller = $conn->query($sqlseller);

$rowseller = $resultseller->fetch_assoc();

$sqlcar = "SELECT * FROM Car WHERE ID = '".$rowseller["CurrentCar"]."'";

$resultcar = $conn->query($sqlcar);

$rowcar = $resultcar->fetch_assoc();

echo '
                        <div style="width:100%; padding: 20px;"><img src="showImage.php?name=';
echo $rowseller["CurrentCar"];
echo '" width="100%;" /></div>
                        <table class="table table-striped">
                            <tr>
                                <td>Make:</td>
                                <td>';
echo $rowcar["Make"];
echo '</td>
                            </tr>
                            <tr>
                                <td>Model:</td>
                                <td>';
echo $rowcar["Model"];
echo '</td>
                            </tr>
                            <tr>
                                <td>Year:</td>
                                <td>';
echo $rowcar["Year"];
echo '</td>
                            </tr>
                            <tr>
                                <td>Color:</td>
                                <td>';
echo $rowcar["Color"];
if (isset($_GET["cancel"])){
echo '</td>
                            </tr>
</table>';
}
else{

echo '</td>
                            </tr>

                            <tr>
                                <td>Lot:</td>
                                <td>';
echo $rowlot["LotName"];
echo '</td>
                            </tr>
                            <tr>
                                <td>Distance:</td>
                                <td>';
echo $rowlot["Distance"];
echo '</td>
                            </tr>
                            
                        </table>';
}

?>
                        <button onclick="location.href = 'home.php?cookie=delete';" class="btn btn-lg btn-primary btn-block btn-find">Here</button>
                        <button id="problem" onclick="location.href = 'exproblem.php';" class="btn btn-lg btn-primary btn-block btn-problem">Problem?</button>
                        <div class="desc" style="font-size: 10px; margin-top: 10px;">
                            If for whatever reason you are unable to find the car, feel free to file a problem with us. We will give you temporary tickets equal to the amount spent on this spot that are good for the next 15 minutes. 
                            Please keep in mind filing unnecessary problems could result in banning of your account.
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <script>
    var interval;

<?php

if (isset($_GET["cancel"])){

$Email = $_COOKIE["Email"];
$TransactionID = $_COOKIE["Transaction_ID"];

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

$sql = "SELECT Time FROM Transaction WHERE Transaction_ID= ".$TransactionID;

$result = $conn->query($sql);

$row = $result->fetch_assoc();
$t = time() - $row["Time"];
$s = 240 - $t;

if ($s<0){

}
else {

$quotient = (int) ($s/60);
$remainder = $s % 60;
}

}
else {
$quotient = 3;
$remainder = 59;
}
?>    
var minutes = <?php echo $quotient ?>; 
var seconds = <?php echo $remainder ?>; 
    window.onload = function() {
        countdown('countdown');
    }

    function countdown(element) {
        interval = setInterval(function() {
            var el = document.getElementById(element);
			
            if(seconds == -1) {
                if(minutes == 0) {

function redirect(){
        window.location="exproblem.php?timeup=true";
    }

    document.getElementById('problem').onclick=redirect;
                    el.innerHTML = "Time's up.";                    
                    clearInterval(interval);
                    return;
                } else {
                    minutes--;
                    seconds = 59;
                }
            }
            if(minutes > 0) {
                var minute_text = minutes;
            } else {
                var minute_text = '';
            }
            var second_text = seconds > 1 ? 'seconds' : 'second';
            if (seconds < 10)
{
el.innerHTML = minute_text + ' : 0' + seconds ;
}
else {
el.innerHTML = minute_text + ' : ' + seconds ;
}
            seconds--;
        }, 1000);
    }
    </script>

</body>


</html>