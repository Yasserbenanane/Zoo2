<?php

$DBserver = 'localhost';
$DBusername = 'root';
$BDpassword = '';

$DBlink = mysqli_connect($DBserver, $DBusername, $BDpassword); 

$DBSelectPPE4 = mysqli_select_db($DBlink, "ppe4");

?>