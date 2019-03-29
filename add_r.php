<?php 
    include 'php/connection.php';


    
    if (isset($_POST['submit'])) {
        $id = "RES-".uniqid();
        $id_ord = "ORD-".uniqid();

        if (isset($_POST['r_cus'])) {
            $cus_id = $_POST['r_cus'];
        } else {
            $cus_id = '';
        }
    
        if (isset($_POST['r_ord'])) {
            $orders = $_POST['r_ord'];
            foreach ($_POST['r_ord'] as $x) {
                $sql_orders = "INSERT INTO `items_ordered` (`items_ordered_id`, `items_id`) VALUES ('$id_ord', '$x')";
                $conn->query($sql_orders);
            }
        } else {
            $orders = '';
        }

        if (isset($_POST['r_date_ord'])) {
            $ord_date = $_POST['r_date_ord'];
        } else {
            $ord_date = '';
        }
    
        date_default_timezone_set('Asia/Manila');
        $date_true = date('Y-m-d');
        
        
        $sql = "INSERT INTO `receipt_data` (`receipt_id`, `cus_id`, `order_date`, `receipt_date`, `items_ordered_id`) VALUES ('$id', '$cus_id', '$ord_date', '$date_true', '$id_ord')";
        $conn->query($sql);
 
        header("Location: add_receipt.php?success");
    }
    
?>