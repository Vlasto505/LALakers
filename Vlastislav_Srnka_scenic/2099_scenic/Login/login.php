<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit;
}
require_once '../CRUD/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        header("Location: ../index.php");
        exit;
    } else {
        $error = "Nesprávne meno alebo heslo.";
    }
}
?>

<!-- HTML časť -->
<link rel="stylesheet" href="../css/login.css">

<div class="login-box">
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" action="login.php">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
        <a href="register.php">Don't have an account? Register here</a>
    </form>
</div>
