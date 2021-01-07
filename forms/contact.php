<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require_once "../vendor/autoload.php";
  
  //PHPMailer Object
  $mail = new PHPMailer();

  $mail->From =htmlspecialchars( $_POST['email']);
  $mail->FromName = htmlspecialchars($_POST['name']);
  
  //To address and name
  $mail->addAddress("hello@scaneroo.be", "Scaneroo");

  $mail->addReplyTo(htmlspecialchars($_POST['email']), "Reply");

  //Send HTML or Plain Text email
  $mail->isHTML(true);

  $mail->Subject = htmlspecialchars($_POST['subject']);
  $mail->Body = "<p>".htmlspecialchars($_POST['message'])."</p>";
  $mail->AltBody = htmlspecialchars($_POST['message']);

  try {
      $mail->send();
      echo "OK";
  } catch (Exception $e) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  }
?>
