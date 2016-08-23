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
if ($cars>0){
header('Location: home.php');
die();
}
else{
header('Location: excarreg.php');
die();}
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">



              <!--    , ; ,   .-'"""'-.   , ; , -->
              <!--    \\|/  .'         '.  \|// -->
              <!--     \-;-/   ()   ()   \-;-/  -->
              <!--     // ;               ; \\  -->
              <!--    //__; :.         .; ;__\\ -->
              <!--   `-----\'.'-.....-'.'/-----'-->
              <!--          '.'.-.-,_.'.'       -->
              <!--            '(  (..-'         -->
              <!--              '-'             -->
              <!--Why so concerned about our code?-->
              <!--Aaron Was Here 5/1/2016 at 1:45A.M.-->





<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width = device-width, initial-scale = 1" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link rel="shortcut icon" href="images/car-icon2.png">

    <title>TroyParking</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">


              







                <img id="profile-img" class="profile-img-card" src="images/neewlogo.png" />
                <p id="profile-name" class="profile-name-card" style="margin-top: -60px;"></p>
                <form class="form-signin" method="POST" action="connectivity.php" id="logForm">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
<?php

if (isset($_GET['fail'])){
echo '<div class="desc" style="color: red; margin-bottom: 5px;">Login details incorrect. Try Again!</div>';
}

?>
                    
                    <button class="btn btn-lg btn-primary btn-block btn-signin" name="submit" id="button" type="submit">Sign in</button>
                </form><!-- /form -->
                <a href="forgotEmail.php" class="forgot-password">
                    Forgot password?
                </a>
<br>
<a href="registration.php" class="forgot-password">Don't have an account? Sign Up</a>
<div class"col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="pull-right">
<a href="http://www.facebook.com/troyparking" target="_blank"><i class="fa fa-facebook-square" style="font-size:50px; " aria-hidden="true"></i></a> </div>
</div>
                    
                    
      

                </div>
            
            <div class="hidden-xs col-sm-8 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-0 col-lg-offset-0">
                <p class="side-column" id="why-join">
                    Why join TroyParking?
                    <ul class="ul-side">
                        <li>No more guessing where spots will be!</li>
                        <li>No more running late for class!</li>
                        <li>No more going to campus early just to find a spot!</li>
                        <li>No more tickets!!</li>
                        <li>Get the parking lot you want!</li>
                        <li id="last-item">It's 100% free!</li>
                        
                    </ul>
                </p>
            </div>
            </div>
            
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>