<?php
require_once("src/connection.php");
require_once("src/login.php");
require_once("src/symbol.php");

if (!login()) {
  echo "You do not have permission to visit this page";
  exit();
}

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

  <!------------ CSS Custom File ------------->
  <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

<?php include_once("_navbar.php") ?>

  <div class="container mt-5">
    <table class="table table-dark text-white table-hover caption-top">
      <caption class="text-white lead fw-bold">Details</caption>
      <thead>
        <tr>
          <th scope="col">SYMBOL</th>
          <th scope="col">LAST PRICE</th>
          <th scope="col">DAILY HIGH</th>
          <th scope="col">DAILY LOW</th>
        </tr>
      </thead>

      <tbody>
        <?php

      $symbolID = strtoupper($_GET['symbol']);

        echo "<tr>
                <th>$symbolID</th>
                <td>$symbolName->last_price</td>
                <td>$symbolName->high</td>
                <td>$symbolName->low</td>
              </tr>";
        ?>
      </tbody>

    </table>
    <?php
    $select = $connect->prepare("SELECT COUNT(*) FROM favorites WHERE favorites_symbol_name = '{$symbolID}'");
    $select->execute();
    $count = $select->fetchColumn();

    if ($count < 1)
      echo "<button type='button' class='btn btn-dark' id='add' value='" . $symbolID . "'>Add to favorites</button>";
    else
      echo "<button type='button' class='btn btn-light' id='remove' value='" . $symbolID . "'>Remove from favorites</button>";
    ?>

    <div class="mt-3 text-white fw-bold" id="message"></div>
  </div>



  <!---------------------- JQuery ---------------------->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!--------------------- Bootstrap -------------------->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
  </script>

  <!-- ------------ JavaScript Files ------------ -->
  <script src="assets/js/details.js"></script>

</body>

</html>