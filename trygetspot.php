<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="images/car-icon2.png">
    <meta id="meta" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="css/trygetspot.css" type="text/css" />
    <title>TP - Get Spot</title>


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
                <div class="modal-body">
                    <img src="images/image2.jpeg" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location='images/image2.jpeg';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <a data-toggle="modal" href="#myModal"><img src="images/map-icon2.png" style="position: fixed;right:0;top:0; z-index:2;" /></a>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-6 col-md-8 col-sm-10 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">

                <div class="card hovercard" style="padding-bottom:20px;">
                    <div class="cardheader-find">

                    </div>

                    <div class="info">
                    	<span style="background-color: black; color: white; border-radius: 50%; padding: 10px;">
<?php 

mysql_connect('107.180.20.80','bala','bala1') or die("Failed to connect to MySQL: " . mysql_error());
$Email = $_COOKIE["Email"];
mysql_select_db('BidSpot') or die("Failed to connect to MySQL: " . mysql_error());
if (mysql_query("SELECT Points FROM User WHERE Email='$Email'")){
   $result = mysql_query("SELECT Points FROM User WHERE Email='$Email'");
   $row = mysql_fetch_assoc($result);
$pts = (int)$row["Points"];
if (isset($_COOKIE["Temp_ID"])){
$resultpts = mysql_query("SELECT Pts FROM TempPts WHERE Email='$Email'");
   $rowpts = mysql_fetch_assoc($resultpts);
$temppts = (int)$rowpts["Pts"];
}
   echo $pts+$temppts;
   } 
?>
</span>
	

                    </div>

                    <div class="bottom">
                        <h2>Claim Your Spot</h2>
                        <div class="desc" style="margin-top:10px; text-align:left;">
                            
                        </div>
                        <div class="desc" style="font-size: 10px; margin-bottom:20px; ">Simply click the spot you wish to purchase. The black number below the holders profile picture represents how many tickets they are requesting for their spot.</div>


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

$email = $_COOKIE["Email"];
$Info = "SELECT * FROM User WHERE Email ='".$email."'";
$Inforesult = $conn->query($Info);
$rowInfo = $Inforesult->fetch_assoc();

$t = time() - 900;
if ($_GET['id']==0 && $rowInfo["ParkingType"] == "Student"){
$sql = "SELECT * FROM Spots WHERE Parkinglot <= 10 AND Time >= $t AND Taken = 'No'";
}
else if ($_GET['id']==0){
$sql = "SELECT * FROM Spots WHERE Parkinglot > 10 AND Parkinglot <= 17 AND Time >= $t AND Taken = 'No'";
}
else {
$sql = "SELECT * FROM Spots WHERE Parkinglot = " . $_GET['id']." AND Time >= $t AND Taken = 'No'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {

if (isset($_GET['points'])){
echo '<div class="desc" style="color: red; margin-bottom: 10px;">You do not have enough points to get that spot.</div>';
}

if (isset($_GET['fail'])){
echo '<div class="desc" style="color: red; margin-bottom: 10px;">Oops! Looks like someone has already taken that spot. Try another.</div>';
}

$hidden = 1;
$i = 1;
    while($row = $result->fetch_assoc()) {

$Email = $row["Email"];
$userInfo = "SELECT * FROM User WHERE Email ='".$Email."'";
$userresult = $conn->query($userInfo);
$rowone = $userresult->fetch_assoc();
$percent = (int) $rowone["Percentage"];
$reviews = (int) $rowone["Num_of_Reviews"];
$currentcar = $rowone["CurrentCar"];
$usercar = "SELECT * FROM Car WHERE ID = $currentcar";
$carresult = $conn->query($usercar);
$rowtwo = $carresult->fetch_assoc();
echo '

<a href="#hidden';
echo $hidden;
echo '" data-toggle="collapse">
                            <div class="spotcontain box-shadow--4dp" style="overflow:auto;">
                            
                                <div class="costlabel pull-right">
                                    <span class="costlabel cost-text">';
echo $row ["Points"];
echo '</span>
                                </div>';

echo   ' <div class="viewpoint">
                           <img style="visibility: hidden; position: absolute;" src="Image.php?name=';
echo $rowone["Email"];
echo '" id="div';
echo $i;
echo '"/></div>';


if ($reviews >=5){
if ($percent >=70){
echo '
                                <div class="rating-label pull-right">
                                    <img src="images/star-icon.png" />
                                </div>';
}

else if ($percent >40){
}
else {

echo '
                                    <div class="rating-label pull-right">
                                        <img src="images/minus-icon.png" />
                                    </div>';
}
}

                               
   echo '                        
                            <div class="spotbody">
                                <p>Name: ';
echo $rowone["FirstName"];
echo '</p>
                                <p>Color: ';
echo $rowtwo["Color"];
echo '</p>
                                <p>Car: ';
echo $rowtwo["Make"]; 
echo " ".$rowtwo["Model"]; 
echo " ".$rowtwo["Year"];
echo '</p>
                                <p>Lot: ';
echo $row["LotName"];
echo '</p>
                                <p>Distance: ';
echo $row["Distance"];
echo '</p>
                            </div>
                        </div></a>
                        <a href="transaction.php?email=';
echo $rowone["Email"];
echo '&id=';
echo $_GET["id"];
echo '">
                            <div class="get-it collapse box-shadow--4dp" id="hidden';
echo $hidden;
echo '">
                                <span></span>
                                <p>GET SPOT</p>
                            </div>
</a>


';

$hidden = $hidden +1;
$i = $i + 1;
}
}

