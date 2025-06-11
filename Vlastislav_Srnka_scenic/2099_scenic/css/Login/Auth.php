<?php
class Auth {
    private $conn;

    public function __construct(mysqli $conn) {
        $this->conn = $conn;
        session_start();
    }

    public function login($username, $password): bool {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $res = $stmt->get_result();
        $user = $res->fetch_assoc();
        $stmt->close();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            return true;
        }
        return false;
    }

    public function logout() {
    session_unset();
    session_destroy();
    }


    public function isLoggedIn(): bool {
        return isset($_SESSION['user_id']);
    }

    public function isAdmin(): bool {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }

    public function isUser(): bool {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'user';
    }
}
?>
