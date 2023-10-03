<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

if(isset($_POST['send'])){
    $nom = htmlentities($_POST['nom']);
    $email = htmlentities($_POST['email']);
    $num = htmlentities($_POST['num']);
    $message = htmlentities($_POST['message']);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'orpheetohou16@gmail.com'; // Adresse Gmail valide
    $mail->Password = 'afso axmz vzfc urrb'; // Mot de passe Gmail
    $mail->Port = 465; // Port pour SMTP sécurisé
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom($email, $nom);
    $mail->addAddress('orpheetohou16@gmail.com'); // Adresse de réception
    $mail->Subject = "$email - Vous demande sur Mr Top"; // Sujet de l'e-mail
    $mail->Body = $message; // Corps de l'e-mail

    $mail->send();

    $message = "Le message a été envoyé avec succès.";
    $redirectURL = "./index.php?message=" . urlencode($message) . "&timeout=12";
    header("Location: " . $redirectURL);

    
}
