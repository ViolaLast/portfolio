<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php'; // Include PHPMailer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/violetalast/public_html/PHPMailer-master/src/Exception.php';
require '/home/violetalast/public_html/PHPMailer-master/src/PHPMailer.php';
require '/home/violetalast/public_html/PHPMailer-master/src/SMTP.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

// Initialize the success message variable
$success_message = "";
$errors = array();

try {
    // Configure SMTP settings
    $mail->isSMTP();
    $mail->Host       = 'live.smtp.mailtrap.io';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'api';;
    $mail->Password   = 'b83dba9af4c87b78a5a663a515d86ff6';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;   

} catch (Exception $e) {
    // Handle PHPMailer exception
    echo "Oops! Something went wrong while configuring SMTP settings: " . $e->getMessage();
    exit();
}

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

    // If there are no errors, send email
    if (empty($errors)) {
        try {
            //Recipient
            $mail->setFrom('mailtrap@demomailtrap.com');
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
            $success_message = "Email submitted successfully!";
        } catch (Exception $e) {
            echo "Oops! Something went wrong while sending an email:" . $e->getMessage();
            // Handle PHPMailer exception
        }
    }
}

