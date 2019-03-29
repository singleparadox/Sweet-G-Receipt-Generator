<?php 
    include 'php/connection.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
    @page { size: auto;  margin: 0mm; }
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">

                <?php
                    $id = $_GET['id'];
                    $sql_ordered = "SELECT order_date as a, receipt_date as b, items_ordered_id as c FROM receipt_data WHERE receipt_id='$id'";
                    $query = $conn->query($sql_ordered);
                    $fetch_sql = $query->fetch_assoc();
                    $date_ordered = $fetch_sql['a'];
                    $res_date = $fetch_sql['b'];

                    $order_id = $fetch_sql['c'];
                ?>
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <h4 src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;">Sweet G's</h3>
                            </td>
                            
                            <td>
                                Receipt #: <?php echo $_GET['id'];?><br>
                                Date Ordered: <?php echo $date_ordered;?><br>
                                Receipt Generated: <?php echo $res_date;?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <!--<tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Sparksuite, Inc.<br>
                                12345 Sunny Road<br>
                                Sunnyville, CA 12345
                            </td>
                            
                            <td>
                                Acme Corp.<br>
                                John Doe<br>
                                john@example.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>-->
            
            <!--<tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    Check #
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Check
                </td>
                
                <td>
                    1000
                </td>
            </tr>-->
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            <?php
                $sql_orders = "SELECT * FROM items_ordered WHERE items_ordered_id='$order_id'";
                $query_orders = $conn->query($sql_orders);
                $total = 0;
                while($row = $query_orders->fetch_assoc()){
                    $item_id = $row['items_id'];
                    $sql_get_items = "SELECT item_name, amount FROM items WHERE items_id='$item_id'";
                    $exe = $conn->query($sql_get_items);
                    while ($rows = $exe->fetch_assoc()) {
                        $name = $rows['item_name'];
                        $price = number_format((float)$rows['amount'], 2, '.', '');
                        $total+=$price;
                        echo "
                        <tr class='item'>
                        <td>
                            $name
                        </td>
                        
                        <td>
                            PHP $price
                        </td>
                        </tr>
                        ";
                    } 
                }

            ?>

            
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total: PHP <?php echo number_format((float)$total, 2, '.', '');;?>
                </td>
            </tr>
        </table>
    </div>
    <script>window.print();</script>
</body>
</html>