<?php
require_once './sendgrid/sendgrid-php.php';

// $email = new \SendGrid\Mail\Mail();
if (isset($_POST['submit'])) {
$email = new \SendGrid\Mail\Mail();
$email->setFrom("dan.e.corney@gmail.com", "Test");
$email->setSubject("Sending with Twilio SendGrid is Fun");
$email->addTo("dan.e.corney@gmail.com", "Test");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid('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');
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
    header("Location: faq.php?test");
}

}


// if (isset($_POST['submit'])) {
//   $email = new SendGrid\Mail\Mail();
//   $name = $_POST['name'];
//   $subject = $_POST['subject'];
//   $mailFrom = $_POST['mail'];
//   $message = $_POST['message'];
//   $txt = "You have a received an e-mail from " . $name . ".\n\n" . $message;
//   $email->setFrom("dan.e.corney@gmail.com");
//   $email->setSubject($subject);
//   $email->addTo("dan.e.corney@gmail.com", "Dan Corney");
//   $email->addContent($txt);
//   $sendgrid = new \SendGrid("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");
//   try {
//     $response = $sendgrid->send($email);
//     print $response->statusCode() . "\n";
//     print_r($response->headers());
//     print $response->body() . "\n";
//     header("Location: faq.php?test");
//   } catch (Exception $e) {
//     echo 'Caught Exception: ' .$e->getMessage() . "\n";
//   }
//
// }
