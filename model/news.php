<?php
require_once './db.php';

class News{
    private $db;

    public function __construct(){
        $this->connectDatabase();
    }

    public function connectDatabase() {
        $database = new Database(); // Membuat instance dari class Database
        $this->db = $database->connect(); // Mengambil koneksi dari class Database
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

        // public function createNews($title, $content, $image, $create_at){
        //     $query = "INSERT INTO news (title, content, image, create_at) VALUES (?, ?, ?, ?)";
        //     $stmt = $this->db->prepare($query);
        //     $stmt->bind_param("ssss", $title, $content, $image, $create_at);

        //     if ($stmt->execute()) {
        //         return true;
        //     }
        //     return false;
        // }

        public function createNews($title, $content, $image, $create_at) {
            $query = "INSERT INTO news (title, content, image, create_at) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ssss", $title, $content, $image, $create_at);
        
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
        
        public function updateNews($nid , $title, $content, $image, $create_at){
            $query = "UPDATE news SET title = ?, content = ?, image = ?, create_at = ? WHERE nid = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ssssi", $title, $content, $image, $create_at, $nid);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        }

        public function deleteNews($nid){
            foreach($this->getAllNews() as $newd) {
                if ($newd['nid'] == $nid) {
                    $query = "DELETE FROM news WHERE nid = ?";
                    $stmt = $this->db->prepare($query);
                    $stmt->bind_param("i", $nid);
                    $stmt->execute();
                    return true;
                }
            }
            return false;
        }

        public function getNews(){
            return $this->db->query("SELECT * FROM news");
        }

        public function getNewsById($nid){
            foreach($this->getNews() as $newd) {
                if ($newd['nid'] == $nid) {
                    return $newd;
                }
            }
            return null;
        }

        public function getNewsByTitle($title){
            foreach($this->getNews() as $newd) {
                if ($newd['title'] == $title) {
                    return $newd;
                }
            }
            return null;
        }


}
?>