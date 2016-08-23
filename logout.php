<?php
if (isset($_COOKIE["Email"])){
setcookie("Email", "", time() - 3600);
header('Location: login.php');
}
else {
header('Location: login.php');
}
?>