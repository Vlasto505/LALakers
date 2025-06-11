<?php
require_once '../CRUD/config.php';
require_once 'Player_Repository.php';

$id = (int)($_GET['id'] ?? 0);
$repo = new PlayerRepository($conn);
$player = $repo->getPlayerById($id);

if ($player) {
    if (file_exists($player['image'])) unlink($player['image']);
    $repo->deletePlayer($id);
}

header("Location: admin_player.php");
exit;
