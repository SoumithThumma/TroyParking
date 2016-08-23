<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
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

                <div class="card hovercard" style="padding-bottom:20px;">
                    <div class="cardheader-profile">

                    </div>
                    <!--<div class="spot">
                        <button class="btn btn-lg btn-primary btn-block btn-spot">30</button>
                    </div>-->
                                       <?php

//Code for Table of statistics on Profile Page

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

$sql = "SELECT * FROM User WHERE Email ='".$Email."'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();	//row holds user info

//First name = $row['FirstName'];
//Last name = $row['LastName'];


$Num_Spots_Held = mysqli_query($conn,"SELECT COUNT(Transaction_ID) FROM Transaction WHERE Seller ='".$Email."'");  //Gets Count of number of spots user has held for someone else
$Holder = $Num_Spots_Held->fetch_row();	
$Num_Spots_Found = mysqli_query($conn,"SELECT COUNT(Transaction_ID) FROM Transaction WHERE Buyer ='".$Email."'");  //Gets Count of number of spots user has found
$Finder = $Num_Spots_Found->fetch_row();

$Num_Prob_Filed = mysqli_query($conn,"SELECT COUNT(Problem_ID) FROM Problem WHERE Who_Filed ='".$Email."'"); //Gets Count of number of problems user has filed
$Filed = $Num_Prob_Filed->fetch_row();
$Num_Filed_Agst = mysqli_query($conn,"SELECT COUNT(Problem_ID) FROM Problem WHERE Filed_Against ='".$Email."'"); //Gets Count of number of problems user has been filed against
$Agst = $Num_Filed_Agst->fetch_row();


$transaction = "SELECT * FROM Transaction WHERE Buyer ='".$Email."' OR Seller ='".$Email."'  ORDER BY Time";  // use to get the last 10 transactions  ***Need to test if it is ordering by time correctly ***
$transResult = $conn->query($transaction);
$rowone = $transResult->fetch_assoc();  //all of the Transaction info relating to specific email ---- isn't specific to whether transaction was buyer or seller
$rating = (int)$row['Percentage'];


//Code for displaying the correct user profile image	***Need to test***

			echo '<div class="avatar">';
				echo '<img alt="" style="visibility: hidden;" src="ShowProfileImage.php" id="profile-loaded"/>';
			echo '</div>';

//Code for echoing html table with stats in it for profile page		***Need to Test***

			echo '<div class="bottom">';
				echo '<h2>Profile</h2>';

				echo '<div class="desc">Your Rating:</div>';

				echo '<table class="table table-striped">';
					echo '<tr>
						<td>
							Spots Held
						</td>';
						echo '<td>';
							echo $Holder[0];  //change this to Number of spots user has held
						echo '</td>';
					echo '</tr>';
					echo '<tr>
						<td>Spots Received</td>';
						echo '<td>';
							echo $Finder[0];	//Number of spots user has found
						echo '</td>';   
					echo '</tr>';
					echo '<tr>
						<td>Problems Against</td>';
						echo '<td>';
							echo $Agst[0];   //Number of Problems Against
						echo '</td>';
					echo '</tr>';
					echo '<tr>
						<td>Problems Filed</td>';
						echo '<td>';
							echo $Filed[0];	//Number of Problems filed
						echo '</td>';
					echo '</tr>';
					echo '<tr>
						<td>Percentage</td>';						
						echo '<td>';
							echo $rating;	//Percentage
						echo '</td>';
					echo '</tr>
				</table>';

				
				
//Code for getting most recent transactions   *** Need to Test ***
//$j = 0;
//while($rowone = $transResult->fetch_assoc() AND j < 10)
//{
	//$rowone['Buyer'];
	//$rowone['Seller'];
	//$rowone['Points_Worth'];
	//$rowone['Transaction_ID'];
	//$rowone['Parking_Lot'];
	//$rowone['Result'];
	//$rowone['Time'];
	//$j = $j + 1;
//}	

mysql_close($conn);

?>
                        <div class="desc" style="margin-top: 15px;">Your vehicles:</div>
                        <div class="desc" style="font-size: 10px;">Click one of the three vehicle panels to add or update a vehicle.</div>

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
//$CarCount = (int) "SELECT COUNT(Email) FROM Cars Where Email ='".$Email."'";
$carresult = $conn->query($usercar);

