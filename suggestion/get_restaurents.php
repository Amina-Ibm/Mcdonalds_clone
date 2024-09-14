<?php
// Connect to the database
$con = mysqli_connect('localhost', 'root', '', 'mcdonalds');
if ($con->connect_error) {
    die('Connection Error:' . $con->connect_error);
}

// Get the selected city
$city = $_POST['city'];

// Fetch restaurants from the database
$result = $con->query("SELECT restaurant FROM restaurant_locations WHERE city = '$city'");

// Initialize an array to hold the restaurants
$restaurants = [];

// Loop through the results and add the restaurants to the array
while ($row = $result->fetch_assoc()) {
    $restaurants[] = $row['restaurant'];
}

// Close the database connection
$con->close();

// Output the options for the restaurant dropdown
foreach ($restaurants as $restaurant) {
    echo "<option value='$restaurant'>$restaurant</option>";
}
?>
