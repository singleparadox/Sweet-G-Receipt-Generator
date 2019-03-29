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
      <h1>Add Receipt</h1>
      <div class="col-md-4 col-lg-offset-4" align="left">
        <form action='add_r.php' method='POST'>
            <label required for='r_name'>Customer</label>
            <select name="r_cus" type='text' class="form-control" placeholder="Select Customer">
                <option value='0'>Select Customer</option>
                <?php
                    $sql_get_customers = "SELECT cus_id,cus_name FROM customer";
                    $query_get_customers = $conn->query($sql_get_customers);

                    while($cus = $query_get_customers->fetch_assoc()){
                        $id = $cus['cus_id'];
                        $name = $cus['cus_name'];
                        echo "<option value='$id'>$name</option>";
                    }
                ?>
            </select>

            <label required for='r_ord[]'>Select Orders</label>
            <select multiple name="r_ord[]" type='text' class="form-control">
                <?php
                    $sql_get_customers = "SELECT items_id,item_name FROM items";
                    $query_get_customers = $conn->query($sql_get_customers);

                    while($cus = $query_get_customers->fetch_assoc()){
                        $id = $cus['items_id'];
                        $name = $cus['item_name'];
                        echo "<option value='$id'>$name</option>";
                    }
                ?>
            </select>

            <label required for='r_date_ord'>Date Ordered</label>
            <input name="r_date_ord" type='date' class="form-control">



            <br>
            <input name="submit" type='submit' class="btn btn-lg btn-success pull-right">
        </form>   
        </div>
    </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>