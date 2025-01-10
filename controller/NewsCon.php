<?php
require_once './model/news.php';

class NewsCon {
    private $newscons;

    public function __construct() {
        $this->newscons = new News(); // Pastikan nama kelas sesuai dengan file model
    }

    public function listNews() {
        $newd = $this->newscons->getAllNews(); // Mengakses metode dari model Role
        include 'view/admin/addnews/list.php';
    }
    public function getAllNews() {
        $newd = $this->newscons->getAllNews(); // Mengakses metode dari model Role
    }

    public function addNews() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Mengambil data dari form input
            $title = $_POST['title'] ?? null;
            $content = $_POST['content'] ?? null;
            // $image = $_POST['image'] ?? null;
            $create_at = $_POST['create_at'] ?? null;
            // Untuk menangani file gambar partner
            $uploadDir = 'src/';
            $fileName = isset($_FILES['image']['name']) ? basename($_FILES['image']['name']) : null;
            $targetFile = $fileName ? $uploadDir . $fileName : null;
    
            // Memastikan file berhasil diupload
            if ($fileName && move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                // File berhasil diupload
            } else {
                $targetFile = null; // Jika tidak ada file atau gagal upload
            }
    
            // Simpan data partner menggunakan metode dari model Partners
            $this->newscons->createNews($title, $content, $targetFile, $create_at);
    
            // Redirect ke halaman daftar partner
            header("Location: index.php?modul=news&fitur=list");
            exit;
        } else {
            // Jika bukan POST, tampilkan form input
            include 'view/admin/addnews/input.php'; // Menampilkan form input partner
        }
    }

    public function delete($nid) {
        $this->newscons->deleteNews($nid);
        header("Location: index.php?modul=news&fitur=list");
        exit;
    }

    public function edit($nid) {
        $newd = $this->newscons->getNewsById($nid);
        include 'view/admin/addnews/update.php';
    }
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $nid = $_POST['nid'] ?? null;
            $title = $_POST['title'] ?? null;
            $content = $_POST['content'] ?? null;
            $create_at = date('Y-m-d H:i:s');
    
            // Tentukan direktori untuk upload file
            $uploadDir = 'src/';
            $targetFile = null;
    
            // Jika ada file baru yang diupload
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $fileName = basename($_FILES['image']['name']);
                $targetFile = $uploadDir . $fileName;
    
                // Cek apakah file berhasil diupload
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                    $targetFile = null; // Jika gagal upload, set ke null
                }
            } else {
                // Jika tidak ada file baru, gunakan gambar lama
                $targetFile = $_POST['old_image'] ?? 'default.jpg';
            }
    
            // Validasi
            if (empty($nid) || empty($title) || empty($content)) {
                die('Error: Semua field harus diisi!');
            }
    
            // Update data berita
            if ($this->newscons->updateNews($nid, $title, $content, $targetFile, $create_at)) {
                header("Location: index.php?modul=news&fitur=list");
                exit;
            } else {
                die('Error: Gagal memperbarui data berita.');
            }
        }
    }
    public function detail($nid) {
        $newd = $this->newscons->getNewsById($nid);
        include 'view/admin/addnews/detail.php'; // Pastikan path file view benar
    }
}
?>
