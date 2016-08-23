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
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="images/car-icon2.png">
    <meta id="meta" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/holdspot.css" type="text/css" />
    <title>TP - Hold Your Spot</title>


</head>
<body>
<!--

quu..__
 $$$b  `---.__
  "$$b        `--.                          ___.---uuudP
   `$$b           `.__.------.__     __.---'      $$$$"              .
     "$b          -'            `-.-'            $$$"              .'|
       ".                                       d$"             _.'  |
         `.   /                              ..."             .'     |
           `./                           ..::-'            _.'       |
            /                         .:::-'            .-'         .'
           :                          ::''\          _.'            |
          .' .-.             .-.           `.      .'               |
          : /'$$|           .@"$\           `.   .'              _.-'
         .'|$u$$|          |$$,$$|           |  <            _.-'
         | `:$$:'          :$$$$$:           `.  `.       .-'
         :                  `"--'             |    `-.     \
        :##.       ==             .###.       `.      `.    `\
        |##:                      :###:        |        >     >
        |#'     `..'`..'          `###'        x:      /     /
         \                                   xXX|     /    ./
          \                                xXXX'|    /   ./
          /`-.                                  `.  /   /
         :    `-  ...........,                   | /  .'
         |         ``:::::::'       .            |<    `.
         |             ```          |           x| \ `.:``.
         |                         .'    /'   xXX|  `:`M`M':.
         |    |                    ;    /:' xXXX'|  -'MMMMM:'
         `.  .'                   :    /:'       |-'MMMM.-'
          |  |                   .'   /'        .'MMM.-'
          `'`'                   :  ,'          |MMM<
            |                     `'            |tbap\
             \                                  :MM.-'
              \                 |              .''
               \.               `.            /
                /     .:::::::.. :           /
               |     .:::::::::::`.         /
               |   .:::------------\       /
              /   .''               >::'  /
              `',:                 :    .'





















