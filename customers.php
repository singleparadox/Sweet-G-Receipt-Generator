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
      <h1>Customers</h1>
    </div>
    <div id="table_data" class="col-md-10">
            <table class="table">
              <thead>
                <tr>
                  <th>Customer ID</th>
                  <th>Customer Name</th>
                  <th>Customer Description</th>
                  <th>Total Items Purchased</th>
                  <th>Total Transactions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = "SELECT * FROM customer LIMIT 10";
                  $query = $conn->query($sql);
                  //var_dump ($query);
                  while ($row = $query->fetch_assoc()) {
                    $customer_id = $row['cus_id'];
                    $sql_purchased = "SELECT items_ordered_id FROM receipt_data WHERE cus_id='$customer_id'";
                    $query_purch = $conn->query($sql_purchased);
                    $tot = 0;
                    while($purch = $query_purch->fetch_assoc()) {
                        $ord_id = $purch['items_ordered_id'];
                        $sql_get_orders = "SELECT items_id FROM items_ordered WHERE items_ordered_id='$ord_id'";
                        $query_get_orders = $conn->query($sql_get_orders);
                        while($get_prices = $query_get_orders->fetch_assoc()) {
                            $item_id = $get_prices['items_id'];
                            $sql_gp = "SELECT amount FROM items WHERE items_id='$item_id'";
                            $query_gp = $conn->query($sql_gp);
                            while($p = $query_gp->fetch_assoc()) {
                                $tot += $p['amount'];
                            }
                        }
                    }

                    $sql_bought = "SELECT COUNT(*) as amt FROM receipt_data WHERE cus_id='$customer_id'";
                    $query_bought = $conn->query($sql_bought);
                    $fetch_bought = $query_bought->fetch_assoc();
                    $amt = $fetch_bought['amt'];

                    $customer_name = $row['cus_name'];
                    $customer_desc = $row['cus_description'];

                    echo "
                        <tr>
                          <td><a href='edit_customers.php?id=$customer_id'>$customer_id</a></td>
                          <td>$customer_name</td>
                          <td>$customer_desc</td>
                          <td>PHP $tot</td>
                          <td>$amt</td>
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