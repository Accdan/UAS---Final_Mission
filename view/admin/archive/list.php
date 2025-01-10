<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocafe | Admin - Archive</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

<!-- Main container -->
<div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white min-h-screen">
        <?php include '/final-mission/view/includes/side.php'; ?>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <div class="container mx-auto">

            <!-- Inactive Event List -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-3">Event</h2>
                <div class="bg-white shadow-md rounded overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 text-left text-sm font-medium">ID</th>
                                <th class="py-2 px-4 text-left text-sm font-medium">Judul</th>
                                <th class="py-2 px-4 text-center text-sm font-medium">Poster</th>
                                <th class="py-2 px-4 text-center text-sm font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($evend as $evenf): ?>
                                <?php if ($evenf['status'] == 0): ?>
                                    <tr class="border-t">
                                        <td class="py-2 px-4"><?php echo htmlspecialchars($evenf['eid']); ?></td>
                                        <td class="py-2 px-4"><?php echo $evenf['judul']; ?></td>
                                        <td class="py-2 px-4 text-center">
                                            <?php if (!empty($evenf['poster'])): ?>
                                                <img src="<?php echo htmlspecialchars($evenf['poster']); ?>" alt="Poster" class="h-12 mx-auto">
                                            <?php else: ?>
                                                <span class="text-gray-400">No Image</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="py-2 px-4 text-center">
                                            <a href="index.php?modul=event&fitur=delete&eid=<?php echo $evenf['eid']; ?>" class="text-yellow-500 hover:underline">Delete</a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- News List -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-3">News</h2>
                <div class="bg-white shadow-md rounded overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 text-left text-sm font-medium">ID</th>
                                <th class="py-2 px-4 text-left text-sm font-medium">Title</th>
                                <th class="py-2 px-4 text-center text-sm font-medium">Image</th>
                                <th class="py-2 px-4 text-center text-sm font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($newd as $newz): ?>
                                <tr class="border-t">
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($newz['nid']); ?></td>
                                    <td class="py-2 px-4"><?php echo $newz['title']; ?></td>
                                    <td class="py-2 px-4 text-center">
                                        <?php if (!empty($newz['image'])): ?>
                                            <img src="<?php echo htmlspecialchars($newz['image']); ?>" alt="News" class="h-12 mx-auto">
                                        <?php else: ?>
                                            <span class="text-gray-400">No Image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-2 px-4 text-center">
                                        <a href="index.php?modul=news&fitur=delete&nid=<?php echo $newz['nid']; ?>" class="text-red-500 hover:underline">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

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
