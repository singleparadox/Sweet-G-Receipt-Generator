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
      <h1>Items</h1>
    </div>
    <div id="table_data" class="col-md-10">
            <table class="table">
              <thead>
                <tr>
                  <th>Item ID</th>
                  <th>Item Name</th>
                  <th>Item Description</th>
                  <th>Item Price</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = "SELECT * FROM items LIMIT 10";
                  $query = $conn->query($sql);
                  //var_dump ($query);
                  while ($row = $query->fetch_assoc()) {
                    $item_id = $row['items_id'];
                    $item_name = $row['item_name'];
                    $item_desc = $row['item_description'];
                    $item_price = $row['amount'];
                    echo "
                        <tr>
                          <td><a href='edit_items.php?id=$item_id'>$item_id</a></td>
                          <td>$item_name</td>
                          <td>$item_desc</td>
                          <td>PHP $item_price</td>
                        </tr>
                    ";

                  }
                ?>

              </tbody>
            </table>
      </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>