<?php

class ContactFormHandler {
    private mysqli $conn;

    public function __construct(mysqli $conn) {
        $this->conn = $conn;
    }

    public function getContactById(int $id): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM contact WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = $result->num_rows === 1 ? $result->fetch_assoc() : null;

        $stmt->close();
        return $data;
    }

    public function updateContact(int $id, string $name, string $email, string $message): bool {
        $stmt = $this->conn->prepare("UPDATE contact SET name = ?, email = ?, message = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $email, $message, $id);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }

    public function closeConnection(): void {
        $this->conn->close();
    }
    public function submitForm(string $name, string $email, string $message): bool {
        $stmt = $this->conn->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
}
