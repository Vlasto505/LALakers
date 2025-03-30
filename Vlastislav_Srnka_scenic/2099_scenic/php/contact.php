<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Získanie a validácia vstupov
    $name = trim($_POST['name']);
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if (!$email || empty($name) || empty($subject) || empty($message)) {
        die("Invalid input. Please fill out all fields correctly.");
    }

    // Prevencia proti header injection
    $bad_headers = "/[\r\n]/";
    if (preg_match($bad_headers, $name) || preg_match($bad_headers, $email) || preg_match($bad_headers, $subject)) {
        die("Invalid headers detected.");
    }

    // Nastavenie hlavičiek e-mailu
    $to = "khaitawng2014@gmail.com"; // Zmeň na svoj e-mail
    $headers = "From: " . htmlspecialchars($name) . " <" . htmlspecialchars($email) . ">\r\n";
    $headers .= "Reply-To: " . htmlspecialchars($email) . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // Odoslanie e-mailu
    if (mail($to, htmlspecialchars($subject), htmlspecialchars($message), $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
} else {
    die("Invalid request method.");
}
?>
