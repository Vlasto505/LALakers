<?php
class PlayerRepository {
    private mysqli $conn;

    public function __construct(mysqli $conn) {
        $this->conn = $conn;
    }

    public function addPlayer($name, $description, $imagePath, $socialsArray) {
    $stmt = $this->conn->prepare("INSERT INTO players (name, description, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $description, $imagePath);
    $stmt->execute();
    $playerId = $stmt->insert_id;
    $stmt->close();

    if (!empty($socialsArray)) {
        $stmt = $this->conn->prepare("INSERT INTO socials (player_id, platform) VALUES (?, ?)");
        foreach ($socialsArray as $platform) {
            $stmt->bind_param("is", $playerId, $platform);
            $stmt->execute();
        }
        $stmt->close();
    }
}

    public function getAllPlayers(): array {
        $result = $this->conn->query("SELECT * FROM players ORDER BY id DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPlayerById(int $id): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM players WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $data = $res->fetch_assoc();
        $stmt->close();
        return $data ?: null;
    }

    

    public function deletePlayer(int $id): bool {
        $stmt = $this->conn->prepare("DELETE FROM players WHERE id = ?");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    public function getPlayersWithSocials() {
    $players = [];
    $sql = "SELECT p.id, p.name, p.description, p.image, s.platform
            FROM players p
            LEFT JOIN socials s ON p.id = s.player_id
            ORDER BY p.id DESC";

    $result = $this->conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        if (!isset($players[$id])) {
            $players[$id] = [
                'id' => $id,
                'name' => $row['name'],
                'description' => $row['description'],
                'image' => $row['image'],
                'socials' => [],
            ];
        }
        if ($row['platform']) {
            $players[$id]['socials'][] = $row['platform'];
        }
    }

    return array_values($players); // reset keys
    }
    public function updatePlayer($id, $name, $description, $image) {
    $stmt = $this->conn->prepare("UPDATE players SET name=?, description=?, image=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $description, $image, $id);
    $stmt->execute();
    }

    public function updatePlayerSocials($playerId, $socials) {
    // Vymaž existujúce
    $stmt = $this->conn->prepare("DELETE FROM socials WHERE player_id = ?");
    $stmt->bind_param("i", $playerId);
    $stmt->execute();

    // Vlož nové
    if (!empty($socials)) {
        $stmt = $this->conn->prepare("INSERT INTO socials (player_id, platform) VALUES (?, ?)");
        foreach ($socials as $platform) {
            $stmt->bind_param("is", $playerId, $platform);
            $stmt->execute();
        }
    }
    }


}

