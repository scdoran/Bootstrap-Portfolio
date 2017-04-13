<?php

    // require 'vendor/autoload.php';
    require("./sendgrid-php/sendgrid-php.php");


    if(isset($_POST['submit'])){
    $to = "dorans424@gmail.com";
    $from = $_POST['email'];
    $name = $_POST['name'];
    $subject = "Form submission";
    $subject2 = "Form submission";
    $message = $first_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = $first_name . " wrote the following:" . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2);
    echo "Mail Sent. Thank you " . $first_name . ", I will contact you shortly.";
    }

    // // Only process POST reqeusts.
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     // Get the form fields and remove whitespace.
    //     $name = strip_tags(trim($_POST["name"]));
				// $name = str_replace(array("\r","\n"),array(" "," "),$name);
    //     $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    //     $message = trim($_POST["message"]);

    //     // Check that data was sent to the mailer.
    //     if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //         // Set a 400 (bad request) response code and exit.
    //         http_response_code(400);
    //         echo "Oops! There was a problem with your submission. Please complete the form and try again.";
    //         exit;
    //     }

    //     // Set the recipient email address.
    //     // FIXME: Update this to your desired email address.
    //     $recipient = "dorans424@gmail.com";

    //     // Set the email subject.
    //     $subject = "New contact from $name";

    //     // Build the email content.
    //     $email_content = "Name: $name\n";
    //     $email_content = "Email: $email\n\n";
    //     $email_content = "Message:\n$message\n";

    //     // Build the email headers.
    //     $email_headers = "From: $name <$email>";

    //     // Send the email.
    //     if (mail($recipient, $subject, $email_content, $email_headers)) {
    //         // Set a 200 (okay) response code.
    //         http_response_code(200);
    //         echo "Thank You! Your message has been sent.";
    //     } else {
    //         // Set a 500 (internal server error) response code.
    //         http_response_code(500);
    //         echo "Oops! Something went wrong and we couldn't send your message.";
    //     }

    // } else {
    //     // Not a POST request, set a 403 (forbidden) response code.
    //     http_response_code(403);
    //     echo "There was a problem with your submission, please try again.";
    // }

?>