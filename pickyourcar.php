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
﻿<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<!--

                            __ 
                          ,' ,^,. 
                      ,-"/""/--)_\ 
                    ,'           /. 
                   ,'              \ 
                   |               ; 
                  /                | 
                 ,'    ,'    .     ; 
                (_____|_______\   : 
                (o___,|o      | /|, 
                 (    `.____,' / /.\ 
                 /`-----._       e ) 
                |         `.    |-' 
                |      __,-.`.  | 
                `--.-'\ \_\' :  | 
                    \_,^'   ,'  \ 
                    '.____,'  _,'\ 
                   (`-|_,-'")'  ,'\--._ 
                    )=(_)=  \--'       `-._ 
                   /`-' `---'              `. 
                  / /                        `-. 
                 / /                            `-. 
                : /                               `. 
                |( .        .       ---._          `. 
                |'                  ''' \`-.        | 
               /                         `. \       | 
              /                            \ :      | 
             /                              \)      | 
            /                             __/       ; 
           :                             (___      : 
           |                              ,` `.     ) )) 
           |       o                  _,-' ,'_/  ;;/ // 
           |`--.____           ___,--' _,-' (__,'-' 
           |`--.____`---------'____,--'       ; - -' 
           `.  ,' / `---,-.---'              / 
             \/  /      \  \         ____  ,' 
              `./        `. `.  _,--'    )/ 
               |`-.        `.,`'         / 
               |   `-._    /            : 
               :       `--|             | 
               |          |             | 
               |          |             | 
               |          |             | 
               |          |             | 
               |          |             : 
               |          |             | 
               |          |             | 
               |, --.     |             | 
             ,-'           :_, --.      : 
          _,'            _,'             \ 
         (,',,--    __,-/                 ) 
          `((___,--' ,-'             _,--' 
                    (_( ,',-  __,---' 
                       ``-`--' 


-->
<head>
    <meta charset="utf-8" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="images/car-icon2.png">
    <meta id="meta" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/trygetspot.css" type="text/css" />
    <title></title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">



<div style="margin-top: 10px; margin-bottom: -5px;">
<div style="color: white; text-align: left; width: 100%;">
<a href="home.php" style="color: white;"><span style="font-size: 12px;"><i class="fa fa-home" aria-hidden="true"></i> Home</span></a></div>
<!--<div style="color: white; text-align: right; width: 49%; display: inline-block;">
<a href="#"><span style="font-size: 12px;">Sign Out <i class="fa fa-sign-out" aria-hidden="true"></i></span></a></div>--></div>

                <div class="card hovercard" style="padding-bottom:20px;">
                    <div class="cardheader-pickcar">

                    </div>

                    <div class="bottom" style="margin-top: 50px;">
                        <h2>Select Your Current Vehicle</h2>
                        <div class="desc" style="margin-top: 15px; margin-bottom: 40px; text-align:center;">Make sure to select the correct vehicle to avoid potential problems.</div>
<?php

//Code for Automatic car or Register Car Divs on the Profile Page
$Email = $_COOKIE["Email"];  //obtain email from cookie

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

$usercar = "SELECT * FROM Car WHERE Email ='".$Email."'";
$carresult = $conn->query($usercar);

$num_rows = (int) mysqli_num_rows($carresult);
$i = 0;
while($i < $num_rows)
{
$rowtwo = $carresult->fetch_assoc();

echo '
<a href="findspot.php?cardid=';
echo $rowtwo["ID"];
$id = $rowtwo["ID"];
echo '">
                            <div class="spotcontain box-shadow--4dp" style="overflow:auto;">
                                <div class="viewpoint">
                                    <img style="visibility: hidden; position: absolute;" src="showImage.php?name='.$id.'" id="div';
echo $i+1;
echo '" />

                                </div>
                                <div class="spotbody">';
                                    echo '<p>Color: '.$rowtwo["Color"].'</p>';
						echo '<p>Make: '.$rowtwo["Make"].'</p>';
						echo '<p>Model: '.$rowtwo["Model"].'</p>';
						echo '<p>Year: '.$rowtwo["Year"].'</p>';
                                echo '</div>
                            </div>
                        </a>

';
$i = $i+1;
}

?>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <hr />
                        <a href="http://www.facebook.com/troyparking" target="_blank">
                            <div style="width: 49%; text-align: left; padding-right: 0px; margin-top: 10px; display:inline-block;">
                                <i class="fa fa-facebook-square" style="font-size:50px; color: rgb(17, 49, 81);" aria-hidden="true"></i>
                                <div style="display: inline; color: rgb(17, 49, 81); font-size: 12px;">Facebook</div>

                            </div>
                        </a>
                        <a href="logout.php" class="bottom-link">
                            <div style="width: 49%; text-align: right; padding-right: 0px; margin-top: 10px; display: inline-block;">
                                <i class="fa fa-sign-out" style="font-size:50px; color: rgb(17, 49, 81);" aria-hidden="true"></i>
                                <div style="display: inline; color: rgb(17, 49, 81); font-size: 12px; height= 50px;">Sign Out</div>

                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script>
    function addLoadEvent(func) {
    var oldonload = window.onload;
    if (typeof window.onload != 'function') {
    window.onload = func;
    } else {
    window.onload = function() {
    if (oldonload) {
    oldonload();
    }
    func();
    }
    }
    }
   addLoadEvent(function () {
        if (document.getElementById('div1') != null) {
            var theImg = document.getElementById('div1');
            if (theImg.width > theImg.height) {
                theImg.height = 100;
                var tempWidth = theImg.width;
                var middle = tempWidth / 2.0;
                var toLeft = middle - 50;
                document.getElementById("div1").style.right = "-" + toLeft + "px";
                document.getElementById("div1").style.top = "-4px";
                document.getElementById("div1").style.visibility = "visible";

            }
            else if (theImg.width < theImg.height) {
                theImg.width = 100;
                var tempHeight = theImg.height;
                var middle = tempHeight / 2;
                var toTop = middle - 75;
                document.getElementById("div1").style.top = "-" + toTop + "px";
                document.getElementById("div1").style.left = "-4px";
                document.getElementById("div1").style.visibility = "visible";
            }
            else {
                document.getElementById("div1").style.width = "100px";
                document.getElementById("div1").style.height = "100px";
                document.getElementById("div1").style.left = "-4px";
                document.getElementById("div1").style.visibility = "visible";
            }
        }
    });
    addLoadEvent(function () {
        if (document.getElementById('div2') != null) {
            var theImg = document.getElementById('div2');
            if (theImg.width > theImg.height) {
                theImg.height = 100;
                var tempWidth = theImg.width;
                var middle = tempWidth / 2.0;
                var toLeft = middle - 50;
                document.getElementById("div2").style.right = "-" + toLeft + "px";
                document.getElementById("div2").style.top = "-4px";
                document.getElementById("div2").style.visibility = "visible";

            }
            else if (theImg.width < theImg.height) {
                theImg.width = 100;
                var tempHeight = theImg.height;
                var middle = tempHeight / 2;
                var toTop = middle - 75;
                document.getElementById("div2").style.top = "-" + toTop + "px";
                document.getElementById("div2").style.left = "-4px";
                document.getElementById("div2").style.visibility = "visible";
            }
            else {
                document.getElementById("div2").style.width = "100px";
                document.getElementById("div2").style.height = "100px";
                document.getElementById("div2").style.left = "-4px";
                document.getElementById("div2").style.visibility = "visible";
            }
        }
    });
    addLoadEvent(function () {
        if (document.getElementById('div3') != null) {
            var theImg = document.getElementById('div3');
            if (theImg.width > theImg.height) {
                theImg.height = 100;
                var tempWidth = theImg.width;
                var middle = tempWidth / 2.0;
                var toLeft = middle - 50;
                document.getElementById("div3").style.right = "-" + toLeft + "px";
                document.getElementById("div3").style.top = "-4px";
                document.getElementById("div3").style.visibility = "visible";

            }
            else if (theImg.width < theImg.height) {
                theImg.width = 100;
                var tempHeight = theImg.height;
                var middle = tempHeight / 2;
                var toTop = middle - 75;
                document.getElementById("div3").style.top = "-" + toTop + "px";
                document.getElementById("div3").style.left = "-4px";
                document.getElementById("div3").style.visibility = "visible";
            }
            else {
                document.getElementById("div3").style.width = "100px";
                document.getElementById("div3").style.height = "100px";
                document.getElementById("div3").style.left = "-4px";
                document.getElementById("div3").style.visibility = "visible";
            }
        }
    });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>