-->

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
                    <div class="cardheader-find">

                    </div>

                    <div class="info">


                    </div>

                    <div class="bottom">
                        <h2>Find Spot</h2>
                        <div class="desc" style="margin-top:10px; text-align:left;">
                            Which parking lot are you looking for?</div>
                        <div class="desc" style="font-size: 10px; margin-bottom:20px; ">Choose all to see all available spots.</div>

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
if (isset($_GET["cardid"])){

$update = mysql_query("UPDATE User SET CurrentCar = ".$_GET["cardid"]." WHERE Email = '".$Email."'");

}
if ($type == "Student"){
echo                                                   '


    
<div class="lotchoice">
                            
                                <div class="imdiv"><img src="images/arena.jpg"  style="border-color: grey;"/></div>
                            
                            <a href="getspot.php?id=0"><div class="lotname">
                                <p>All Spots</p>
                            </div></a>
                       </div>


<div class="lotchoice">
                            <a data-toggle="modal" href="#spatterson" >
                                <div class="imdiv"><img src="images/patterson.jpg"  style="border-color: rgb(0,162,232);"/></div>
                            </a>
                            <a href="getspot.php?id=1"><div class="lotname">
                                <p>Patterson</p>
                            </div></a>
                       </div>

<div class="lotchoice">
                            <a data-toggle="modal" href="#spit">
                                <div class="imdiv"><img src="images/pit.jpg"  style="border-color: rgb(163,73,164);"/></div>
                            </a>
                            <a href="getspot.php?id=2"><div class="lotname">
                                <p>Pit</p>
                            </div></a>
                       </div>

<div class="lotchoice">
                            <a data-toggle="modal" href="#sartbuilding">
                                <div class="imdiv"><img src="images/arts.jpg"  style="border-color: rgb(63,72,204);"/></div>
                            </a>
                            <a href="getspot.php?id=3"><div class="lotname">
                                <p>Art Building</p>
                            </div></a>
                       </div>

<div class="lotchoice">
                            <a data-toggle="modal" href="#strojancenter">
                                <div class="imdiv"><img src="images/artf.jpg"  style="border-color: rgb(255,174,201);"/></div>
                            </a>
                            <a href="getspot.php?id=4"><div class="lotname">
                                <p>Trojan Center</p>
                            </div></a>
                       </div>

<div class="lotchoice">
                            <a data-toggle="modal" href="#sbusstop">
                                <div class="imdiv"><img src="images/busstop.jpeg"  style="border-color: rgb(128,255,255);"/></div>
                            </a>
                            <a href="getspot.php?id=5"><div class="lotname">
                                <p>Bus-Stop</p>
                            </div></a>
                       </div>

<div class="lotchoice">
                            <a data-toggle="modal" href="#sstadium">
                                <div class="imdiv"><img src="images/stadium.jpeg"  style="border-color: rgb(185,122,87);"/></div>
                            </a>
                            <a href="getspot.php?id=6"><div class="lotname">
                                <p>Stadium</p>
                            </div></a>
                       </div>

<div class="lotchoice">
                            <a data-toggle="modal" href="#sbaseball">
                                <div class="imdiv"><img src="images/baseball.jpeg"  style="border-color: rgb(255,0,0);"/></div>
                            </a>
                            <a href="getspot.php?id=7"><div class="lotname">
                                <p>Baseball Field</p>
                            </div></a>
                       </div>

<div class="lotchoice">
                            <a data-toggle="modal" href="#ssartain">
                                <div class="imdiv"><img src="images/sartain.jpeg"  style="border-color: rgb(255,127,39);"/></div>
                            </a>
                            <a href="getspot.php?id=8"><div class="lotname">
                                <p>Sartain</p>
                            </div></a>
                       </div>

<div class="lotchoice">
                            <a data-toggle="modal" href="#sgravel">
                                <div class="imdiv"><img src="images/gravel.jpeg"  style="border-color: rgb(255,242,0);"/></div>
                            </a>
                            <a href="getspot.php?id=9"><div class="lotname">
                                <p>Gravel</p>
                            </div></a>
                       </div>

<div class="lotchoice">
                            <a data-toggle="modal" href="#salumni">
                                <div class="imdiv"><img src="images/alumni.jpg"  style="border-color: rgb(34,177,76);"/></div>
                            </a>
                            <a href="getspot.php?id=10"><div class="lotname">
                                <p>Alumni</p>
                            </div></a>
                       </div>





                            
                            <!--<a href="getspot.php?id=0">
                            <div class="desc contain">
                                <img src="images/arena.jpg" />
                                <p>All Spots</p>
                            </div>
                        </a>
                        <a href="getspot.php?id=1">
                            <div class="desc contain">
                                <img src="images/arena.jpg" />
                                <p>Patterson</p>
                            </div>
                        </a>
                        <a href="getspot.php?id=2"><div class="desc contain">
                          <img src="images/arena.jpg" />
                            <p>Pit</p>
                        </div></a>
                        <a href="getspot.php?id=3">
                            <div class="desc contain">
                             <img src="images/arena.jpg" />
                                <p>Art Building</p>
                            </div>
                        </a>
                        <a href="getspot.php?id=4">
                            <div class="desc contain">
                            <img src="images/arena.jpg" />
                                <p>Trojan Center</p>
                            </div>
                        </a>
                        <a href="getspot.php?id=5">
                            <div class="desc contain">
                            <img src="images/busstop.jpeg" />
                                <p>Bus-Stop</p>
                            </div>
                        </a>
                        <a href="getspot.php?id=6">
                            <div class="desc contain">
                            <img src="images/stadium.jpeg" />
                                <p>Stadium</p>
                            </div>
                        </a>
                        <a href="getspot.php?id=7">
                            <div class="desc contain">
                            <img src="images/baseball.jpeg" />
                                <p>Baseball Field</p>
                            </div>
                        </a>
                        <a href="getspot.php?id=8">
                            <div class="desc contain">
                            <img src="images/sartain.jpeg" />
                                <p>Sartain</p>
                            </div>
                        </a>
                        <a href="getspot.php?id=9">
                            <div class="desc contain">
                            <img src="images/gravel.jpeg" />
                                <p>Gravel</p>
                            </div>
                        </a>
                        <a href="getspot.php?id=10">
                            <div class="desc contain">
                            <img src="images/arena.jpg" />
                                <p>Alumni</p>
                            </div>
                        </a>-->';
}
else{echo                                              '


<div class="lotchoice">
                            
                                <div class="imdiv"><img src="images/arena.jpg"  style="border-color: grey;"/></div>
                           
                            <a href="getspot.php?id=0"><div class="lotname">
                                <p>All Spots</p>
                            </div></a>
                       </div>

<div class="lotchoice">
                            <a data-toggle="modal" href="#spatterson">
                                <div class="imdiv"><img src="images/patterson.jpg"  style="border-color: rgb(63,72,204);"/></div>
                            </a>
                            <a href="getspot.php?id=11"><div class="lotname">
                                <p>Patterson</p>
                            </div></a>
                       </div>

<div class="lotchoice">
                            <a data-toggle="modal" href="#flibrary">
                                <div class="imdiv"><img src="images/library.jpg"  style="border-color: rgb(255,174,201);"/></div>
                            </a>
                            <a href="getspot.php?id=12"><div class="lotname">
                                <p>Library</p>
                            </div></a>
                       </div>

<div class="lotchoice">
                            <a data-toggle="modal" href="#fartbuilding">
                                <div class="imdiv"><img src="images/artf.jpg"  style="border-color: rgb(0,162,232);"/></div>
                            </a>
                            <a href="getspot.php?id=13"><div class="lotname">
                                <p>Art Building</p>
                            </div></a>
                       </div>

<div class="lotchoice">
                            <a data-toggle="modal" href="#sstadium">
                                <div class="imdiv"><img src="images/stadium.jpeg"  style="border-color: rgb(255,127,39);"/></div>
                            </a>
                            <a href="getspot.php?id=14"><div class="lotname">
                                <p>Stadium</p>
                            </div></a>
                       </div>

<div class="lotchoice">
                            <a data-toggle="modal" href="#ssartain">
                                <div class="imdiv"><img src="images/sartain.jpeg"  style="border-color: rgb(255,0,0);"/></div>
                            </a>
                            <a href="getspot.php?id=15"><div class="lotname">
                                <p>Sartain</p>
                            </div></a>
                       </div>

<div class="lotchoice">
                            <a data-toggle="modal" href="#fhawkin">
                                <div class="imdiv"><img src="images/smith.jpeg"  style="border-color: rgb(163,73,164);"/></div>
                            </a>
                            <a href="getspot.php?id=16"><div class="lotname">
                                <p>Hawkings/Smith</p>
                            </div></a>
                       </div>

<div class="lotchoice">
                            <a data-toggle="modal" href="#fadmin">
                                <div class="imdiv"><img src="images/administration.jpg"  style="border-color: rgb(255,242,0);"/></div>
                            </a>
                            <a href="getspot.php?id=17"><div class="lotname">
                                <p>Administration</p>
                            </div></a>
                       </div>



                            <!--<a href="getspot.php?id=0">
                            <div class="desc contain">
                                <img src="images/arena.jpg" />
                                <p>All Spots</p>
                            </div>
                        </a>
                        <a href="getspot.php?id=11">
                            <div class="desc contain">
                                <img src="images/arena.jpg" />
                                <p>Patterson</p>
                            </div>
                        </a>
                        <a href="getspot.php?id=12"><div class="desc contain">
                          <img src="images/arena.jpg" />
                            <p>Library</p>
                        </div></a>
                        <a href="getspot.php?id=13">
                            <div class="desc contain">
                             <img src="images/arena.jpg" />
                                <p>Art</p>
                            </div>
                        </a>
                        <a href="getspot.php?id=14">
                            <div class="desc contain">
                            <img src="images/arena.jpg" />
                                <p>Stadium</p>
                            </div>
                        </a>
                        <a href="getspot.php?id=15">
                            <div class="desc contain">
                            <img src="images/arena.jpg" />
                                <p>Sartain</p>
                            </div>
                        </a>
                        <a href="getspot.php?id=16">
                            <div class="desc contain">
                            <img src="images/arena.jpg" />
                                <p>Hawking/Smith</p>
                            </div>
                        </a>
                        <a href="getspot.php?id=17">
                            <div class="desc contain">
                            <img src="images/arena.jpg" />
                                <p>Administration</p>
                            </div>
                        </a>-->';
}

