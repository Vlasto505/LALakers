<?php

require_once '../CRUD/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? 'user'; // predvolená hodnota

    if (!empty($username) && !empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashedPassword, $role);
        if ($stmt->execute()) {
            echo "Používateľ úspešne zaregistrovaný.";
            header("Location: ../index.php");
            exit; 
        } else {
            echo "Chyba pri registrácii.";
        }
    } else {
        echo "Vyplň všetky polia.";
    }
}
?>
<link rel="stylesheet" href="../css/login.css">

<div class="register-box">
    <h2>Register</h2>
    <form method="post" action="register.php">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <select name="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select><br>
        <button type="submit">Create an account</button>
        <a href="login.php">Already have an account? Login here</a>
    </form>
</div>
