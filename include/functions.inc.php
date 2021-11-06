<?php
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';
  require 'PHPMailer/Exception.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

function envoiMail(){
  if( (isset($_POST['nom'])) && (isset($_POST['prenom'])) && (isset($_POST['email'])) && (isset($_POST['message']))){

  $sender = $_POST['email'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $message = $_POST['message'];


  $mail = new PHPMailer();

  $mail->isSMTP();
  $mail->Host="smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = "tls";
  $mail->Port = 587;
  $mail->Username = "holdmybeerdwa@gmail.com";
  $mail->Password = 'projetdwa2021';

  $mail->Subject = "$nom $prenom";
  $mail->Body = "$message";
  $mail->addAddress("holdmybeerdwa@gmail.com");
  $mail->addreplyto("$sender");
  if($mail->send()){
    echo "mail sent";
  }else {
    echo "non";
  }
  $mail->smtpClose;
  }
}
?>