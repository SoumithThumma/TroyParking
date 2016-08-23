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
?>
<!DOCTYPE html>
<html>
<!--

i`it)v|[[[[(//s+)`(-\\/JJgbdd@@@@@@@dmKK(c!(/-[2=/cct/!-v\!_L\)|
]-!/(!-)\L\)v|c5(!,!Ldd@@@@@@@@@@@@@@@@@@@dK/]!c\\\v|i\/cT\v((c-
]!`/v\//(-|t\VvcL!m@@@@@M@@@@@@@@@@@@@@@@@@@@bLt\\|)c/2-vv)/it\.
--/-,\,\v\,|)/v/m@@@@@@K@@@@@@@@@@@@@@@@@@@@@@@bK!v!-( )-!.[/cT
//.\--'--|-/c(e@@@@@@@DD@@@@@@@@@@@@@@@@@@@@@@@@@@s\\\\-||/v!c\.
-,-|\`||\-\/id@@@@@@@@N@@@@@@@@@@@@@@@@@@@@@@@@@@@@b.),`-,-/c-`i
!,\!-!-!'!-!d@@@@@@@P[+~**AAA@@@@@@@@@@@@@@@@@@@@@@@b/./`c-/.\7-
--'.-- -/,id@@@*P!`          \'Z8@@@@@@@@@@@@@@@@@@@@@i.\\'.\.c
',`,`\'-,-J@@5`-           -- `-iYA@@@@@@@@@@b@@@@@@@@@_\-|-\c-
'. -.,`/.G@@K- `               - )7KM@@@@@@@@@@@@@@@@@@@c-----/
- `-  --i@@Ai                    -!ZZ@@@@@@@@@@@@@@@@@@@b! \`|-`
 `-,'- G@@@[,                    '.D8K@@@@@@@@@@@@@@@@@@@[/-,-/.
-` .-/v@@@A)                      -)ZdMd@@@@@@@@@@@@@@@@@@\' _\
- ` ,iVJ@@@!                     '-!(K5K@@@@@@@@@@@@@@@@@@[(/s[.
  - i\G@@@Z-                    ' ! -i55ZZ@@@@@@@@@@@@@@@@@)(4)`
 , -|b@@@@!\                     '  ` |-tYG@@@@@@@@@@@@@@@@XNYZ-
   tt@@@@A-,                        '  `)(d@@@@@@@@@@@@@@@@D)8A[
   )8@@@@@\                         ,-'-/Kd@@@@@@@@@@@@@@@@@KD@[
  ]]Z@@@@d|-              ,ii.c,, -.icLZKK@@@@@@8@K@@@@@@@@@(@8[
  KN8@@@@@( .i!vGG_      J4Kb8ZKb@bbK@d@88@@@@@@@b@@@@@@@@@@dK@-
 )/8K@@@K@b@dP~~~T4(    Jd@@7`___s@M@@@@MM8d@@@d@@@@@@@@@@@@LM8[
\!48@K@@@@8@@d*@@@bVi   bAKLY~~@@@@@@*ff/\NM8@@@@@@@@@@@@@@@db@[
,\\Kb@@@d@.~t` !*~!`.  -MA)    '~'.).` `,'K@@@@@@@@@@@@@@@@@AKb[
,`8M@@@@@@ -`,,gvZ``    A//-  ..c\+\`    i]d@@@@@@M@@@@@@@@@@@8[
i\@8@K@@@D              \!'             !iZ8@@@8A@@@@@8d@b@@@8M[
e8d5@@@@@@             '!-             '-)8@@@@@@@@@@@@@@@@@@M8i
8dZ8@M@@@@-             v  ,          ,\tK@@@@@@@@@@@@A@@@@@@Z2|
@b@AK@@@b@[              //           cctbA@@@AK@@d@@d@@@K@@@bmi
@@8@M@8@@@P-            -=/.         /iD8d@@@@@@@@@@@@@@A@@@d@@[
@8@@@MA@@@@\-      .   _)g2i        -((dKK@@@@@d@@@@d@@K@@@@@@K[
@@@bAK@@K@@)i     'c,,Kb@@bK       )X)Kb@M@@d@@@Mb@@A@d@@@@@@8@[
@K@b@@@@A@AA/i-     ~M@@@@Mc    .,\c=)D8d@@b@@@d@@@@@@@@@@8d@@A[
@@@@Mb@@@@@@('c\`     PPK((,i]v|-\-v)8XNAdMK@@@@@@@b@@MK@A@@@@@[
@@8@@MK@d@A@L!--c)s_, ,(ZsbLb@\`- .-N]/KM@@@@@@@d@@@A@@@@@@@@d@[
@@Kb@@@K@b@@@/-  !''~~Vff*N5f -` -,\))KK@@@@@@@MK@@d@@@M8d@b@@@[
@b@@@KAK@@@@@@2--    ,,_JJ/i)/- |/v)NK@8d@@@@@@@@@@8@@@@@@@@M@K[
@@8d@K@@@b@@@@@d!,   'VV\)\\)\7(-)4Jb@8@A@@@K@d@@@@@@@8@@@@@@@@[
M@@@@8@@K@Kb@@@d@v.       `-\\/v)88b@M@A@K@@M@@@A@@M@8@@A@d@8@M[
Zb@d@M@K@@@@@@@@@@m       -)!/stbb@b@@A@b@@@@@Kb@@@@@@@b@@@K@@@[
K@@d@@@@@d@M@8@@@@@Ks   ,-/vJD@@8d@K@@@@@@8@@@@@@@@@@MK@@@b@@M@[
tN@b@@d@d@M@@@@@@@@@@LL4JKd@A@@d@@K@@@@MK@@@@8@@@@@@@@@@@b@@@@@[
)NM@8b@@A@@@A@@@@@@@@@@@@@@A@@A@@8@@K@d@@@@M@@K@@K@A@@@8@@M@@@@[
(tMM@@@d@@M8@@@@A@@@@A@@@A@@@@@@@@@A@@@@8b@@8d@@@@@@@@@@@@@@@@M[
tNZ@@K@@@d@@@@A@@@@@8@@@/4N@@8@b@@d@@M@8@MK@M8@K@@@@@@d@@@@@@@@[
M/KA8@@@MA@@@M@@@@@@@@@@[|t*Z@N@@@@8@@M8ZAZZ@M@@@A@d@@@@@K@@@d@[
bYJ4M@@@@@@A@@@@@@@@@@@@D.\'(YKKZD@8dK@5A84YZ@dM@@@@@@@@@@@@d@@[
K5dM8@8d@d@@@@@@@@8@@@@@@..-!/))ZK5AK4)AY(/XY/Z@@@A@@@d@@@M@@@@[
Y8dNA@@AK@@d@@@b@@@@@@@@@L,-,\!]]\X(5)Z/7c\\t5/K@@@@@@@@b@@@@@@[
8M8@@@A@@@A@@8@@@@@@@@@KDLt! !,-|t'(-\\!,\/,\!ZJG@@@d@Md@@@G@@@[

What did you expect to find?

-->
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
            <div class="col-xs-12 col-lg-6 col-md-8 col-sm-10 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">




<div style="margin-top: 10px; margin-bottom: -5px;">
<div style="color: white; text-align: left; width: 100%;">
<a href="home.php" style="color: white;"><span style="font-size: 12px;"><i class="fa fa-home" aria-hidden="true"></i> Home</span></a></div>
<!--<div style="color: white; text-align: right; width: 49%; display: inline-block;">
<a href="#"><span style="font-size: 12px;">Sign Out <i class="fa fa-sign-out" aria-hidden="true"></i></span></a></div>--></div>



                <div class="card hovercard" style="padding-bottom:20px;">
                    <div class="cardheader-pickcar">

                    </div>

                    <div class="info" style="margin-top: 40px;">
                    
                    <h2>Claim Your Spot!</h2>
				<div class="desc" style="font-weight: bold;">You have</div>
                                <div class="title" style="margin-top: 4px; margin-bottom: 4px;">
                                    <span>
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
</span> 
                                </div>
                                <div class="desc" style="font-weight: bold;"><i class="fa fa-ticket" aria-hidden="true"></i> Tickets Available!</div>
	

                    </div>

                    <div class="bottom">
                    
                    
                    
                        
                        
                        <div class="desc" style="font-size: 10px; margin-bottom:10px; ">Simply click the spot you wish to purchase. The black number below the holders profile picture represents how many tickets they are requesting for their spot.</div>


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
                var toTop = middle - 50;
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