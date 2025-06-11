<?php

class UserRepository {
    private mysqli $conn;

    public function __construct(mysqli $conn) {
        $this->conn = $conn;
    }

    public function getAllUsers(): array {
        $result = $this->conn->query("SELECT * FROM contact");

        if (!$result) {
            return [];
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function deleteUser($id) {
        $stmt = $this->conn->prepare("DELETE FROM contact WHERE id = ?");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>