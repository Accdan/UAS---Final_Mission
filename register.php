<?php
session_start();
include './db.php';

// Buat instance Database dan hubungkan ke database
$database = new Database();
$db = $database->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $uname = trim($_POST['uname']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm-password']);

    // Validasi apakah password cocok
    if ($password !== $confirmPassword) {
        $_SESSION['error_message'] = "Passwords do not match!";
        header("Location: register.php");
        exit();
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Assign default role ID (2) for new users
    $id = 2;

    try {
        // Query untuk memasukkan user baru
        $sql = "INSERT INTO user (uname, password, id) VALUES (?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssi", $uname, $hashedPassword, $id);

        $stmt->execute();

        // Redirect ke login page setelah registrasi berhasil
        $_SESSION['success_message'] = "Registration successful. Please login.";
        header("Location: login.php");
        exit();
    } catch (mysqli_sql_exception $e) {
        $_SESSION['error_message'] = "Error: " . $e->getMessage();
        header("Location: register.php");
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Validasi password dan konfirmasi password di frontend
        function validatePassword() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirm-password").value;
            const errorMessage = document.getElementById("error-message");

            if (password !== confirmPassword) {
                errorMessage.textContent = "Passwords do not match!";
                errorMessage.style.color = "red";
                return false;
            } else {
                errorMessage.textContent = "";
                return true;
            }
        }
    </script>
</head>
<body class="bg-gray-100 h-screen">
    <div class="grid grid-cols-1 md:grid-cols-2 h-full">
        <!-- Left Side: Image and Description -->
        <div class="relative bg-blue-600 text-white flex items-center justify-center">
            <div class="absolute inset-0 bg-cover bg-center opacity-75" style="background-image: url('../assets/banner.png');"></div>
            <div class="relative z-10 text-center p-8">
                <h2 class="text-4xl font-bold mb-4">Daftar dulu Cuiy!</h2>
                <p class="text-lg">Buat akun baru di Ocafe.</p>
            </div>
        </div>

        <!-- Right Side: Registration Form -->
        <div class="flex items-center justify-center bg-white">
            <div class="w-full max-w-md p-8 shadow-lg rounded-lg border border-gray-200">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Register</h2>
                <form action="./register.php" method="POST" class="space-y-4" onsubmit="return validatePassword()">
                    <div>
                        <label for="uname" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" id="uname" name="uname" class="w-full mt-1 px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none" placeholder="Your Username" required>
                    </div>
                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="w-full mt-1 px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none" placeholder="••••••••" required>
                    </div>
                    <!-- Confirm Password -->
                    <div>
                        <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" id="confirm-password" name="confirm-password" class="w-full mt-1 px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none" placeholder="••••••••" required>
                    </div>
                    <!-- Error Message for Password Mismatch -->
                    <div id="error-message" class="text-sm text-red-600"></div>

                    <!-- Submit Button -->
                    <button type="submit" name="register" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">Register</button>
                </form>
                <p class="text-center mt-4 text-sm text-gray-600">Udah punya akun bang? <a href="../login.php" class="text-blue-600 hover:underline">Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>

