<?php
// Uncomment next line if you're not using a dependency loader (such as Composer)
//require_once './sendgrid/sendgrid-php.php';
require '../vendor/autoload.php';
use SendGrid\Mail\Mail;
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        header("location: ../faq.php?");
        exit();
      } else {
        // check if e-mail address is well-formed
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          header("location: ../faq.php?");
          exit();
        }
      }
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $email = new Mail();
    $email->setFrom("dan_maddie_wedding@googlegroups.com", $name);
    $email->setSubject($subject);
    $email->addTo("dan.e.corney+weddingfaq@gmail.com", "Dan Corney");
    $email->addTo("maddiesev+weddingfaq@gmail.com", "Maddie Severance");
    $email->addContent("text/plain", $message);
    $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
    try {
        $response = $sendgrid->send($email);
        header("location: ../faq.php?message=messagesent");
        exit();
    } catch (Exception $e) {
        echo 'Caught exception: '.  $e->getMessage(). "\n";
    }

}
else {
    header("location: ../faq.php");
    exit();
}

// <input type="text" name="name" placeholder="Full name">
// <input type="text" name="mail" placeholder="Your e-mail">
// <input type="text" name="subject" placeholder="Subject">
// <textarea name="message" placeholder="Message"></textarea>
// <button type="submit" name="submit">SEND MAIL</buttton>