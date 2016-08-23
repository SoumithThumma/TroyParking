<?php
define('DB_HOST', '107.180.20.80');
define('DB_NAME', 'BidSpot');
define('DB_USER','bala');
define('DB_PASSWORD','bala1');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

function SignIn()
{

session_start();   //starting the session for user profile page
if(!empty($_POST['inputEmail'])) 
{
	$query = mysql_query("SELECT * FROM User where Email = '$_POST[inputEmail]' AND Password = '$_POST[inputPassword]'
		AND Active = 'true' ");
	$row = mysql_fetch_array($query);


	if(!empty($row['Email']) AND !empty($row['Password']))
	{

                setcookie("Email", $row['Email'], time() + 3600);
$cars = (int) $row['Num_of_Cars'];
if ($cars >0){header('Location: home.php');
exit;
}
else{header('Location: excarreg.php');
exit;}
                
                
		//echo "Login Complete";

	}
	else
	{
		header('Location: login.php?fail=true');
                        exit;
	}
}
}

	SignIn();


?>