else {

if (isset($_GET['points'])){
echo '<div class="desc" style="color: red; margin-bottom: 10px;">You do not have enough points to get that spot.</div>';
}

if (isset($_GET['fail'])){
echo '<div class="desc" style="color: red; margin-bottom: 10px;">Oops! Looks like someone has already taken that spot. No more spots available.</div>';
}

}

echo '<script>
    function addLoadEvent(func) {
    var oldonload = window.onload;
    if (typeof window.onload != \'function\') {
    window.onload = func;
    } else {
    window.onload = function() {
    if (oldonload) {
    oldonload();
    }
    func();
    }
    }
    }';

$y = 1;
while($y < $i)
{
   echo 'addLoadEvent(function () {
        if (document.getElementById("div';
echo $y;
echo '") != null) {
            var theImg = document.getElementById("div';
echo $y;
echo '");
            if (theImg.width > theImg.height) {
                theImg.height = 100;
                var tempWidth = theImg.width;
                var middle = tempWidth / 2.0;
                var toLeft = middle - 50;
                document.getElementById("div';
echo $y;
echo '").style.right = "-" + toLeft + "px";
                document.getElementById("div';
echo $y;
echo '").style.top = "-4px";
                document.getElementById("div';
echo $y;
echo '").style.visibility = "visible";

            }
            else if (theImg.width < theImg.height) {
                theImg.width = 100;
                var tempHeight = theImg.height;
                var middle = tempHeight / 2;
                var toTop = middle - 75;
                document.getElementById("div';
echo $y;
echo '").style.top = "-" + toTop + "px";
                document.getElementById("div';
echo $y;
echo '").style.left = "-4px";
                document.getElementById("div';
echo $y;
echo '").style.visibility = "visible";
            }
            else {
                document.getElementById("div';
echo $y;
echo '").style.width = "100px";
                document.getElementById("div';
echo $y;
echo '").style.height = "100px";
                document.getElementById("div';
echo $y;
echo '").style.left = "-4px";
                document.getElementById("div';
echo $y;
echo '").style.visibility = "visible";
            }
        }
    });';
$y = $y + 1;
}

echo '</script>';

?>
</div>

                </div>
            </div>

        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>