<!-- File for private data -->
<?php
$botNAME = "##BOTNAME##";
$botToken = "##BOTTOKEN##";
$webhookHost = "##WEBHOOKHOST##";
$dbHost = "##DBHOST##";
$dbUserame = "##DBUSERNAME##";
$dbPassword = "##DBPASSWORD##";
$dbName = "##DBNAME##";

// MySQL Connection
$link = mysqli_connect($dbHost, $dbUserame, $dbPassword, $dbName);
if ($link === false){
  die();
}
?>
