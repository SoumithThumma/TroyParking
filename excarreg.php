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
}
else {
header('Location: login.php');
die();
}
?>

<!DOCTYPE html>
<html>
<!--


                        .s$$$Ss.
            .8,         $$$. _. .              ..sS$$$$$"  ...,.;
 o.   ,@..  88        =.$"$'  '          ..sS$$$$$$$$$$$$s. _;"'
  @@@.@@@. .88.   `  ` ""l. .sS$$.._.sS$$$$$$$$$$$$S'"'
   .@@@q@@.8888o.         .s$$$$$$$$$$$$$$$$$$$$$'
     .:`@@@@33333.       .>$$$$$$$$$$$$$$$$$$$$'
     .: `@@@@333'       ..>$$$$$$$$$$$$$$$$$$$'
      :  `@@333.     `.,   s$$$$$$$$$$$$$$$$$'
      :   `@33       $$ S.s$$$$$$$$$$$$$$$$$'
      .S   `Y      ..`  ,"$' `$$$$$$$$$$$$$$
      $s  .       ..S$s,    . .`$$$$$$$$$$$$.
      $s .,      ,s ,$$$$,,sS$s.$$$$$$$$$$$$$.
      / /$$SsS.s. ..s$$$$$$$$$$$$$$$$$$$$$$$$$.
     /`.`$$$$$dN.ssS$$'`$$$$$$$$$$$$$$$$$$$$$$$.
    ///   `$$$$$$$$$'    `$$$$$$$$$$$$$$$$$$$$$$.
   ///|     `S$$S$'       `$$$$$$$$$$$$$$$$$$$$$$.
  / /                      $$$$$$$$$$$$$$$$$$$$$.
                           `$$$$$$$$$$$$$$$$$$$$$s.
                            $$$"'        .?T$$$$$$$
                           .$'        ...      ?$$#\
                           !       -=S$$$$$s
                         .!       -=s$$'  `$=-_      :
                        ,        .$$$'     `$,       .|
                       ,       .$$$'          .        ,
                      ,     ..$$$'
                          .s$$$'                 `s     .
                   .   .s$$$$'                    $s. ..$s
                  .  .s$$$$'                      `$s=s$$$
                    .$$$$'                         ,    $$s
               `   " .$$'                               $$$
               ,   s$$'                              .  $$$s
            ` .s..s$'                                .s ,$$
             .s$$$'                                   "s$$$,
          -   $$$'                                     .$$$$.
        ."  .s$$s                                     .$',',$.
        $s.s$$$$S..............   ................    $$....s$s......
         `""'           `     ```"""""""""""""""         `""   ``
                                                            
        I'm probably just procrastinating...



-->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="images/car-icon2.png">
    <meta id="meta" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/reg.css" type="text/css" />
    <title>TroyParking</title>


</head>
<body>

    <!-- the form action attribute needs to be changed -->


    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">


<div style="margin-top: 10px; margin-bottom: -5px;">
<div style="color: white; text-align: left; width: 100%;">
<a href="home.php" style="color: white;"><span style="font-size: 12px;"><i class="fa fa-home" aria-hidden="true"></i> Home</span></a></div>
<!--<div style="color: white; text-align: right; width: 49%; display: inline-block;">
<a href="#"><span style="font-size: 12px;">Sign Out <i class="fa fa-sign-out" aria-hidden="true"></i></span></a></div>--></div>


                <div class="card hovercard" style="padding-bottom:20px;">
                    <div class="cardheader-car">

                    </div>

                    <div class="info">


                    </div>

                    <div class="bottom">
                        <h2>Car Registration</h2>
                        <div class="desc" style="margin-top:10px; margin-bottom:20px; text-align:left;">
                            Before using this service, we require all users add at least one car to their account. Please fill out the form below.
                            You can have up to 3 cars linked to one account at a time.
                        </div>

                        <form class="form-register" method="post" action="car.php" autocomplete="on" enctype="multipart/form-data">
                            <script src="edmund.js"></script>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:5px; padding: 0px;"><div class="desc">Make</div></div>
                            <div class="form-group"><select id=Make name="Make" class="form-control" required> </select></div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:5px; padding: 0px;"><div class="desc">Model</div></div>
                            <div class="form-group"><select id=Model name="Model" class="form-control" required> </select></div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:5px; padding: 0px;"><div class="desc">Year</div></div>
                            <div class="form-group"><select id=Year name="Year" class="form-control" required> </select></div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:5px; padding: 0px;"><div class="desc">Color</div></div>
                            <div class="form-group">
                                <select id=Color name="Color" class="form-control"required>
                                        <option value="Blank">  </option>
                                        <option value="White"> White </option>
                                        <option value="Black"> Black </option>
                                        <option value="Silver"> Silver </option>
                                        <option value="Gray"> Gray </option>
                                        <option value="Red"> Red </option>
                                        <option value="Blue"> Blue </option>
                                        <option value="Brown"> Brown </option>
                                        <option value="Beige"> Beige </option>
                                        <option value="Yellow/Gold"> Yellow/Gold </option>
                                        <option value="Green"> Green </option>
                                        <option value="Orange"> Orange </option>
                                        <option value="Purple"> Purple </option>
                                    </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:5px; padding: 0px;"><div class="desc">Upload Image Of This Car (OPTIONAL)</div></div>
                            
<input type="file" name="image"/>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:20px; padding: 0px;"><div class="desc" style="font-size: 10px;">
                                Uploading an image of your car will help people spot your car when looking for your spot and when you arrive to take someone else's spot. You can always do this later from
                                your profile page.</div></div>


                            <button class="btn btn-lg btn-primary btn-block btn-find" type="submit" id="submit">Register Vehicle</button>
                            <!--<input type="submit" value="submit" style="width:125px; height:25px;" id="Submit" />-->

                        </form>

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