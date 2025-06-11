<?php
// Pred HTML definuj premenné, aby nebola chyba, keď $row nie je nastavené
$id = $row['id'] ?? '';
$name = $row['name'] ?? '';
$email = $row['email'] ?? '';
$message = $row['message'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Edit User</h1>
    <form method="post" action="update.php" class="mt-3">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>
        <div class="form-group mt-2">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" id="message" required><?php echo htmlspecialchars($message); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="update">Update</button>
        <a href="admin.php" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>
</body>
</html>
