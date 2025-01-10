<?php
require_once './db.php';

class Eventd {
    private $db;

    public function __construct() {
        $this->connectDatabase();
    }

    // Koneksi ke database
    public function connectDatabase() {
        $database = new Database(); // Membuat instance dari class Database
        $this->db = $database->connect(); // Mengambil koneksi dari class Database
    }

    // Mengambil semua user
    public function getAllEvent() {
        $query = "SELECT * FROM eventz";
        $result = $this->db->query($query);

        $evend = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $evend[] = $row;
            }
        }
        return $evend;
    }

    // Menambah user
    public function createEvent($judul, $poster, $isi, $pid,  $create_at, $status) {
        $query = "INSERT INTO eventz (judul, poster, isi, pid, create_at, status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssisi", $judul, $poster, $isi, $pid, $create_at, $status);
        return $stmt->execute();
    }

  
    public function updateEvent($eid, $judul, $poster, $isi, $pid,  $create_at, $status) {
        // Ensure password is hashed
    
        $query = "UPDATE eventz SET judul = ?, poster = ?, isi = ?, pid = ?, create_at = ?, status = ? WHERE eid = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssissi", $judul, $poster, $isi, $pid, $create_at, $status, $eid);
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Menghapus user
    public function deleteEvent($eid) {
        $query = "DELETE FROM eventz WHERE eid = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $eid);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Mengambil user berdasarkan ID
    public function getEventById($eid) {
        $query = "SELECT * FROM eventz WHERE eid = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $eid);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Mengambil user berdasarkan nama
    public function getEventByJudul($judul) {
        $query = "SELECT * FROM eventz WHERE judul = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $judul);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Mengambil semua roles
   public function getAllPartner() {
       $query = "SELECT * FROM partnerz";
       $result = $this->db->query($query);

       $partnerd = [];
       if ($result->num_rows > 0) {
           while ($row = $result->fetch_assoc()) {
               $partnerd[] = $row;
           }
       }
       return $partnerd;
   }
   public function getPartner() {
    $query = "SELECT * FROM partnerz"; // Pastikan tabel dan kolom sesuai
    $result = $this->db->query($query);
    
    $partnerd = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $partnerd[] = $row;
        }
    }
    return $partnerd;
}

}



?>
