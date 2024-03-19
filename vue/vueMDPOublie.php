<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$titre = "Mot de passe oublié - Bowling du Front de Mer";
$contenu = "<div class='w-5/6 md:w-3/5 mx-auto text-center'>";
    $contenu .= "<form class='p-p7_5 border border-solid border-slate-50 bg-gray-200 shadow-xl h-auto flex flex-col items-center rounded-md mb-10' method='POST'>";
    $contenu .= "<img src='media/images/LogoConnexion.png' alt='Your Logo' width='120' height='120'>";
    $contenu .= "<br>";
    $contenu .= "<p><strong>Entrez votre adresse mail liée au compte existant.</strong></p>";
    $contenu .= "<input class='font-NotoSans text-xl h-20 w-1/2 px-3 py-4 pr-5 mt-5 mr-0 inline-block border-spacing-0.5 border-solid bg-gray-100 box-border' type='email' placeholder='Mon adresse' name='email'>";
    $contenu .= "<br>";
    $contenu .= "<div class='flex items-center justify-center w-1/2'>";
    $contenu .= "<input class='font-NotoSans text-xl h-20 w-full px-3 py-4 pr-5 mr-0 inline-block border-spacing-2 border-solid bg-gray-100 box-border' type='text' placeholder='Code de confirmation' name='code'>";
    $contenu .= "<button name='send_code' class='font-Roboto font-extrabold bg-red-800 text-white my-3.5 px-10 h-16 w-auto border-none cursor-pointer rounded-full hover:bg-red-900 hover:border-solid hover:border-spacing-0.5 ml-2'>Envoyer un code</button>";
$contenu .= "</div>";
include "template.php";

// Traitement pour l'envoi du mail de confirmation
if(isset($_POST['send_code'])) {
    if(!empty($_POST['email'])) {
        $to = $_POST['email'];
        $subject = "Code de confirmation";
        $confirmationCode = mt_rand(000001, 999999);
        $message = "Votre code de confirmation est : $confirmationCode";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp-bowlingdufrontdemer.alwaysdata.net';
            $mail->SMTPAuth = true;
            $mail->Username = 'bowlingdufrontdemer@alwaysdata.net';
            $mail->Password = 'Abc_1234';
            $mail->Port = 587;
            $mail->setFrom('bowlingdufrontdemer@alwaysdata.net', 'Bowling Du Front de Mer');
            $mail->addAddress($to);
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->send();
            $contenu .= "<p style='color:green;'>Le code de confirmation a été envoyé à votre adresse e-mail.</p>";
        } catch (Exception $e) {
            $contenu .= "<p style='color:red;'>Erreur lors de l'envoi du code de confirmation. Veuillez réessayer.</p>";
        }
    } else {
        $ErreurAdresse = "Veuillez fournir une adresse e-mail.";
    }
}
?>