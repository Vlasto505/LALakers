
<?php
require_once 'config.php';
require_once 'Contact_Form.php';

$formHandler = new ContactFormHandler($conn);
$row = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $row = $formHandler->getContactById($id);

    if (!$row) {
        header("Location: admin.php");
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = (int) $_POST['id'];
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if ($formHandler->updateContact($id, $name, $email, $message)) {
        $formHandler->closeConnection();
        header("Location: admin.php");
        exit;
    } else {
        echo "Error: Unable to update contact.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Edit Contact</h1>
    <form method="post" action="update.php" class="mt-3">
        <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($row['name']) ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($row['email']) ?>" required>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" required><?= htmlspecialchars($row['Message']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="update">Update</button>
        <a href="admin.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
