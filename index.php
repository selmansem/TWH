<?php
$installer = 'install/';
if (file_exists($installer)) {
  header("Location: ".$installer);
}

require 'config/condata.php';

$reqSite = "https://api.telegram.org/bot".$botToken;
$webHook = $reqSite."/setWebhook?url=".$webhookHost;
$delwebHook = $reqSite."/deleteWebhook";

if (isset($_POST['enable'])) {
  $sql1 = "UPDATE bots SET webhook = 1 WHERE botNAME = '$botNAME'";
  mysqli_query($link, $sql1);
  file_get_contents($webHook);
  header("Location : ./");
}
elseif (isset($_POST['disable'])) {
  $sql2 = "UPDATE bots SET webhook = 0 WHERE botNAME = '$botNAME'";
  mysqli_query($link, $sql2);
  file_get_contents($delwebHook);
  header("Location : ./");
}

/* IF YOU WANT TO USE THE SWITCH STATEMENT, DECOMENT AND COMMENT THE IF AND ELSEIF ABOVE */
//
// switch ($_POST) {
//   case isset($_POST['enable']):
//     $sql1 = "UPDATE bots SET webhook = 1 WHERE botNAME = '$botNAME'";
//     mysqli_query($link, $sql1);
//     file_get_contents($webHook);
//     header("Location : ./");
//     break;
//
//   case isset($_POST['disable']):
//     $sql2 = "UPDATE bots SET webhook = 0 WHERE botNAME = '$botNAME'";
//     mysqli_query($link, $sql2);
//     file_get_contents($delwebHook);
//     header("Location : ./");
//     break;
// }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $botNAME; ?> | Telegram Bot</title>
    <link rel="icon" type="image/png" href="media/icons/favicon.ico">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2c3d4b4223.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4"><?php echo $botNAME; ?> Webhook</h1>
        <p class="lead">Webapp to set or delete the <?php $botNAME; ?> webhook.</p>
        <p>
          <?php
            $whfalse = '<i class="fas fa-circle text-danger"></i> Isn\'t hooked right now.';
            $whtrue = '<i class="fas fa-circle text-success"></i> Is hooked right now.';
            $sql = "SELECT * FROM bots WHERE botNAME = '$botNAME'";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);
            $row['webhook'];

            switch ($row['webhook']) {
              case '1':
                echo $whtrue;
                break;
              case '0':
                echo $whfalse;
                break;
            }
          ?>
        </p>
      </div>
    </div>
    <div class="container mx-auto">
      <form class="row" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="col-sm-6 m-3 text-center">
          <button name="enable" type="submit" class="btn btn-success btn-lg btn-block">Activar</button>
        </div>
        <div class="col-sm-6 m-3 text-center">
          <button name="disable" type="submit" class="btn btn-danger btn-lg btn-block">Detener</button>
        </div>
      </form>
    </div>
  </body>
</html>
