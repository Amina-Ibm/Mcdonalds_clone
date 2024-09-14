<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $city = isset($_POST['city']) ? $_POST['city'] : null;
        $restaurant = isset($_POST['restaurant']) ? $_POST['restaurant'] : null;
        $category = isset($_POST['category']) ? $_POST['category'] : null;
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
        $comments = isset($_POST['comments']) ? $_POST['comments'] : null;

        $con = new mysqli('localhost', 'root', '','mcdonalds');
        if($con->connect_error){
            die('Connection Error:' .$con->connect_error);
        } else {
            $stmt = $con->prepare("insert into suggestions(city, restaurant, category, name, email, phone, comments) values(?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssis", $city, $restaurant, $category, $name, $email, $phone, $comments);
            $stmt->execute();
            echo "Data Inserted Successfully";
            $stmt->close();
            $con->close();
        }
    } else {
        echo "All fields are required.";
    }
 