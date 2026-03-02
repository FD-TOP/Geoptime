<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars(strip_tags(trim($_POST['nom'])));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    if (empty($nom) || empty($email) || empty($message)) {
        header("Location: index.html?status=error#contact");
        exit;
    }

    $to = "aurelienfaz@gmail.com"; // Email officiel du site
    $subject = "Nouveau message Prospect Geoptime : $nom";
    $headers = "From: $email\r\nReply-To: $email";

    if (mail($to, $subject, $message, $headers)) {
        header("Location: index.html?status=success#contact");
    } else {
        header("Location: index.html?status=error#contact");
    }
}
?>