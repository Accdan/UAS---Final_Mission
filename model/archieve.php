<?php
require_once './db.php';

class Archieved {
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
  
    public function getAllNews(){
        $query = "SELECT * FROM news";
        $result = $this->db->query($query);

        $newd = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $newd[] = $row;
        }
    }
    return $newd;
    }

}
?>
