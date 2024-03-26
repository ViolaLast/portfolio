<?php
require 'vendor/autoload.php'; // Include PHPMailer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

 include '.gitignore';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

            // Initialize the success message variable
            $success_message = "";
            $errors = array();

    try {
    // Configure SMTP settings
    $mail->isSMTP();
    $mail->Host       = $_ENV['SMTP_HOST'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $_ENV['SMTP_USERNAME'];
    $mail->Password   = $_ENV['SMTP_PASSWORD'];
    $mail->SMTPSecure = $_ENV['SMTP_ENCRYPTION'];
    $mail->Port       = $_ENV['SMTP_PORT'];

} catch (Exception $e) {
    // Handle PHPMailer exception
    echo "Oops! Something went wrong while configuring SMTP settings: " . $e->getMessage();
    exit();
}
//===============================================================ENV CONNECTION END=======================================================//
    // Function to sanitize input data
    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form fields
    $errors = array();
    $first_name = validate_input($_POST["first_name"]);
    $last_name = validate_input($_POST["last_name"]);
    $email = validate_input($_POST["email"]);
    $subject = validate_input($_POST["subject"]);
    $message = validate_input($_POST["message"]);

    if (empty($first_name)) {
        $errors[] = "First Name is required.";
    }
    if (empty($last_name)) {
        $errors[] = "Last Name is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }
    if (empty($message)) {
        $errors[] = "Message is required.";
    }
      // If there are errors, clear success message
      if (!empty($errors)) {
        $success_message = ""; 
    }

//=============================================================FORM VALIDATION END=================================================//
    // If there are no errors, send email
    if (empty($errors)) {
        try {
            //Recipient
            $mail->setFrom('vikinterior@hotmail.co.uk', 'Violeta Last');
            $mail->addAddress('vikinterior@hotmail.co.uk'); // email address

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = "First Name: " . $first_name . "<br>" .
                          "Last Name: " . $last_name . "<br>" .
                          "Email: " . $email . "<br>" .
                          "Subject:" . $subject . "<br>" .
                          "Message: " . $message;

            $mail->send();
            // success message
            $success_message = "Form submitted successfully!";

//                  // Clear form data after successful submission
// unset($_POST["first_name"]);
// unset($_POST["last_name"]);
// unset($_POST["email"]);
// unset($_POST["subject"]);
// unset($_POST["message"]);

// Clear form data after successful submission
$_POST = [];

// Set a session variable to indicate successful submission
$_SESSION['success'] = true;

//         // After sending the email successfully
// echo '<script>window.location.href = "index.php";</script>';

} catch (Exception $e) {
    echo "Oops! Something went wrong while processing your request. Please try again later.";
    // Handle PHPMailer exception
}
} else {
// Display validation errors
foreach ($errors as $error) {
    echo $error . "<br>";
}
}
}