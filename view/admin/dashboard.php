<?php
// session_start();

// Middleware untuk memastikan role admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != "Admin") {
    header("Location: ./index.php?modul=landing");
    exit();
}

// Include file koneksi database
require_once './db.php';

// Membuat koneksi ke database
$db = (new Database())->connect();

// Query total data
$totalEventResult = $db->query("SELECT COUNT(*) AS total FROM eventz");
$totalEvent = $totalEventResult ? $totalEventResult->fetch_assoc()['total'] : 0;

$totalNewsResult = $db->query("SELECT COUNT(*) AS total FROM news");
$totalNews = $totalNewsResult ? $totalNewsResult->fetch_assoc()['total'] : 0;

// Query untuk menghitung jumlah anggota kecuali yang memiliki uid = 1
$totalMemberResult = $db->query("SELECT COUNT(*) AS total FROM user WHERE id != 1");
$totalMember = $totalMemberResult ? $totalMemberResult->fetch_assoc()['total'] : 0;

// $totalPartnerResult = $db->query("SELECT COUNT(*) AS total FROM partnerz");
$totalPartner = $db->query("SELECT COUNT(*) AS total FROM partnerz")->fetch_assoc()['total'] ?? 0;

// Query untuk mendapatkan event terbaru yang sedang aktif
$eventsResult = $db->query("SELECT eid, judul, poster FROM eventz WHERE status = '1' ORDER BY create_at DESC LIMIT 1");
$events = $eventsResult ? $eventsResult->fetch_assoc() : null;

$partnerResult = $db->query("SELECT pid, ppict FROM partnerz ORDER BY create_at DESC LIMIT 1");
$partnerd = $partnerResult ? $partnerResult->fetch_assoc() : null;

// Query untuk mendapatkan data news terbaru
$newsResult = $db->query("SELECT nid, title, image FROM news ORDER BY create_at DESC LIMIT 1");
$news = $newsResult ? $newsResult->fetch_assoc() : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocafe | Admin - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Menambahkan gambar latar belakang ke seluruh halaman */
        body {
            background-color: white; /* Latar belakang putih untuk seluruh halaman */
            background-image: url('assets/your-image.jpg'); /* Ganti dengan path gambar yang sesuai */
            background-size: cover; /* Gambar akan menutupi seluruh halaman */
            background-position: center center; /* Posisi gambar di tengah */
            background-repeat: no-repeat; /* Gambar tidak akan diulang */
        }

        .tenor-gif-embed {
            max-width: 500px;
            width: 100%;
        }
    </style>
</head>
<body class="bg-white">

<div class="flex flex-col lg:flex-row">
<?php include '/final-mission/view/includes/side.php' ?>

    <div class="flex-1 p-6 sm:ml-64">
        <!-- Header -->
        <header class="flex justify-between items-center py-4 mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        </header>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="p-4 bg-white rounded-lg shadow hover:bg-gray-200 cursor-pointer">
                <h2 class="text-sm text-gray-500">Total Events</h2>
                <a href="index.php?modul=event" class="mt-2 text-2xl font-bold text-gray-800 block"><?= htmlspecialchars($totalEvent); ?></a>
            </div>
            <div class="p-4 bg-white rounded-lg shadow hover:bg-gray-200 cursor-pointer">
                <h2 class="text-sm text-gray-500">Total News</h2>
                <a href="index.php?modul=news" class="mt-2 text-2xl font-bold text-gray-800 block"><?= htmlspecialchars($totalNews); ?></a>
            </div>

            <div class="p-4 bg-white rounded-lg shadow hover:bg-gray-200 cursor-pointer">
                <h2 class="text-sm text-gray-500">Total Members</h2>
                <a href="index.php?modul=user" class="mt-2 text-2xl font-bold text-gray-800 block"><?= htmlspecialchars($totalMember); ?></a>
            </div>
            <div class="p-4 bg-white rounded-lg shadow hover:bg-gray-200 cursor-pointer">
                <h2 class="text-sm text-gray-500">Total Partners</h2>
                <a href="index.php?modul=partner" class="mt-2 text-2xl font-bold text-gray-800 block"><?= htmlspecialchars($totalPartner); ?></a>
            </div>
        </div>

        <!-- Overview Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Event Overview -->
            <div class="p-6 bg-white rounded-lg shadow">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Event Overview</h2>
                <div class="space-y-4">
                    <?php if ($events): ?>
                        <div class="flex items-center space-x-4">
                            <!-- Tampilkan gambar poster dan judul -->
                            <img src="<?= htmlspecialchars($events['poster']); ?>" alt="Event Poster" class="w-16 h-16 object-cover rounded">
                            <span class="text-gray-800"><?= $events['judul']; ?></span>
                        </div>
                    <?php else: ?>
                        <p class="text-gray-500">No active events available.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- News Overview -->
            <div class="p-6 bg-white rounded-lg shadow">
                <h2 class="text-lg font-bold text-gray-800 mb-4">News Overview</h2>
                <div class="space-y-4">
                    <?php if ($news): ?>
                        <div class="flex items-center space-x-4">
                            <!-- Tampilkan gambar dan judul -->
                            <img src="<?= htmlspecialchars($news['image']); ?>" alt="News Image" class="w-16 h-16 object-cover rounded">
                            <span class="text-gray-800"><?= $news['title']; ?></span>
                        </div>
                    <?php else: ?>
                        <p class="text-gray-500">No news available.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Partner Overview -->
            <div class="p-6 bg-white rounded-lg shadow">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Newest Partner</h2>
                <div class="space-y-4">
                    <?php if ($partnerd): ?>
                        <div class="flex items-center space-x-4">
                            <!-- Tampilkan gambar partner -->
                            <img src="<?= htmlspecialchars($partnerd['ppict']); ?>" alt="Partner Image" class="grid grid-cols-2 md:grid-cols-4 gap-4" style="max-width: 50%;">
                            <!-- <span class="text-gray-800"><?= htmlspecialchars($partnerd['pid']); ?></span> -->
                        </div>
                    <?php else: ?>
                        <p class="text-gray-500">No partners available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle Sidebar on mobile
    document.getElementById('sidebar-toggle').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('hidden');
    });
</script>
</body>
</html>
