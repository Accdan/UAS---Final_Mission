<?php
class Database {
    private $db;

    public function connect() {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "ocaweb_db";
    
        $this->db = new mysqli($host, $user, $password, $database);
    
        if ($this->db->connect_error) {
            die("Koneksi database gagal: " . $this->db->connect_error);
        }

        return $this->db;
    }
}
?>