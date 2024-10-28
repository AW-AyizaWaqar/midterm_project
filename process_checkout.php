<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$postal_code = $_POST['postalCode'];
$country = $_POST['country'];
$payment_method = $_POST['paymentMethod'];
$total_amount = 100.00; // Static for this example, can be replaced with dynamic amount
$instructions = $_POST['instructions'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO orders (first_name, last_name, email, phone, address, city, postal_code, country, payment_method, total_amount, instructions) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssss", $first_name, $last_name, $email, $phone, $address, $city, $postal_code, $country, $payment_method, $total_amount, $instructions);

// Execute the statement
if ($stmt->execute()) {
    // Redirect to confirmation page if successful
    header("Location: confirmation.html");
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
