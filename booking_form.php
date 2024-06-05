<?php
$connection = mysqli_connect("localhost", "root", "", "booking_db");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrival = $_POST['arrival'];
    $leaving = $_POST['leaving'];

    $request = "INSERT INTO booking_form (name, email, phone, address, location, guests, arrival, leaving) 
                VALUES ('$name', '$email', '$phone', '$address', '$location', '$guests', '$arrival', '$leaving')";

    if (mysqli_query($connection, $request)) {
        echo "Booking details submitted successfully. Here are the details you entered:<br>";
        echo "Name: " . htmlspecialchars($name) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Phone: " . htmlspecialchars($phone) . "<br>";
        echo "Address: " . htmlspecialchars($address) . "<br>";
        echo "Location: " . htmlspecialchars($location) . "<br>";
        echo "Guests: " . htmlspecialchars($guests) . "<br>";
        echo "Arrival Date: " . htmlspecialchars($arrival) . "<br>";
        echo "Leaving Date: " . htmlspecialchars($leaving) . "<br>";
    } else {
        echo "Error: " . $request . "<br>" . mysqli_error($connection);
    }
} else {
    echo "No data submitted.";
}

mysqli_close($connection);
?>
