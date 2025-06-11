<?php
require_once '../CRUD/config.php';
require_once 'Player_Repository.php';
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Prístup zamietnutý. Len administrátor môže vstúpiť.");
}

$playerRepo = new PlayerRepository($conn);
$players = $playerRepo->getPlayersWithSocials();
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Admin – Players</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <Style>
        body{
    background-image: url("../images/lakers.jpg");
    background-repeat: no-repeat, repeat;
    background-size: cover; 
}
    </Style>
</head>
<body>
<div class="container mt-5">
    <h2>Player List</h2>
    <a href="player_form.php" class="btn btn-success mb-3">+ Add a new star player</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Socials</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($players as $player): ?>
            <tr>
                <td><img src="<?= htmlspecialchars($player['image']) ?>" alt="" width="80"></td>
                <td><?= htmlspecialchars($player['name']) ?></td>
                <td><?= htmlspecialchars($player['description']) ?></td>
                <td>
                    <?= implode(', ', array_map('ucfirst', $player['socials'])) ?>
                </td>
                <td>
                    <a href="edit_form.php?id=<?= $player['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="delete_player.php?id=<?= $player['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Naozaj chceš zmazať hráča?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="../index.php" class="btn btn-success mb-3">Back to main page</a>
</div>
</body>
</html>
