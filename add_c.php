<?php 
    include 'php/connection.php';

    if (isset($_POST['submit'])) {
        $id = "CUS-".uniqid();
        if (isset($_POST['c_name'])) {
            $name = $_POST['c_name'];
        } else {
            $name = '';
        }
    
        if (isset($_POST['c_desc'])) {
            $desc = $_POST['c_desc'];
        } else {
            $desc = '';
        }
    
        
        
        $sql = "INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_description`) VALUES ('$id', '$name', '$desc')";
        $conn->query($sql);
        header("Location: add_customer.php?success");
    }
    
?>