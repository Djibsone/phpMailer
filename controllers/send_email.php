<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Configuration de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Paramètres du serveur SMTP (Exemple pour Gmail)
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'votre_email@gmail.com'; // Remplacez par votre adresse e-mail
            $mail->Password   = 'votre_mot_de_passe'; // Remplacez par votre mot de passe
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Destinataire et expéditeur
            $mail->setFrom($email, $name);
            $mail->addAddress('votre_email@gmail.com', 'Djibs'); // Remplacez par votre adresse e-mail

            // Contenu de l'e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Nouveau message de contact';
            $mail->Body    = "Nom : $name<br>Email : $email<br>Message : $message";

            // Envoyer l'e-mail
            $mail->send();
            $_SESSION['success'] = 'Le message a été envoyé avec succès !';
        } catch (Exception $e) {
            $_SESSION['error'] = 'Une erreur est survenue lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo . '';
            header('location: ../');
        }

    } else {
        $_SESSION['error'] = 'Remplissez tous les champs !';
        header('location: ../');
    }

    //header('location: ../');
}
?>
