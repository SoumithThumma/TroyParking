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

$sql = "SELECT * FROM Spots WHERE Parkinglot = " . $_GET['lot'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {		//row holds spot info
$Email = $row["Email"];
$userInfo = "SELECT * FROM User WHERE Email ='".$Email."'";
$userresult = $conn->query($userInfo);
$rowone = $userresult->fetch_assoc();  //all of the user info
$currentcar = $rowone["CurrentCar"];
$usercar = "SELECT * FROM Car WHERE ID = $currentcar";
//echo $usercar;
$carresult = $conn->query($usercar);
$rowtwo = $carresult->fetch_assoc(); // all of the car info

//echo " <form method='get'> ";
//echo "<div name='$Email'";
//echo " value ='";
echo "<div";
echo " value ='";
echo $Email;
echo "'>";
echo "<a ";
echo " href =#";
echo ">";
echo $rowone["FirstName"];
echo "</br>";
echo $rowtwo['Color'];
echo " ";
echo $rowtwo['Make'];
echo " ";
echo $rowtwo['Model'];
echo " ";
echo $rowtwo['Year'];
echo "</br>";
//echo "'";
//echo " type='submit' >";
echo "Distance from Parking Lot to Campus: ";
echo $row['Distance'];
echo ",  Points you are requesting for your Spot: ";
//echo $row['CurrentCar'];
echo $row['Points'];
echo "</br>";
echo "Your Percentage: ";
echo $rowone['Percentage'];
echo "</a>";
echo "</div>";
echo "</br>";
//echo $rowtwo['Picture'];
//echo " </div>";
//echo "</form>";
    }
} else {
    echo "<h1>No results</h1>";
}
mysql_close($conn);

?>