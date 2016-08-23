<?php

define('DB_HOST', '107.180.20.80');
define('DB_NAME', 'BidSpot');
define('DB_USER','bala');
define('DB_PASSWORD','bala1');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$query = mysql_query("SELECT * FROM Spots where Email = '".$_COOKIE[Email]."'");
	$row = mysql_fetch_array($query);
$Taken = $row["Taken"];
if ($Taken == "No"){
if (isset($_GET["cancel"])){
mysql_query("DELETE FROM Spots where Email = '".$_COOKIE[Email]."'");
header('Location: home.php');
}
else{
header( "refresh:15;url=waiting.php" );
}

}
else{
setcookie("Transaction_ID", $row['Transaction_ID'], time()+3600);
if (isset($_GET["cancel"])){
header('Location: transactionseller.php?cancel=true');
}
else{
header('Location: transactionseller.php');
}

exit;
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
    <link rel="stylesheet" href="css/reg.css" type="text/css" />
    <title>TroyParking Registration</title>


</head>
<body>
    <!-- the form action attribute needs to be changed -->


    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">

                <div class="card hovercard" style="padding-bottom:20px;">
                    <div class="cardheader">

                    </div>

                    <div class="info">


                    </div>

                    <div class="bottom">
                        <h2>Waiting</h2>
                        <div class="desc" style="margin-top:10px; text-align:left;">
                            We are waiting for someone to take your spot. Keep an eye on this page. When your spot is taken, we will redirect you to the timer page.
                        </div>
                        <div><img src="images/load.gif" style="width: 250px; height: 250px;"/></div>
<a href="waiting.php?cancel=true">
                        <button class="btn btn-lg btn-primary btn-block btn-find">Cancel</button>
</a>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>