<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $customer_name = isset($_POST['customer_name']) ? $_POST['customer_name'] : null;
        $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : null;
        $order_number = isset($_POST['order_number']) ? $_POST['order_number'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $restaurant = isset($_POST['restaurant']) ? $_POST['restaurant'] : null;
        $city = isset($_POST['city']) ? $_POST['city'] : null;
        $comments = isset($_POST['comments']) ? $_POST['comments'] : null;
        $complaint_type = isset($_POST['complaint_type']) ? $_POST['complaint_type'] : null;
        $complaint_type = isset($_POST['category']) ? $_POST['category'] : null;
        $con = new mysqli('localhost', 'root', '','mcdonalds');
        if($con->connect_error){
            die('Connection Error:' .$con->connect_error);
        } else {
            $stmt = $con->prepare("insert into complaints(customer_name, phone_number, order_number, email, city, restaurant, complaint_type, comments) values(?,?,?,?,?,?,?,?)");
            $stmt->bind_param("siisssss", $customer_name, $phone_number, $order_number, $email, $city, $restaurant, $complaint_type, $comments);
            $stmt->execute();
            echo "Data Inserted Successfully";
            $stmt->close();
            $con->close();
        }
    } else {
        echo "All fields are required.";
    }
 