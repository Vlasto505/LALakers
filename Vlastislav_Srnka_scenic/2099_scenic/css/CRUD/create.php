<?php
require_once 'config.php';
require_once 'Contact_Form.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    $formHandler = new ContactFormHandler($conn);
    $success = $formHandler->submitForm($name, $email, $message);
    $formHandler->closeConnection();

    if ($success) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Error: Unable to create user.";
    }
} else {
    header("Location: Create_form.php");
    exit;
}
