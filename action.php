<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Perform any necessary validation on the data
    // For example, check if email is valid, sanitize inputs, etc.

    // Connect to the MySQL database
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "contact_form";

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the data into the database
    $insertQuery = "INSERT INTO submissions (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "Thank you! Your message has been saved in the database.";
    } else {
        echo "Oops! Something went wrong: " . $conn->error;
    }

    $conn->close();
}
?>