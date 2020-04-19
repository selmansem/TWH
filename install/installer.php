<?php
$file = '../config/condata.php';
if ($_POST) {
  $required = array('BOTNAME', 'BOTTOKEN', 'WEBHOOKHOST', 'DBHOST', 'DBUSERNAME', 'DBNAME');
  $error = false;
  foreach($required as $field) {
    if (empty($_POST[$field])) {
      $error = true;
    }
  }

  if ($error == true) {
    echo "All fields are required.";
  } else {
    file_put_contents($file,str_replace('##BOTNAME##',$_POST['BOTNAME'],file_get_contents($file)));
    file_put_contents($file,str_replace('##BOTTOKEN##',$_POST['BOTTOKEN'],file_get_contents($file)));
    file_put_contents($file,str_replace('##WEBHOOKHOST##',$_POST['WEBHOOKHOST'],file_get_contents($file)));
    file_put_contents($file,str_replace('##DBHOST##',$_POST['DBHOST'],file_get_contents($file)));
    file_put_contents($file,str_replace('##DBUSERNAME##',$_POST['DBUSERNAME'],file_get_contents($file)));
    file_put_contents($file,str_replace('##DBPASSWORD##',$_POST['DBPASSWORD'],file_get_contents($file)));
    file_put_contents($file,str_replace('##DBNAME##',$_POST['DBNAME'],file_get_contents($file)));
    $hookit = "https://api.telegram.org/bot".$_POST['BOTTOKEN']."/setWebhook?url=".$_POST['WEBHOOKHOST'];
    file_get_contents($hookit);
    unlink('index.php');
    unlink(__FILE__);
    header("Location: ../");
  }
}

$botname = $_POST['BOTNAME'];
$dbsname = $_POST['DBNAME'];
$dbshost = $_POST['DBHOST'];
$dbsuname = $_POST['DBUSERNAME'];
$dbspasswd = $_POST['DBPASSWORD'];

$query1 = "CREATE DATABASE ".$dbsname;
$query2 = "CREATE TABLE `bots` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `botNAME` varchar(20) NOT NULL,
  `webhook` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";
$query3 = "CREATE TABLE `regedits` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `userNAME` varchar(33) NOT NULL,
  `editedDATA` int(3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";
$query4 = "CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `userNAME` varchar(33) NOT NULL,
  `userTYPE` int(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";
$query5 = "INSERT INTO `bots` (`botNAME`, `webhook`) VALUES ('$botname', 1)";

$link1 = mysqli_connect($dbshost, $dbsuname, $dbspasswd);
mysqli_query($link1, $query1);
sleep(5);
$link2 = mysqli_connect($dbshost, $dbsuname, $dbspasswd, $dbsname);
mysqli_query($link2, $query2);
mysqli_query($link2, $query3);
mysqli_query($link2, $query4);
mysqli_query($link2, $query5);
?>
