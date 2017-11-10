<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- font awesome-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- favicon -->
    <link rel="icon" href="favicon.ico">

    <!-- bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


<header class="jumbotron">
  <h1 class="text-center">Bank</h1>
  <?php
  if (isset($_SESSION['user'])) {
      ?>
  <nav class="">
    <ul class="nav justify-content-end flex-column flex-md-row">
  <li class="nav-item">
    <a class="nav-link" href="index.php">Index</a>
  </li>
  <li class="nav-item">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add account</button>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="add.php?transfer">Transfert</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?logout">Log out</a>
  </li>
</ul>
  </nav>

  <?php
  }
   ?>
</header>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="container d-flex justify-content-center my-5">
          <div class="row">
              <form class="" action="index.php" method="post">
                  <div class="form-group">
                      <label for="type">Select type account:</label>
                      <select class="form-control" name="type" id="type">
                        <?php
                        foreach (Account::Type as $key => $value) {
                            ?>
                          <option value="<?php echo $value?>"><?php echo $value?></option>
                        <?php
                        }
                        ?>
                      </select>
                  </div>
                  <input type="submit" name="submitadd" value="Submit" class="btn btn-primary">
              </form>
          </div>
      </div>
    </div>
  </div>
</div>
