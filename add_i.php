<?php 
    include 'php/connection.php';

    if (isset($_POST['submit'])) {
        $id = "ITEM-".uniqid();
        if (isset($_POST['i_name'])) {
            $name = $_POST['i_name'];
        } else {
            $name = '';
        }
    
        if (isset($_POST['i_desc'])) {
            $desc = $_POST['i_desc'];
        } else {
            $desc = '';
        }
    
        if (isset($_POST['i_price'])) {
            $price = $_POST['i_price'];
        } else {
            $price = '';
        }
        
        
        $sql = "INSERT INTO `items` (`items_id`, `item_name`, `item_description`, `amount`) VALUES ('$id', '$name', '$desc', '$price')";
        $conn->query($sql);
        header("Location: add_item.php?success");
    }
    
?>