<?php
function displayInfoItem($label, $value = '') {
    echo '<div>';
    echo '<span class="font-semibold text-gray-700 dark:text-gray-300">' . htmlspecialchars($label) . ': </span>';
    echo '<span class="text-gray-600 dark:text-gray-400">' . htmlspecialchars($value) . '</span>';
    echo '</div>';
}

function displayPartnerCard($image) {
    echo '<div class="rounded-lg border bg-card text-card-foreground shadow-sm hover:shadow-lg transition-shadow">';
    echo '<div class="p-4">';
    echo '<p class="text-center font-medium">' . htmlspecialchars($image) . '</p>';
    echo '</div>';
    echo '</div>';
}

function displayBadge($text) {
    echo '<span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80">';
    echo htmlspecialchars($text);
    echo '</span>';
}

$evenf = [
    'poster' => 'https://via.placeholder.com/800x400', // Gambar contoh, bisa diganti dengan data dari database
    'judul' => 'Sample Title', // Judul
    'isi' => 'This is the description or synopsis of the event or article.', // Deskripsi atau sinopsis
];

// Helper function to display poster
function displayPoster($image) {
    if (!empty($image)) {
        return $image;
    }
    return 'src/'; // URL gambar default jika tidak ada poster
}
function displayImage($image) {
    if (!empty($image)) {
        return $image;
    }
    return 'src/'; // URL gambar default jika tidak ada poster
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCAFE | News - Detail</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Configure dark mode
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    container: {
                        center: true,
                        padding: '1rem',
                    },
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gray-100 dark:bg-gray-900">
<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <?php include '/final-mission/view/includes/nav.php'; ?>
    </div>
    <!-- Poster in Body -->
    <div class="container mx-auto px-4 py-8">
        <div class="rounded-lg border bg-white dark:bg-gray-800 shadow">
            <div class="p-6">

                <!-- Poster Display -->
                <div class="mb-6">
                    <img
                        src="<?php echo htmlspecialchars(displayPoster($newd['image'])); ?>"
                        alt="Poster"
                        class="w-full h-auto object-contain" 
                    />
                </div>
        
                <!-- Synopsis -->
                <div class="space-y-4">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200">
                    <?php echo $newd['title'] ?? 'No Title Available'; ?>
                </h2>

                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    <?php 
                    // Menampilkan isi dengan nl2br agar baris baru tetap terlihat
                    echo nl2br($newd['content']); 
                    ?>
                </p>
            </div>
                <hr class="my-6 border-gray-200 dark:border-gray-700" />

                <!-- Partners -->
                <!-- <div class="space-y-4">
                    <h2 class="text-2xl font-bold">Partners</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4" style="max-width: 50%;">
                    <?php
                        foreach ($partnerd as $pard):
                            if ($pard['pid'] == $evend['pid']):
                                ?>
                                <img src="<?= htmlspecialchars(displayImage($pard['image$image'])); ?>" alt="Partner Image">
                                <?php
                            endif;
                        endforeach;
                        ?>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

</body>
</html>
