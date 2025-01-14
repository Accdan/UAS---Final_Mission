
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCAFE | Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <div class="max-w-screen-xl mx-auto p-4">
        <?php include '/final-mission/view/includes/nav.php'; ?>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 mt-6"> <!-- Tambahkan 'mt-6' untuk jarak -->
        <?php
        // Pagination logic
        // $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : -1; // Current page number
        // $itemsPerPage = 6; // Number of news per page
        // $totalItems = count($evend); // Total number of news
        // $totalPages = ceil($totalItems / $itemsPerPage); // Calculate total pages
        // $startIndex = ($currentPage - 1) * $itemsPerPage; // Starting index for the current page

        // // Get the slice of news for the current page
        // $currentNews = array_slice($evend, $startIndex, $itemsPerPage);

        // Display news
        foreach ($evend as $evenf): ?>
            <div class="mb-6 bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                <a href="index.php?modul=landing&show=Event-Detail&eid=<?php echo $evenf['eid']; ?>" class="flex flex-col sm:flex-row">
                    <!-- Image -->
                    <div class="sm:w-48 h-48 sm:h-32 flex-shrink-0">
                        <img 
                            src="<?php echo htmlspecialchars(html_entity_decode($evenf['poster'])); ?>" 
                            alt="Article thumbnail"
                            class="w-full h-full object-cover" 
                            style="max-width: 50%;"
                            onerror="this.src='https://via.placeholder.com/192x128';"
                        >
                    </div>
                    
                    <!-- Content -->
                    <div class="p-4 flex-grow">
                        <h2 class="text-xl font-semibold text-gray-900 mb-2 hover:text-blue-500">
                            <?php echo $evenf['judul']; ?>
                        </h2>
                        <p class="text-gray-600">
                            <?php 
                                // Decode entitas HTML dan potong isi jika panjang lebih dari 250 karakter
                                $decodedIsi = html_entity_decode(strip_tags($evenf['isi']));
                                echo strlen($decodedIsi) > 250 
                                    ? htmlspecialchars(substr($decodedIsi, 0, 250)) . '...' 
                                    : htmlspecialchars($decodedIsi); 
                            ?>
                        </p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
        

        <!-- Pagination Links
        <div class="flex justify-center mt-6">
            <?php if ($currentPage > 1): ?>
                <a href="?page=<?php echo $currentPage - 1; ?>" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-l">Previous</a>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" class="px-4 py-2 <?php echo $i == $currentPage ? 'bg-blue-500 text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700'; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
            <?php if ($currentPage < $totalPages): ?>
                <a href="?page=<?php echo $currentPage + 1; ?>" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-r">Next</a>
            <?php endif; ?>
        </div> -->
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <?php include '/final-mission/view/includes/footer.php'; ?>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Mobile Menu Toggle
            const menuToggle = document.getElementById("menu-toggle");
            const mobileMenu = document.getElementById("navbar-sticky");
            if (menuToggle && mobileMenu) {
                menuToggle.addEventListener("click", () => {
                    mobileMenu.classList.toggle("hidden");
                });
            }
        });
    </script>
</body>
</html>
