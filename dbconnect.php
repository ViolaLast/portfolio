<?php 
include "db.php"; 

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

// Establish the database connection
$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize error and success message variables
$errors = array();
$errorMessage = "";
$successMessage = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set and not empty
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Sanitize and validate form data
    $first_name = mysqli_real_escape_string($conn, $first_name);
    $last_name = mysqli_real_escape_string($conn, $last_name);
    $email = mysqli_real_escape_string($conn, $email);
    $subject = mysqli_real_escape_string($conn, $subject);
    $message = mysqli_real_escape_string($conn, $message);

    // Validate form fields
    if (empty($first_name)) {
        $errors[] = "First Name is required.";
    }
    if (empty($last_name)) {
        $errors[] = "Last Name is required.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }
    if (empty($message)) {
        $errors[] = "Message is required.";
    }

    // Display error messages if there are any
    if (!empty($errors)) {
        foreach ($errors as $error) {
            $errorMessage .= "<div class='error-message'>$error</div>";
        }
        echo "Error Message: " . $errorMessage; // Debugging: Check if error message is populated
    }

    // If there are no validation errors, proceed with database insertion
    if (empty($errors)) {
        // Insert form data into the database
        $sql = "INSERT INTO portfolioForm (first_name, last_name, email, subject, message) 
                VALUES ('$first_name', '$last_name', '$email', '$subject', '$message')";

        if ($conn->query($sql) === TRUE) {
            $successMessage = "<div class='success-message'>Your message has been sent!</div>";
            
            // Output JavaScript code to scroll to the contact form
            echo '<script>window.location = "#contact-form";</script>';
        } else {
            $errorMessage = "<div class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            
            // Output JavaScript code to scroll to the contact form
            echo '<script>window.location = "#contact-form";</script>';
        }
    }
}

// Close database connection
$conn->close();

