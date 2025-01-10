<?php
// session_start();

// die(var_dump($_SESSION['role']));
if ($_SESSION['role'] != "Admin") {
    header("Location: ./index.php?modul=landing"); // Redirect ke halaman login
    exit();
}
// Fungsi middleware untuk memeriksa role user
function checkRole($requiredRole)
{
    // Pastikan pengguna sudah login
   
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocafe | Admin - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="./output.css" rel="stylesheet">
</head>
<body>

<div>
   <?php include '/final-mission/view/includes/side.php'?>
</div>

<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
      <div class="grid grid-cols-3 gap-4 mb-4">
        <h1>INI DASHBOARD BANG</h1>
      </div>
   </div>
</div>
<script>
  // Seleksi elemen sidebar dan tombol toggle
const toggleButton = document.querySelector('[data-drawer-toggle]');
const sidebar = document.querySelector('#separator-sidebar');

// Fungsi untuk menutup sidebar
function closeSidebar() {
    sidebar.classList.add('-translate-x-full');
}

// Tambahkan event listener untuk membuka sidebar
toggleButton.addEventListener('click', (event) => {
    sidebar.classList.toggle('-translate-x-full');
    event.stopPropagation(); // Mencegah klik pada tombol memicu event body
});

// Tambahkan event listener pada body untuk menutup sidebar jika klik di luar
document.addEventListener('click', (event) => {
    if (!sidebar.contains(event.target) && !toggleButton.contains(event.target)) {
        closeSidebar();
    }
});

</script>

</body>
</html>
