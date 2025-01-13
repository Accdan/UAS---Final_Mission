<?php
require_once './model/event.php'; // Pastikan nama file model benar

class EventCon{
    private $eventcons;
    private $partnercons;

    public function __construct() {
        $this->eventcons = new Eventd(); // Pastikan nama kelas sesuai dengan file model
        $this->partnercons = new Partners(); // Pastikan nama kelas model sesuai
    }

    public function listEvent() { //
        $partnerd = $this->partnercons->getAllPartner();
        $evend = $this->eventcons->getAllEvent(); // Memanggil metode getAllUser dari model
        include 'view/admin/addevent/list.php'; // Pastikan path file view benar
    }

    public function getAllEvent() {
        $evend = $this->eventcons->getAllEvent(); // Memanggil metode getAllUser dari model
    }

    public function addEvent() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // var_dump($_POST['isi']);
            // $poster = $_POST['poster'] ?? null;
            $judul = $_POST['judul'] ?? null;
            $isi = $_POST['isi'] ?? null;
            // var_dump(htmlspecialchars($_POST['isi']));
            // var_dump($_POST['isi']);
            // die;
            $pid = $_POST['pid'] ?? null;
            $create_at = date('Y-m-d H:i:s'); 
            $status = $_POST['status'] ?? null;
    
            // Untuk menangani file gambar partner
            $uploadDir = 'src/';
            $fileName = isset($_FILES['poster']['name']) ? basename($_FILES['poster']['name']) : null;
            $targetFile = $fileName ? $uploadDir . $fileName : null;
    
            // Memastikan file berhasil diupload
            if ($fileName && move_uploaded_file($_FILES['poster']['tmp_name'], $targetFile)) {
                // File berhasil diupload
            } else {
                $targetFile = null; // Jika tidak ada file atau gagal upload
            }
    
            // Simpan data partner menggunakan metode dari model Partners
            $this->eventcons->createEvent($judul, $targetFile, $isi, $pid, $create_at, $status);
    
            // Redirect ke halaman daftar partner
            header("Location: index.php?modul=event&fitur=list");
            exit;
        } else {
            // Jika bukan POST, tampilkan form input
            include 'view/admin/addevent/input.php'; // Menampilkan form input partner
        }
    }

    public function delete($eid) {
        $this->eventcons->deleteEvent($eid); 
        header("Location: index.php?modul=event&fitur=list");
        exit;
    }

    public function edit($eid) {
        $evend = $this->eventcons->getEventById($eid);
        $partnerd = $this->partnercons->getAllPartner(); // Memanggil metode getUserById dari model
        include 'view/admin/addevent/update.php'; // Pastikan path file view benar
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            // var_dump($_POST['isi']);

            $eid = $_POST['eid'] ?? null;
            $judul = $_POST['judul']?? null;
            $isi = $_POST['isi'] ?? null;

        
            $pid = $_POST['pid'] ?? null;
            $status = $_POST['status'] ?? null;
            $create_at = date('Y-m-d H:i:s'); 
    
            // Tentukan direktori untuk upload file
            $uploadDir = 'src/';
            $targetFile = null;
    
            // Jika ada file poster baru yang diupload
            if (isset($_FILES['poster']) && $_FILES['poster']['error'] === 0) {
                $fileName = basename($_FILES['poster']['name']);
                $targetFile = $uploadDir . $fileName;
    
                // Cek apakah file berhasil diupload
                if (!move_uploaded_file($_FILES['poster']['tmp_name'], $targetFile)) {
                    $targetFile = null; // Jika gagal upload, set ke null
                }
            } else {
                // Jika tidak ada file baru, gunakan gambar lama (poster yang sudah ada)
                $targetFile = $_POST['old_poster'] ?? null;  // Nama poster lama
            }
    
            // Panggil metode updateEvent dari model untuk update data
            if ($this->eventcons->updateEvent($eid, $judul, $targetFile, $isi, $pid, $create_at, $status)) {
                header("Location: index.php?modul=event&fitur=list");
                exit;
            } else {
                die('Error: Gagal memperbarui event.');
            }
        }
    }
    
    public function getAllPartners() {
        $partnerd = $this->partnercons->getAllPartner();
        include 'view/admin/addevent/input.php';
    }

    public function detail($eid) {
        $evend = $this->eventcons->getEventById($eid);
        $partnerd = $this->partnercons->getAllPartner(); // Memanggil metode getUserById dari model
        include 'view/admin/addevent/detail.php'; // Pastikan path file view benar
    }
}
?>
