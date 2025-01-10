<?php
require_once './db.php';

class Partners {
    private $db;

    public function __construct(){
        $this->connectDatabase();
    }

    public function connectDatabase() {
        $database = new Database(); // Membuat instance dari class Database
        $this->db = $database->connect(); // Mengambil koneksi dari class Database
    }

        public function getAllPartner(){
            $query = "SELECT * FROM partnerz";
            $result = $this->db->query($query);

            $partnerd = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $partnerd[] = $row;
            }
        }
        return $partnerd;
        }

        public function createPartner($pname, $pdesc, $ppict, $create_at){
            $query = "INSERT INTO partnerz (pname, pdesc, ppict, create_at) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ssss", $pname, $pdesc, $ppict, $create_at);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        }

        public function updatePartner( $pid, $pname, $pdesc, $ppict, $create_at){
            $query = "UPDATE partnerz SET pname = ?, pdesc = ?, ppict = ?, create_at = ? WHERE pid = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ssssi", $pname, $pdesc, $ppict, $create_at, $pid);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        }

        public function deletePartner($pid){
            foreach($this->getAllPartner() as $partnerd) {
                if ($partnerd['pid'] == $pid) {
                    $query = "DELETE FROM partnerz WHERE pid = ?";
                    $stmt = $this->db->prepare($query);
                    $stmt->bind_param("i", $pid);
                    $stmt->execute();
                    return true;
                }
            }
            return false;
        }

        public function getPartner(){
            return $this->db->query("SELECT * FROM partnerz");
        }

        public function getPartnerById($pid){
            foreach($this->getPartner() as $partnerd) {
                if ($partnerd['pid'] == $pid) {
                    return $partnerd;
                }
            }
            return null;
        }

        public function getPartnerByName($pname){
            foreach($this->getPartner() as $partnerd) {
                if ($partnerd['pname'] == $pname) {
                    return $partnerd;
                }
            }
            return null;
        }


}
?>