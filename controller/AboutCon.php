<?php
require_once './model/abouts.php';

class AboutCon {
    private $landing;

    public function __construct() {
        // $this->landing = new LandingPageEdit();
    }

    // Menampilkan profil berdasarkan ID
    public function getProfile($aid) {
        $profile = $this->landing->getProfile($aid);
        include 'view/admin/addprofile/show.php'; // Menampilkan data profile
    }

    // Fungsi untuk memperbarui profil
    public function update($aid) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $logoPath = $_POST['logo$logoPath'] ?? null;
            $jumbotronPath = $_POST['pname'] ?? null;

            $uploadDir = 'src/';
            if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
                $logoPath = $uploadDir . basename($_FILES['logo']['name']);
                move_uploaded_file($_FILES['logo']['tmp_name'], $logoPath);
            }

            if (isset($_FILES['jumbotron']) && $_FILES['jumbotron']['error'] === UPLOAD_ERR_OK) {
                $jumbotronPath = $uploadDir . basename($_FILES['jumbotron']['name']);
                move_uploaded_file($_FILES['jumbotron']['tmp_name'], $jumbotronPath);
            }

            // Perbarui data
            $this->landing->updateProfile($aid, $logoPath, $jumbotronPath);

            // Redirect ke halaman profil
            header("Location: index.php?modul=profile&fitur=show&id=$aid");
            exit;
        }
    }

    // Fungsi untuk membuat profil baru
    public function createProfile() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $logoPath = $_POST['logo$logoPath'] ?? null;
            $jumbotronPath = $_POST['pname'] ?? null;

            $uploadDir = 'src/';
            

            if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
                $logoPath = $uploadDir . basename($_FILES['logo']['name']);
                move_uploaded_file($_FILES['logo']['tmp_name'], $logoPath);
            }

            if (isset($_FILES['jumbotron']) && $_FILES['jumbotron']['error'] === UPLOAD_ERR_OK) {
                $jumbotronPath = $uploadDir . basename($_FILES['jumbotron']['name']);
                move_uploaded_file($_FILES['jumbotron']['tmp_name'], $jumbotronPath);
            }

            // Simpan data
            var_dump($logoPath, $jumbotronPath);
            $this->landing->createProfile($logoPath, $jumbotronPath);

            // Redirect ke halaman daftar profil
            // header("Location: index.php?modul=profile&fitur=");
            exit;
        } else {
            include 'view/admin/addprofile/create.php'; // Menampilkan form input
        }
    }

    // Fungsi untuk menampilkan daftar profil
   
}
?>
