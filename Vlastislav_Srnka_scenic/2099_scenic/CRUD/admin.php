<?php
require_once 'config.php';
require_once 'User_Repository.php';
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Prístup zamietnutý. Len administrátor môže vstúpiť.");
}

$userRepo = new UserRepository($conn);
$users = $userRepo->getAllUsers();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styleAdmin.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">User List</h1>
        <a href="create.php" class="btn btn-success mt-3 mb-3">Add New User</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($users) > 0): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['name']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td><?= htmlspecialchars($user['Message']) ?></td>
                            <td>
                                <a href="update.php?id=<?= $user['id'] ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5">No users found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <a href="../index.php" class="btn btn-success mt-3 mb-3">Back to main page</a>
    </div>
</body>
</html>
