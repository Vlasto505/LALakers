<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Form</title>
    <link rel="stylesheet" href="../css/player_style.css">
</head>
<body>
<div align=center>
<form method="post" action="create_player.php" enctype="multipart/form-data" class="container mt-5">
    <h2>Add a new star player</h2>
    <div class="mb-3">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" rows="4" cols="20" required></textarea>
    </div>

    <div class="mb-3">
        <label for="image">Player photo</label>
        <input type="file" name="image" class="form-control" accept="image/*" required>
    </div>

    <div class="mb-3">
        <label for="socials">Socials</label><br>
        <label><input type="checkbox" name="socials[]" value="twitter"> Twitter</label>
        <label><input type="checkbox" name="socials[]" value="linkedin"> LinkedIn</label>
        <label><input type="checkbox" name="socials[]" value="facebook"> Facebook</label>
    </div>

    <button type="submit" class="btn btn-success">Save player</button>
    <a href="admin_player.php" class="btn btn-secondary">Cancel</a>
</form>
</div>
</body>
</html>