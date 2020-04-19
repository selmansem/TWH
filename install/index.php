<?php

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TWH Installer</title>
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" type="image/ico" href="../media/icons/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/master.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2c3d4b4223.js" crossorigin="anonymous"></script>
    <script src="../js/script.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="jumbotron bg-dark text-white rounded-0">
      <h1 class="display-4">TWH Installer</h1>
      <p class="lead">Telegram WebHook installation wizard. All fields on this form are required.</p>
    </div>

    <div class="col-lg-6 p-0 mb-4">
      <form class="w-auto mx-3 striped-rows" action="installer.php" method="POST">
        <h5>Telegram bot info</h5>
        <hr class="my-4">
        <div class="form-group">
          <label class="font-weight-bold" for="FormControlInput1">Bot name</label>
          <input name="BOTNAME" type="text" class="form-control Must" id="FormControlInput1" placeholder="BotBot" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="FormControlInput2">Telegram API token</label>
          <input name="BOTTOKEN" type="text" class="form-control Must" id="FormControlInput2" placeholder="a1b2c3d4e5..." autocomplete="off" required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="FormControlInput3">URL to send updates</label>
          <input name="WEBHOOKHOST" type="url" class="form-control Must" id="FormControlInput3" placeholder="https://example.com/request.file" autocomplete="off" required>
        </div>
        <h5 class="mt-5">Database info</h5>
        <hr class="my-4">
        <div class="form-group">
          <label class="font-weight-bold" for="FormControlInput4">DB Host</label>
          <input name="DBHOST" type="text" class="form-control Must" id="FormControlInput4" placeholder="db.host.com" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="FormControlInput5">DB Username</label>
          <input name="DBUSERNAME" type="text" class="form-control Must" id="FormControlInput5" placeholder="mydbusername" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="FormControlInput6">DB Password</label>
          <input name="DBPASSWORD" type="password" class="form-control" id="FormControlInput6" placeholder="mydbpassword" autocomplete="off">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="FormControlInput7">DB Name</label>
          <input name="DBNAME" type="text" class="form-control Must" id="FormControlInput7" placeholder="mydbname" autocomplete="off" required>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="DBOWNER" value="1" id="defaultCheck1">
          <label class="form-check-label" for="defaultCheck1">
            Use this checkbox if your hosting provider does not allow you to create databases or you do not have a dedicated server. If you check it, remember to write the DB Name assigned to you.
          </label>
        </div>
        <h5 class="mt-5">Optional password</h5>
        <hr class="my-4">
        <div class="form-group">
          <label class="font-weight-bold" for="FormControlInput8">Password</label>
          <input type="password" class="form-control" id="FormControlInput8" placeholder="********" autocomplete="off">
        </div>
        <div class="mt-4">
          <button type="reset" class="btn btn-secondary mr-2">Reset</button>
          <button type="submit" class="btn btn-primary" name="saveconf" id="submit">Save</button>
        </div>
      </form>
    </div>
  </body>
</html>
