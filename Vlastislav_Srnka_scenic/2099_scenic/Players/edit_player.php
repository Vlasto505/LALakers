<?php
require_once '../CRUD/config.php';
require_once 'Player_Repository.php';

$id = (int)($_POST['id'] ?? 0);
$name = $_POST['name'] ?? '';
$desc = $_POST['description'] ?? '';
$socials = $_POST['socials'] ?? [];
$imagePath = null;

$repo = new PlayerRepository($conn);
$current = $repo->getPlayerById($id);
if (!$current) {
    die("Hráč neexistuje.");
}

// ak novy obrazok, tak nahra ho
if (!empty($_FILES['image']['name'])) {
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) mkdir($uploadDir);

    $filename = time() . '_' . basename($_FILES['image']['name']);
    $targetPath = $uploadDir . $filename;
    $ext = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($ext, $allowed)) {
        die("Neplatný formát obrázka.");
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        if (file_exists($current['image'])) unlink($current['image']);
        $imagePath = $targetPath;
    }
}

// UPDATE hraca, ak sa neprida novy obrazok tak nahra uz ten pouzity
$repo->updatePlayer($id, $name, $desc, $imagePath ?? $current['image']);

// vymaze stare a da nove socials
$repo->updatePlayerSocials($id, $socials);

header("Location: admin_player.php");
exit;