?>

<div class="modal fade" id="spatterson" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Patterson</h4>
                </div>
                <div class="modal-body">
                    <img src="images/patterson.jpg" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location='images/patterson.jpg';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="spit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Pit</h4>
                </div>
                <div class="modal-body">
                    <img src="images/pit.jpg" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location='images/pit.jpg';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="sartbuilding" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Art Building</h4>
                </div>
                <div class="modal-body">
                    <img src="images/arts.jpg" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location='images/arts.jpg';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="strojancenter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Trojan Center</h4>
                </div>
                <div class="modal-body">
                    <img src="images/artf.jpg" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location='images/artf.jpg';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="sbusstop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Bus-Stop</h4>
                </div>
                <div class="modal-body">
                    <img src="images/busstop.jpeg" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location='images/busstop.jpeg';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="sstadium" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Stadium</h4>
                </div>
                <div class="modal-body">
                    <img src="images/stadium.jpeg" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location='images/stadium.jpeg';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="sbaseball" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Baseball Field</h4>
                </div>
                <div class="modal-body">
                    <img src="images/baseball.jpeg" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location='images/baseball.jpeg';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="ssartain" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Sartain</h4>
                </div>
                <div class="modal-body">
                    <img src="images/sartain.jpeg" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location='images/sartain.jpeg';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


<div class="modal fade" id="sgravel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Gravel</h4>
                </div>
                <div class="modal-body">
                    <img src="images/gravel.jpeg" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location='images/gravel.jpeg';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="salumni" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Alumni</h4>
                </div>
                <div class="modal-body">
                    <img src="images/alumni.jpg" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location='images/alumni.jpg';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="flibrary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Library</h4>
                </div>
                <div class="modal-body">
                    <img src="images/library.jpg" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location='images/library.jpg';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="fartbuilding" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Art Building</h4>
                </div>
                <div class="modal-body">
                    <img src="images/artf.jpg" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location='images/artf.jpg';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="fhawkin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hawkins/Smith</h4>
                </div>
                <div class="modal-body">
                    <img src="images/smith.jpeg" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location='images/smith.jpeg';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="fadmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Administration</h4>
                </div>
                <div class="modal-body">
                    <img src="images/administration.jpg" style="width: 100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location='images/administration.jpg';">See Full Size</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

                        
                        

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