<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

    // getting all values from the HTML form
    if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $topic = $_POST['topic'];
    }

    // database details
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "coffee";

    // creating a connection
    $con = mysqli_connect($host, $username, $password, $dbname);

    // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }

    // using sql to create a data entry query
    $sql = "INSERT INTO info (full_name, email, phone_number, topic) VALUES ('$full_name', '$email', '$phone_number','$topic' )";
  
    // send query to the database to add values and confirm if successful
    $rs = mysqli_query($con, $sql);
    if($rs)
    {
        header("Location: thankyou.html");
        exit();
        //echo "Feedback Received, We will contact you shortly!";
    }
    
  
    // close connection
    mysqli_close($con);

?>