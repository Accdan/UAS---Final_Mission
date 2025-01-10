<?php
require_once './db.php';

class Userd {
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
    public function getAllUser() {
        $query = "SELECT * FROM user";
        $result = $this->db->query($query);

        $userz = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $userz[] = $row;
            }
        }
        return $userz;
    }

    // Menambah user
    public function createUser($uname, $password, $create_at, $id) {
        $query = "INSERT INTO user (uname, password, create_at, id) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssi", $uname, $password, $create_at, $id);
        return $stmt->execute();
    }

    public function updateUser($uid, $uname, $password, $create_at, $id) {
        // Ensure password is hashed
        
    
        $query = "UPDATE user SET uname = ?, password = ?, create_at = ?, id = ? WHERE uid = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssssi", $uname, $password, $create_at, $id, $uid);
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Menghapus user
    public function deleteUser($uid) {
        $query = "DELETE FROM user WHERE uid = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $uid);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Mengambil user berdasarkan ID
    public function getUserById($uid) {
        $query = "SELECT * FROM user WHERE uid = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $uid);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Mengambil user berdasarkan nama
    public function getUserByName($uname) {
        $query = "SELECT * FROM user WHERE uname = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();  
    }

    
    // Mengambil semua roles
   public function getAllRoles() {
       $query = "SELECT * FROM rolez";
       $result = $this->db->query($query);

       $roles = [];
       if ($result->num_rows > 0) {
           while ($row = $result->fetch_assoc()) {
               $roles[] = $row;
           }
       }
       return $roles;
   }
   public function getRoles() {
    $query = "SELECT id, name FROM rolez"; // Pastikan tabel dan kolom sesuai
    $result = $this->db->query($query);
    
    $roles = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $roles[] = $row;
        }
    }
    return $roles;
}

}



?>
