<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit_order'])) {
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $additional_info = $_POST['additional_info'];

    // Database details
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "coffee";

    // Creating a connection
    $con = new mysqli($host, $username, $password, $dbname);

    // To ensure that the connection is made
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Using prepared statements to create a data entry query
    $stmt = $con->prepare("INSERT INTO orders (item_name, quantity, additional_info) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $item_name, $quantity, $additional_info);

    // Execute the query and confirm if successful
    if ($stmt->execute()) {
        header("Location: orderthanks.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
}
?>
