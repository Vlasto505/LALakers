<?php
require_once '../config.php';
require_once 'Auth.php';
$auth = new Auth($conn);
if (!$auth->isLoggedIn()) {
    header("Location: login.php");
    exit;
}
?>