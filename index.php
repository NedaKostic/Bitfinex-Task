<?php
require_once("src/login.php");
require_once("src/symbol.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Neda Kostic">
  <title>Bitfinex WebSocket</title>

  <!--------------- Bootstrap ---------------->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <!------------ CSS Custom File -------------->
  <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark container">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Bitfinex</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <?php if (login())
            echo '
        <li class="nav-item">
          <a class="nav-link" href="favorites.php">Favorites</a>
        </li> ';
          ?>
        </ul>
        <?php if (!login())
          echo '<div class="d-flex">
        <button class="btn btn-outline-secondary" type="submit" id="login">Login</button>
</div>';   ?>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <table class="table table-dark text-white table-hover">
      <thead>
        <tr>
          <th scope="col">SYMBOL</th>
          <th scope="col">LAST PRICE</th>
          <th scope="col">DAILY CHANGE</th>
          <th scope="col">CHANGE PERCENT</th>
          <th scope="col">DAILY HIGH</th>
          <th scope="col">DAILY LOW</th>
        </tr>
      </thead>

      <tbody>
        <?php

        for ($i = 0; $i < 5; $i++) {

          $symbol = strtoupper($symbolName[$i]);

          echo " <tr>
                  <th id='symbolName'><a href='details.php?symbol=$symbolName[$i]'>" . $symbol . "</a></th>
                  <td id='lastPrice" . $symbol . "'></td>
                  <td id='dailyChange" . $symbol . "'></td>
                  <td id='dailyChangePercent" . $symbol . "'></td>
                  <td id='dailyHigh" . $symbol . "'></td>
                  <td id='dailyLow" . $symbol . "'></td>
                </tr>";
        }
        ?>
      </tbody>

    </table>
  </div>

  <!---------------------- JQuery ---------------------->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!--------------------- Bootstrap -------------------->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
  </script>

  <!----------------- JavaScript Files ----------------->
  <script src="assets/js/ticker.js"></script>
  <script src="assets/js/login.js"></script>

</body>

</html>