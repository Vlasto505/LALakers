<?php
require_once 'config.php';
require_once 'User_Repository.php';

if (!isset($_GET['id'])) {
    header("Location: admin.php");
    exit;
}

$id = (int)$_GET['id'];

$userRepo = new UserRepository($conn);
if ($userRepo->deleteUser($id)) {
    $conn->close();
    header("Location: admin.php");
    exit;
} else {
    echo "Error deleting record.";
}
?>
