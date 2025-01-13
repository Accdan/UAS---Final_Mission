<?php
require_once './model/user.php'; 
require_once './model/role.php'; // Pastikan nama file model benar

class UserCon {
    private $usercons;
    private $rolecons;

    public function __construct() {
        $this->usercons = new userd();
        $this->rolecons = new roled(); // Pastikan nama kelas model sesuai
    }

    public function listUser() {
        $users = $this->usercons->getAllUser(); // Memanggil metode getAllUser dari model
        include 'view/admin/adduser/list.php'; // Pastikan path file view benar
    }
    public function addUser () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $uname = trim($_POST['uname']);
            $password = trim($_POST['password']);
            $id = $_POST['id'] ?? null; // ID Role dipilih oleh pengguna
            $create_at = date('Y-m-d H:i:s'); // Waktu pembuatan
    
            // Validasi input
            if (empty($uname)) {
                echo "Username tidak boleh kosong.";
                return;
            }
    
            if (empty($password) || strlen($password) < 6) {
                echo "Password tidak boleh kosong dan harus minimal 6 karakter.";
                return;
            }
    
            if (empty($id)) {
                echo "Role ID tidak valid.";
                return;
            }
    
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // Panggil method untuk menambah user
            $this->usercons->createUser ($uname, $hashedPassword, $create_at, $id);
    
            // Redirect ke halaman daftar user
            header("Location: index.php?modul=user&fitur=list");
            exit;
        } else {
            // Ambil data roles dari model
            $roles = $this->rolecons->getAllRole(); // Pastikan model sudah menyediakan fungsi ini
    
            // Tampilkan form input
            include 'view/admin/adduser/input.php'; // Pastikan path file view benar
        }
    }
    

    public function delete($uid) {
        $this->usercons->deleteUser($uid); // Memanggil metode deleteUser dari model
        header("Location: index.php?modul=user&fitur=list");
        exit;
    }

    public function edit($uid) {
        $user = $this->usercons->getUserById($uid);
        $roles = $this->rolecons->getAllRole(); // Memanggil metode getUserById dari model
        include 'view/admin/adduser/update.php'; // Pastikan path file view benar
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data untuk update
            $uid = $_POST['uid'] ?? null; // Mengambil input uid
            $uname = trim($_POST['uname']);
            $password = trim($_POST['password']);

            // Set create_at jika ingin melakukan update (boleh dibiarkan null jika tidak diperlukan)
            $create_at = date('Y-m-d H:i:s'); // Bisa sesuaikan, jika update hanya memperbarui data lain
            $id = $_POST['id'] ?? null; // Mengambil input id
            // Update data di model
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $this->usercons->updateUser($uid, $uname, $hashedPassword, $create_at, $id); // Memanggil metode updateUser

            // Redirect setelah update
            header("Location: index.php?modul=user&fitur=list");
            exit;
        }
    }
    
    public function getAllRoles() {
        $roles = $this->usercons->getAllRoles();
        include 'view/admin/adduser/input.php';
    }

    public function getUserByName($uname) {
        return $this->usercons->getUserByName($uname);
        
    }

    public function getUserAllUser() {
        return $this->usercons->getAllUser();
    }


//    public function loginUser($uname, $password) {
//     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//         // Ambil data dari form
//         $uname = trim($_POST['uname']);
//         $password = trim($_POST['password']);
    
//         // Validasi data
//         if (empty($uname) || empty($password)) {
//             echo "<script>alert('Email dan password tidak boleh kosong');</script>";
//         } else {
//             // Cek apakah email terdaftar di database
//             $userz = new UserCon();
//             $userf = $userz->getUserByName($uname);
    
//             // Pastikan user ditemukan dan password cocok
//             if ($userf && password_verify($password, $userf['password'])) {
//                 // Password cocok, simpan data user di session
//                 $_SESSION['uname'] = $userf['uname'];
//                 $_SESSION['password'] = $userf['password'];
//                 $_SESSION['id'] = $userf['id'];
                
//                 setcookie('id', $userf['id'], time() + (24 * 60 * 60), "/");
//                 setcookie('uname', $userf['uname'], time() + (24 * 60 * 60), "/");
                
//                 // Cek role user dan arahkan ke halaman yang sesuai
//                 if ($userf['id'] == 1) {
//                     // Role ID 1 adalah admin
//                     header('Location: index.php?modul=dashboard');
//                     exit;
//                 } elseif ($userf['id'] == 2) {
//                     // Role ID 2 adalah user biasa
//                     header('Location: index.php?modul=landing');
//                     exit;
//                 }
//             } else {
//                 // Jika login gagal
//                 echo "<script>alert('Email atau password salah');</script>";
//             }
//             // var_dump($userf); 
//             // die;
        
//                 }
//             }
//             }
}
?>
