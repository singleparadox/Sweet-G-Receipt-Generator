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
      <h1>Add Customer</h1>
      <div class="col-md-4 col-lg-offset-4" align="left">
        <form action='add_c.php' method='POST'>
            <label for='c_name'>Customer Name</label>
            <input required name="c_name" type='text' class="form-control" placeholder="Customer Name">
            <label for='c_desc'>Customer Description</label>
            <textarea name="c_desc" type='text' class="form-control" placeholder="Customer Description"></textarea>

            <br>
            <input name="submit" type='submit' class="btn btn-lg btn-success pull-right">
        </form>   
        </div>
    </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>