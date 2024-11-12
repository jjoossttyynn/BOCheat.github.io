<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Destinataire de l'email
    $to = "bocheatfr@gmail.com"; // Ton email

    // Sujet de l'email
    $email_subject = "Message de contact: " . $subject;

    // Contenu du message
    $email_body = "Vous avez reçu un nouveau message de la part de $name.\n\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message\n";

    // En-têtes de l'email
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    // Envoi de l'email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Confirmation de l'envoi
        echo "<p>Merci, votre message a été envoyé avec succès !</p>";
    } else {
        // Erreur d'envoi
        echo "<p>Oups, une erreur est survenue. Veuillez réessayer plus tard.</p>";
    }
}
?>
