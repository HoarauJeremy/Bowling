<?php
require 'vendor/autoload.php'; // Inclure l'autoloader de Composer

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
$contenu .= "<br>";

// Traitement pour l'envoi du mail de confirmation
if(isset($_POST['send_code'])) {
    // Vérification si une adresse e-mail est fournie
    if(!empty($_POST['email'])) {
        $to = $_POST['email'];
        $subject = "Code de confirmation";
        $confirmationCode = mt_rand(100000, 999999);
        $message = "Votre code de confirmation est : $confirmationCode";

        // Utilisation de PHPMailer pour envoyer l'e-mail
        $mail = new PHPMailer(true); // Paramètre true activera les exceptions
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp-bowlingdufrontdemer.alwaysdata.net'; // Remplacez par le serveur SMTP approprié
            $mail->SMTPAuth = true;
            $mail->Username = 'bowlingdufrontdemer@alwaysdata.net'; // Remplacez par votre adresse e-mail
            $mail->Password = 'Abc_1234'; // Remplacez par le mot de passe de votre adresse e-mail
            //$mail->SMTPSecure = 'tls'; // Vous pouvez utiliser 'tls' ou 'ssl' selon votre serveur SMTP
            $mail->Port = 587; // Port SMTP approprié

            $mail->setFrom('bowlingdufrontdemer@alwaysdata.net', 'Bowling Du Front de Mer'); // Remplacez par votre adresse e-mail et votre nom
            $mail->addAddress($to); // Adresse e-mail de destination

            $mail->isHTML(false); // Définir le format de l'e-mail sur texte brut

            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
        
            $contenu .= "<p style='color:green;'>Le code de confirmation a été envoyé à votre adresse e-mail.</p>";
        } catch (Exception $e) {
            $contenu .= "<p style='color:red;'>Erreur lors de l'envoi du code de confirmation. Veuillez réessayer.</p>";
            var_dump($mail);
            // En cas d'erreur, vous pouvez afficher les détails de l'erreur en utilisant $e->getMessage()
        }
    } else {
        // Affichage du message d'erreur si aucune adresse e-mail n'est fournie
        $contenu .= "<p style='color:red;'>Veuillez fournir une adresse e-mail.</p>";
    }
}

$contenu .= "<input class='font-Roboto font-extrabold text-2xl bg-red-800 text-white my-3.5 px-10 h-16 w-auto border-none cursor-pointer rounded-full hover:bg-red-900 hover:border-solid hover:border-spacing-0.5' type='submit' id='submit' value='Confirmer'>";
$contenu .= "</form>";
$contenu .= "</div>";

include "template.php";
?>