<?php
// Mulai sesi untuk menyimpan data login pengguna
session_start();
// session_destroy();

require_once './db.php'; // Ganti dengan path yang sesuai
require_once './controller/UserCon.php'; // Ganti dengan path yang sesuai

// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $uname = trim($_POST['uname']);
    $password = trim($_POST['password']); // Ambil password dari form

    // Validasi data
    if (empty($uname) || empty($password)) {
        echo "<script>alert('Username dan password tidak boleh kosong');</script>";
    } else {
        // Cek apakah username terdaftar di database
        $userz = new UserCon();
        $userf = $userz->getUserByName($uname);
        // var_dump($_POST['uname']);
        // var_dump($_POST['password']);
        // var_dump($_COOKIE);
        // unset($_SESSION['uname']);
        // unset($_SESSION['id']); 
        // setcookie('id', '', time() - 3600, '/'); 
        // setcookie('uname', '', time() - 3600, '/');
        // die;
        // Debugging: Tampilkan data pengguna dan input
        // var_dump($userf);
        // echo "<pre>";
        // var_dump($password);
        // var_dump($uname);
        // die; // Hentikan eksekusi untuk melihat output
        
        // var_dump(password_verify($password, $userf['password']));
        // var_dump($userf);
        // die;
    
        // die;
        // Pastikan user ditemukan dan password cocok
        
        if ($userf && password_verify($password, $userf['password'])) {
            // Password cocok, simpan data user di session
            $_SESSION['uname'] = $userf['uname'];
            $_SESSION['id'] = $userf['id'];

            // $_SESSION['role'] = $userf['role'];
            
            // Set cookie jika diperlukan
            setcookie('id', $userf['id'], time() + (24 * 60 * 60), "/");
            setcookie('uname', $userf['uname'], time() + (24 * 60 * 60), "/");
            
            // Cek role user dan arahkan ke halaman yang sesuai
            if ($userf['id'] == 1) {
                $_SESSION['role'] = 'Admin';
                // Role ID 1 adalah admin
                // var_dump('ini 1');
                // die;
                header('Location: index.php?modul=dashboard');
                exit;
            } elseif ($userf['id'] == 2) {
                $_SESSION['role'] = 'User';

                // Role ID 2 adalah user biasa
                // var_dump('ini 2');
                // die;
                header('Location: index.php?modul=landing');
                exit;
            }
        } else {
            // Jika login gagal
            echo "<script>alert('Username atau password salah');</script>";
        }
    }
 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-gradient {
            background: linear-gradient(120deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.3)), 
                        url('../assets/banner.png') no-repeat center center / cover;
        }
    </style>
</head>
<body class="bg-gray-100 h-screen">
    <div class="grid grid-cols-1 md:grid-cols-2 h-full">
        <!-- Left Side: Login Form -->
        <div class="flex items-center justify-center bg-white">
            <div class="w-full max-w-md p-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Login</h2>
            <form action="login.php" method="POST" class="space-y-6 p-6 bg-white shadow-lg rounded-lg border border-gray-200">
                <div>
                    <label for="uname" class="block text-sm font-medium text-gray-700">Username</label>
                    <input 
                        type="text" 
                        id="uname" 
                        name="uname" 
                        class="w-full mt-1 px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-200" 
                        placeholder="you@example.com" 
                        required
                    >
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="w-full mt-1 px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-200" 
                        placeholder="••••••••" 
                        required
                    >
                </div>
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                    Login
                </button>
            </form>

                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">Ga punya account bang? 
                        <a href="./register.php" class="text-blue-600 hover:underline">Register</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Side: Image and Description -->
        <div class="relative flex items-center justify-center bg-gradient">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="relative z-10 text-center p-8">
                <h2 class="text-4xl font-bold text-white mb-4">Welcome Back!</h2>
                <p class="text-lg text-gray-300">Manage your account, explore updates, and stay connected with your workspace.</p>
            </div>
        </div>
    </div>
</body>
</html>