$num_rows = (int) mysqli_num_rows($carresult);
//This should take care of creating the correct Divs
$i = 0;
$k = 3;
while($i < $k)
{

	if($i < $num_rows)   // all of the car info
	{
$rowtwo = $carresult->fetch_assoc();
			//Create Car Div
			
				echo  '<div class="spotcontain box-shadow--4dp" style="overflow:auto;">';
					echo '<div class="viewpoint">';
$id = $rowtwo["ID"];
						 echo '<img style="visibility: hidden; position:absolute;" src="showImage.php?name='.$id.'" id="div';
echo ($i+1);
echo '" />';
					echo '</div>';
					echo '<div class="spotbody">';
						echo '<p>Color: '.$rowtwo["Color"].'</p>';
						echo '<p>Make: '.$rowtwo["Make"].'</p>';
						echo '<p>Model: '.$rowtwo["Model"].'</p>';
						echo '<p>Year: '.$rowtwo["Year"].'</p>';
echo '<div class="col-xs-12 col-sm-10 col-md-6 col-lg-6" style="margin-top:5px;"><a data-toggle="modal" href="#';
                                       echo $i;
                                       echo '">';
                                       echo '<button class="btn btn-primary btn-warning" style="width: 100%;">Delete</button>';
                                       echo '</a></div>';


                                       echo '<div class="col-xs-12 col-sm-10 col-md-6 col-lg-6" style="margin-top:5px;"><a href="#update-car';
                                       echo $i;
                                       echo '" data-toggle="collapse">';
                                       echo '<button class="btn btn-primary" style="width: 100%;">Update</button>';
                                       echo '</a></div>';
                                       
				       echo '</div>';
                                       				 
                                       echo '</div>';

    echo '<div class="modal fade" id="';
echo $i;
echo '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Delete Vehicle?</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this vehicle?</p>';
echo '<p>Color: '.$rowtwo["Color"].'</p>';
						echo '<p>Make: '.$rowtwo["Make"].'</p>';
						echo '<p>Model: '.$rowtwo["Model"].'</p>';
						echo '<p>Year: '.$rowtwo["Year"].'</p>';

                echo '</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-full" value="open full size image" onclick="window.location=\'deletecar.php?carID=';
echo $rowtwo["ID"];
echo '\';">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>';
				
                     //This is for the button dropdown menu

                       echo '<div class="collapse" id="update-car';
echo $i;
echo '" style="border: 1px solid black; padding: 10px; background-color: #FFFFFF">
                                <form class="form-register" method="post" action="carphp.php" autocomplete="on" enctype="multipart/form-data">
                                   
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:5px; padding: 0px;"><div class="desc">Upload Image Of This Car (OPTIONAL)</div></div>
                                    <div class="form-group"><input id=Input name="image" type="file" style="width: 100%;" /></div>
                                    <input value =';
echo $rowtwo["ID"];
echo ' name="carID" type="hidden">

                                    <button class="btn btn-lg btn-primary btn-block btn-find" style="background-color: RGB(49,103,157); " type="submit" id="Submit">Update Vehicle</button>

                                </form>
                            </div>';

				
				$i = $i +1;
	}
	else
	{
		//Create Register New Car Div
                       echo '<div id="less-than-three" style="margin-top: 10px; width:100%;">
                            <button class="btn btn-lg btn-primary btn-block btn-find" type="submit" id="Submit" onclick="location.href=\'excarreg.php\'">Register New Car</button>
                        </div>';
				
				$i = $i +1;
	}
}

mysql_close($conn);

?>	



                        <hr />


                        <div class="desc" style="margin-top: 15px;">Update/Change profile image:</div>
                        <div>
                            <form class="form-register" method="post" autocomplete="on" action="UploadProfileIMG.php" enctype="multipart/form-data">
                                <div class="form-group"><input type="file" name="image"/></div>

                                <button class="btn btn-lg btn-primary btn-block btn-find" type="submit" id="Submit" name ="Submit">Upload Image</button>

                            </form>
                        </div>



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
        var theImg = document.getElementById('profile-loaded');
        if (theImg.width > theImg.height) {
            theImg.height = 150;
            var tempWidth = theImg.width;
            var middle = tempWidth / 2;
            var toLeft = middle - 75;
            document.getElementById("profile-loaded").style.right = "-" + toLeft + "px";
            document.getElementById("profile-loaded").style.visibility = "visible";

        }
        else if (theImg.width < theImg.height) {
            theImg.width = 150;
            var tempHeight = theImg.height;
            var middle = tempHeight / 2;
            var toTop = middle - 75;
            document.getElementById("profile-loaded").style.top = "-" + toTop + "px";
            document.getElementById("profile-loaded").style.left = "-4px";
            document.getElementById("profile-loaded").style.visibility = "visible";
        }
        else {
            document.getElementById("profile-loaded").style.width = "150px";
            document.getElementById("profile-loaded").style.height = "150px";
            document.getElementById("profile-loaded").style.left = "-4px";
            document.getElementById("profile-loaded").style.visibility = "visible";
        }
    });
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