<?php

mysql_connect('107.180.20.80','bala','bala1');
mysql_select_db('BidSpot');


$name=mysql_real_escape_string($_GET['name']);
 $query_run=mysql_query("SELECT * FROM User WHERE Email='".$name."'");
 while($row=mysql_fetch_assoc($query_run)){
  $imageData = $row['profile_pic'];
  $imageType = $row['Pic_Type'];

if ($imageType === NULL){
$query_run=mysql_query("SELECT * FROM Car WHERE ID=0");
while($row=mysql_fetch_assoc($query_run)){
  $imageData = $row['Picture'];
  $imageType = $row['Type'];
 }
}
 }

 header('content-type:$imageType');
 echo $imageData;


?>﻿