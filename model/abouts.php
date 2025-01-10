<?php
require_once './db.php';

class About {
    private $db;

    public function __construct() {
        $this->connectDatabase();
    }

    // Koneksi ke database
    public function connectDatabase() {
        $database = new Database(); // Membuat instance dari class Database
        $this->db = $database->connect(); // Mengambil koneksi dari class Database
    }

    // Mengambil semua about
    public function getAllAbout() {
        $query = "SELECT * FROM aboutz";
        $result = $this->db->query($query);

        $aboutData = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $aboutData[] = $row;
            }
        }
        return $aboutData;
    }

    // Menambah about
    public function createAbout($image, $who_we_are, $visi_misi, $community_explain) {
        $query = "INSERT INTO aboutz (image, who_we_are, visi_misi, community_explain) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssss", $image, $who_we_are, $visi_misi, $community_explain);
        return $stmt->execute();
    }

    // Memperbarui about
    public function updateAbout($ab_id, $image, $who_we_are, $visi_misi, $community_explain) {
        $query = "UPDATE aboutz SET image = ?, who_we_are = ?, visi_misi = ?, community_explain = ? WHERE ab_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssssi", $image, $who_we_are, $visi_misi, $community_explain, $ab_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Menghapus about
    public function deleteAbout($ab_id) {
        $query = "DELETE FROM aboutz WHERE ab_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $ab_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Mengambil about berdasarkan ID
    public function getAboutById($ab_id) {
        $query = "SELECT * FROM aboutz WHERE ab_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $ab_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}

?>
