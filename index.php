<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homework 3 - Nazar Uakhitov</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
  </head>
  <body>
    <h1>Search for a cat photo</h1>
    <form action="index.php" method="POST">
      <div class="mb-3">
        <label for="category" class="form-label">Choose a category you are keen on: </label>
        <select name="category" aria-label="Default select example">
          <option name="category" value="1">Hats</option>
          <option name="category" value="2">Space</option>
          <option name="category" value="3">Funny</option>
          <option name="category" value="4">Sunglasses</option>
          <option name="category" value="5">Boxes</option>
          <option name="category" value="6">Caturday</option>
          <option name="category" value="7">Ties</option>
          <option name="category" value="9">Dream</option>
          <option name="category" value="10">Kittens</option>
          <option name="category" value="14">Sinks</option>
          <option name="category" value="15">Clothes</option>
        </select>
      </div>
      <div class="form-group">
        <label for="inputAmount">How many photos you want to see?</label>
        <input class="formControl" id="inputAmount" placeholder="Enter integer number" name="amount">
      </div>
      <button type="submit" class="btn btn-primary" name="find">Search</button>
    </form>
    <div class="mt-2">
      <?php
      if (isset($_POST['find'])) {
        $amount = $_POST['amount'];
        require 'get_cat_image_url.php';
        for ($i=0; $i < $amount; $i++) { 
          $url = get_url($_POST);
          ?>
          <img src="<?php echo $url ?>" height="300" alt="">
    </div>
    <?php
    }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>