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
      <h1>Receipts</h1>
    </div>
    <div id="table_data" class="col-md-10">
            <table class="table">
              <thead>
                <tr>
                  <th>Receipt ID</th>
                  <th>Customer Name</th>
                  <th>Items</th>
                  <th>Date Ordered</th>
                  <th>Receipt Made</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = "SELECT * FROM receipt_data,customer,items_ordered WHERE receipt_data.cus_id=customer.cus_id AND items_ordered.items_ordered_id=receipt_data.items_ordered_id GROUP BY receipt_data.receipt_id ORDER BY receipt_data.receipt_date DESC";
                  $query = $conn->query($sql);
                  //var_dump ($query);
                  while ($row = $query->fetch_assoc()) {
                    $ord_id = $row['items_ordered_id'];
                    $sql_items = "SELECT * FROM items_ordered,items WHERE items_ordered.items_ordered_id='$ord_id' AND items_ordered.items_id=items.items_id";
                    $query_items = $conn->query($sql_items);
                    $arr = array();
                    //echo $sql_items;
                    $price = 0;
                    while($item_row = $query_items->fetch_assoc()){
                      array_push($arr, $item_row['item_name']);
                      $price += $item_row['amount'];
                    }
                    //var_dump($arr);
                    $res_id = $row['receipt_id'];
                    $cus_name = $row['cus_name'];
                    $cus_id = $row['cus_id'];

                    $ord_date = $row['order_date'];
                    $res_date = $row['receipt_date'];
                    
                    echo "
                        <tr>
                          <td><a href='view_receipt.php?id=$res_id'>$res_id</a></td>
                          <td>$cus_name</td>
                          <td>".join(', ', $arr)."</td>
                          <td>$ord_date</td>
                          <td>$res_date</td>
                          <td>PHP $price</td>
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