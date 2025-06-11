<?php
require_once '../CRUD/config.php';
require_once 'Player_Repository.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $desc = $_POST['description'] ?? '';
    $socials = $_POST['socials'] ?? []; // <-- už nie json_encode

    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) mkdir($uploadDir);
    $imageName = basename($_FILES['image']['name']);
    $targetPath = $uploadDir . time() . '_' . $imageName;
    $fileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($fileType, $allowed)) {
        die("Nepodporovaný typ súboru.");
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        $playerRepo = new PlayerRepository($conn);
        $playerRepo->addPlayer($name, $desc, $targetPath, $socials);
        header("Location: admin_player.php");
        exit;
    } else {
        echo "Chyba pri nahrávaní obrázku.";
    }
}
?>
