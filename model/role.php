<?php
require_once './db.php';

class roled{
    private $db;

    public function __construct(){
        $this->connectDatabase();
    }

    public function connectDatabase() {
        $database = new Database(); // Membuat instance dari class Database
        $this->db = $database->connect(); // Mengambil koneksi dari class Database
    }

        public function getAllRole(){
            $query = "SELECT * FROM rolez";
            $result = $this->db->query($query);

            $role = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $role[] = $row;
            }
        }
        return $role;
        }

        public function createRole($name , $description , $status){
            $query = "INSERT INTO rolez (name , description , status) VALUES (?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ssi", $name,$description, $status);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        }

        public function updateRole( $id, $name, $description, $status){
            $query = "UPDATE rolez SET name = ?, description = ?, status = ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("sssi", $name,$description, $status, $id);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        }

        public function deleteRole($id){
            foreach($this->getAllRole() as $role) {
                if ($role['id'] == $id) {
                    $query = "DELETE FROM rolez WHERE id = ?";
                    $stmt = $this->db->prepare($query);
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    return true;
                }
            }
            return false;
        }

        public function getRoles(){
            return $this->db->query("SELECT * FROM rolez");
        }

        public function getRoleById($id){
            foreach($this->getRoles() as $role) {
                if ($role['id'] == $id) {
                    return $role;
                }
            }
            return null;
        }

        public function getRoleByName($name){
            foreach($this->getRoles() as $role) {
                if ($role['name'] == $name) {
                    return $role;
                }
            }
            return null;
        }


}
?>