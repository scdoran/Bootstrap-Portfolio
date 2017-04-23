<?php

    require("./sendgrid-php/sendgrid-php.php");

    // this should be created if using Composer - should be autogenerated if you create a composer.json and require sendgrid
    // require '../vendor/autoload.php';

    // Check for empty fields
    // if(empty($_POST['name'])      ||
    //    empty($_POST['email'])     ||
    //    empty($_POST['message'])   ||
    //    !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    //    {
    //    echo "No arguments Provided!";
    //    return false;
    //    }

    $name = strip_tags(htmlspecialchars($_POST['name']));
    $email_address = strip_tags(htmlspecialchars($_POST['email']));
    $message = strip_tags(htmlspecialchars($_POST['message']));

    // // SendGrid
    $from = new SendGrid\Email("$name", "$email_address");
    $subject = "New Message";
    $to = new SendGrid\Email("Sarah Doran", "dorans424@gmail.com");
    $content = new SendGrid\Content("text/plain", "$message");
    $mail = new SendGrid\Mail($from, $subject, $to, $content);
    $apiKey = getenv('SENDGRID_API_KEY');
    $sg = new \SendGrid($apiKey);
    $response = $sg->client->mail()->send()->post($mail);
    echo $response->statusCode();
    echo $response->headers();
    echo $response->body();
?>