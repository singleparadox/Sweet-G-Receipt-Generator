<?php 
      include_once "head.php"; 
      include 'php/connection.php';
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Receipt Generator</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="col-md-12" align="center">
        <?php
            if (isset($_GET['success'])) {
                echo '
                <div class="alert alert-success" role="alert">
                <strong>Success!</strong>
              </div>                
                ';
            }
        ?>
      <h1>Add Item</h1>
      <div class="col-md-4 col-lg-offset-4" align="left">
        <form action='add_i.php' method='POST'>
            <label required for='i_name'>Item Name</label>
            <input name="i_name" type='text' class="form-control" placeholder="Item Name">
            <label for='i_desc'>Item Description</label>
            <textarea name="i_desc" type='text' class="form-control" placeholder="Item Description"></textarea>
            <label required for='i_price'>Item Price</label>
            <input name="i_price" type='number' class="form-control" placeholder="Item Price">
            <br>
            <input name="submit" type='submit' class="btn btn-lg btn-success pull-right">
        </form>   
        </div>
    </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>