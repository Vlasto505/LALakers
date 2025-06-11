<?php
require_once '../CRUD/config.php';
require_once 'Player_Repository.php';

$id = $_GET['id'] ?? 0;
$repo = new PlayerRepository($conn);
$player = $repo->getPlayerById((int)$id);
if (!$player) {
    die("Hráč neexistuje.");
}

$stmt = $conn->prepare("SELECT platform FROM socials WHERE player_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$socials = [];
while ($row = $result->fetch_assoc()) {
    $socials[] = $row['platform'];
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit player</title>
    <link rel="stylesheet" href="../css/player_style.css" />
</head>
<body>
<div align="center">
    <form method="post" action="edit_player.php" enctype="multipart/form-data" class="container mt-5">
        <h2>Edit player</h2>
        <input type="hidden" name="id" value="<?= $player['id'] ?>">

        <div class="mb-3">
            <label for="name">Name</label>
            <input
                type="text"
                name="name"
                class="form-control"
                value="<?= htmlspecialchars($player['name']) ?>"
                required
            />
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <textarea
                name="description"
                class="form-control"
                rows="6"
                cols="20"
                required
            ><?= htmlspecialchars($player['description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label>Current photo:</label><br />
            <img src="<?= htmlspecialchars($player['image']) ?>" width="300" /><br /><br />
            <input type="file" name="image" class="form-control" />
            <small>Leave blank if you don't want to change.</small>
        </div>

        <div class="mb-3">
            <label>Socials:</label><br />
            <?php foreach (['twitter', 'linkedin', 'facebook'] as $net): ?>
                <label>
                    <input
                        type="checkbox"
                        name="socials[]"
                        value="<?= $net ?>"
                        <?= in_array($net, $socials) ? 'checked' : '' ?>
                    />
                    <?= ucfirst($net) ?>
                </label>
            <?php endforeach; ?>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="admin_player.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
