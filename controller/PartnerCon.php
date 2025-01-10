<?php
require_once './model/partners.php';

class PartnerCon {
    private $partnercons; // Menyimpan instance dari model Partners

    public function __construct() {
        $this->partnercons = new Partners(); // Pastikan nama kelas sesuai dengan model yang Anda buat
    }

    // Fungsi untuk menampilkan daftar partner
    public function listPartner() {
        // Mengambil semua data partner dari model
        $partnerd = $this->partnercons->getAllPartner();
        include 'view/admin/addpartner/list.php'; // Menampilkan daftar partner di view
    }

    // Fungsi untuk menambahkan partner baru
    // public function addPartner() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         // Mengambil data dari form input
    //         $pname = $_POST['pname'] ?? null;
    //         $pdesc = $_POST['pdesc'] ?? null;
    //         $create_at = date('Y-m-d H:i:s'); // Tanggal pembuatan
    //         $ppict = $_FILES['ppict'] ?? null;  // Untuk file gambar partner

        
    //         // Simpan data partner menggunakan metode dari model Partners
    //         $this->partnercons->createPartner($pname, $pdesc, $ppict, $create_at);

    //         // Redirect ke halaman daftar partner
    //         header("Location: index.php?modul=partner&fitur=list");
    //         exit;
    //     } else {
    //         // Jika bukan POST, tampilkan form input
    //         include 'view/admin/addpartner/input.php'; // Menampilkan form input partner
    //     }
    // }

    public function addPartner() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Mengambil data dari form input
            $pname = $_POST['pname'] ?? null;
            $pdesc = $_POST['pdesc'] ?? null;
            $create_at = date('Y-m-d H:i:s'); // Tanggal pembuatan
    
            // Untuk menangani file gambar partner
            $uploadDir = 'src/';
            $fileName = isset($_FILES['ppict']['name']) ? basename($_FILES['ppict']['name']) : null;
            $targetFile = $fileName ? $uploadDir . $fileName : null;
    
            // Memastikan file berhasil diupload
            if ($fileName && move_uploaded_file($_FILES['ppict']['tmp_name'], $targetFile)) {
                // File berhasil diupload
            } else {
                $targetFile = null; // Jika tidak ada file atau gagal upload
            }
    
            // Simpan data partner menggunakan metode dari model Partners
            $this->partnercons->createPartner($pname, $pdesc, $targetFile, $create_at);
    
            // Redirect ke halaman daftar partner
            header("Location: index.php?modul=partner&fitur=list");
            exit;
        } else {
            // Jika bukan POST, tampilkan form input
            include 'view/admin/addpartner/input.php'; // Menampilkan form input partner
        }
    }
    

    // Fungsi untuk menghapus partner
    public function deletePartner($pid) {
        $this->partnercons->deletePartner($pid);  // Menghapus partner berdasarkan ID
        header("Location: index.php?modul=partner&fitur=list");  // Redirect ke daftar partner
        exit;
    }

    // Fungsi untuk menampilkan form update partner
    public function editPartner($pid) {
        $partnerd = $this->partnercons->getPartnerById($pid);  // Ambil data partner berdasarkan ID
        include 'view/admin/addpartner/update.php';  // Tampilkan form edit partner
    }

    // Fungsi untuk memperbarui data partner
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $pid = $_POST['pid'] ?? null;
            $pname = strip_tags($_POST['pname']) ?? null;
            $pdesc = strip_tags($_POST['pdesc']) ?? null;
            $create_at = date('Y-m-d H:i:s');
    
            // Tentukan direktori untuk upload file
            $uploadDir = 'src/';
            $targetFile = null;
    
            // Jika ada file baru yang diupload
            if (isset($_FILES['ppict']) && $_FILES['ppict']['error'] === 0) {
                $fileName = basename($_FILES['ppict']['name']);
                $targetFile = $uploadDir . $fileName;
    
                // Cek apakah file berhasil diupload
                if (!move_uploaded_file($_FILES['ppict']['tmp_name'], $targetFile)) {
                    $targetFile = null; // Jika gagal upload, set ke null
                }
            } else {
                // Jika tidak ada file baru, gunakan gambar lama
                $targetFile = $_POST['old_ppict'] ?? 'default.jpg';
            }
    
            // Validasi
            if (empty($pid) || empty($pname) || empty($pdesc)) {
                die('Error: Semua field harus diisi!');
            }
    
            // Update data partner
            if ($this->partnercons->updatePartner($pid, $pname, $pdesc, $targetFile, $create_at)) {
                header("Location: index.php?modul=partner&fitur=list");
                exit;
            } else {
                die('Error: Gagal memperbarui data partner.');
            }
        }
    }
    
    // public function updatePartner() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $pid = $_POST['pid'] ?? null;
    //         $pname = $_POST['pname'] ?? null;
    //         $pdesc = $_POST['pdesc'] ?? null;
    //         $create_at = date('Y-m-d H:i:s');
    
    //         // Proses file upload
    //         $uploadDir = 'src/';
    //         $uploadFile = $uploadDir . basename($_FILES['ppict']['name']);
    //         // $_FILES['ppict']['tmp_name'];
    //         // var_dump($_FILES['ppict']);
    //         if (isset($_FILES['ppict']) && $_FILES['ppict']['name']) {
    //             if (move_uploaded_file($_FILES['ppict']['tmp_name'], $uploadFile)) {
    //                 $ppict = $uploadFile;
    //                 // var_dump($ppict);
    //             } else {
    //                 $ppict = 'default.jpg';
    //             }
    //         } else {
    //             $ppict = 'default.jpg';
    //         }
    
    //         // Validasi
    //         if (empty($pid) || empty($pname) || empty($pdesc)) {
    //             die('Error: Semua field harus diisi!');
    //         }
    
    //         // Update
    //         if ($this->partnercons->updatePartner($pid, $pname, $pdesc, $ppict, $create_at)) {
    //             header("Location: index.php?modul=partner&fitur=list");
    //             exit;
    //         } else {
    //             die('Error: Gagal memperbarui data partner.');
    //         }
    //     }
    // }
    
}

//             // Memperbarui data partner
//             $this->partnercons->updatePartner($pid, $pname, $pdesc, $ppict, $create_at);
//             // header("Location: index.php?modul=partner&fitur=list"); // Redirect ke daftar partner
//             exit;
//         }
//     }
// }
?>
