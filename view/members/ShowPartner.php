<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocafe | About Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="./output.css" rel="stylesheet">
    <style>
        #menu-toggle:checked + #mobile-menu {
            display: block;
        }
        .navbar {
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body class="font-sans">

    <!-- Navbar -->
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <?php include '/final-mission/view/includes/nav.php' ?>
    </div>  

    <!-- Header -->
    <!-- <header class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold">About Us</h1>
            <p class="text-gray-300 mt-2">Discover more about our journey and mission</p>
        </div>
    </header> -->

    <!-- About Section -->
    <section class="py-12">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Company Image -->
            <div>
                <img src="./assets/banner.png" alt="Company Photo" class="rounded-lg shadow-md w-full h-auto">
            </div>

            <!-- Company Information -->
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Para Partner yang berafiliasi dengan kami</h2>
                <p class="text-gray-600 mb-4">
                    Kami <strong>Otaku Cafe</strong>, kami adalah komunitas otaku yang berbasis digital atau secara daring lewat sosial media. Kami menyediakan berbagai macam konten otaku seperti manga, anime, dan game.
                    Kami tidak sendiri, kami memiliki para partner yang keren dan menarik bersama kami. 
                </p>
                <p class="text-gray-600 mb-4">
                    Misi kami adalah memberikan pengalaman otaku terbaik kepada para pengunjung kami, serta kenyamanan bagi setiap pelaku komunitas di Otaku Cafe.
                    begitupun juga para partner kami , yang ingin memberikan hiburan dan intertainment seputar otaku dan hal hal berbau japan culture.
                </p>

                <!-- Links to Other Pages -->
                <div class="flex space-x-4">
                    <a href="https://discord.gg/9zmMgGdN" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition" target="_blank">Discord</a>
                    <a href="https://chat.whatsapp.com/G9RYuHJiBSbCeuvypQmWBw" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition" target="_blank">Whatsapp</a>
                    <a href="https://www.instagram.com/otakucafe.id?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="px-4 py-2 bg-pink-800 text-white rounded-lg hover:bg-pink-900 transition" target="_blank">Instagram</a>
                    <a href="https://otakucafe.carrd.co/" class="px-4 py-2 bg-orange-800 text-white rounded-lg hover:bg-orange-900 transition" target="_blank">See More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision and Mission Section -->
    <!-- <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Para Partner Hebat Kami</h2>
            <p class="text-gray-600 mb-4">
                Our vision is to be a global leader in our field, known for innovation and excellence. 
                We aim to make a positive impact on businesses and communities worldwide.
            </p>
            <p class="text-gray-600">
                Our mission is to provide cutting-edge solutions that solve real-world challenges, foster growth, 
                and drive success for our clients and partners.
            </p>
        </div>
    </section> -->
    <section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Para Partner Hebat Kami</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php foreach ($partnerd as $pard): ?>
                <div>
                    <img 
                        src="<?php echo $pard['ppict']; ?>" 
                        alt="Partner logo" 
                        class="w-full h-32 object-contain"
                        onerror="this.src='https://via.placeholder.com/150x100';"
                    >
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


    <!-- Footer -->
    <?php include './view/includes/footer.php'; ?>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const menuToggle = document.getElementById("menu-toggle");
            const mobileMenu = document.getElementById("navbar-sticky");

            if (menuToggle && mobileMenu) {
                menuToggle.addEventListener("click", () => {
                    if (mobileMenu.classList.contains("hidden")) {
                        mobileMenu.classList.remove("hidden");
                    } else {
                        mobileMenu.classList.add("hidden");
                    }
                });
            }
        });
    </script>
</body>
</html>
