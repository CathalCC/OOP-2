<?php

//This page is used to recognize the details of the database that the site
//works with
//$connect is used on each webpage in this project because of this, as calling on
//the mysqli_connect function within it is what establishes the connection.
$dbhost = "mysql1.it.nuigalway.ie";
$dbuser = "mydb6464mc";
$dbpass = "xy2hyb";
$dbname = "mydb6464";

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);