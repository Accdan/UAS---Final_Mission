<?php
require_once './db.php';
require_once 'controller/LandingCon.php';

$controller = new LandingCon();
// die(var_dump($controller));
$listevent = $controller->GetListAllEvent();
// die(var_dump($listevent));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocafe | Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="./output.css" rel="stylesheet">
    <style>
        #menu-toggle:checked + #mobile-menu {
            display: block;
        }   
        .navbar {
            transition: background-color 0.3s ease;
        }
        .carousel {
            position: relative;
            overflow: hidden;
        }
        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease;
        }
        .carousel-item {
            min-width: 100%;
            box-sizing: border-box;
        }
        .fade-in {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
        .fade-in.visible {
            opacity: 1;
        }
        .carousel-buttons {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 10px;
            right: 10px;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .carousel-button {
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 18px;
        }
    </style>
</head>
<a href="https://sim.itats.ac.id/">
<body class="font-sans bg-gray-100">
    <!-- Navbar -->
    <div class="max-w-screen-xl mx-auto p-4">
        <?php include '/final-mission/view/includes/nav.php'; ?>
    </div>

    <!-- Banner Section -->
    <section class="bg-center bg-no-repeat bg-cover bg-gray-700 bg-blend-multiply" style="background-image: url('../assets/banner.png');">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold text-white md:text-5xl lg:text-6xl">We are Otaku Site</h1>
            <p class="mb-8 text-lg text-gray-300 lg:text-xl sm:px-16 lg:px-48">Here at Ocafe website we can do it.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center">
                <a href="https://otakucafe.carrd.co/" class="py-3 px-5 text-base text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    See More
                </a>
            </div>
        </div>
    </section>

    <div id="controls-carousel" class="relative w-full" data-carousel="slide" data-carousel-interval="5000">
    <!-- Carousel wrapper -->
    <div class="mt-5 relative h-56 overflow-hidden rounded-lg md:h-96">
    <?php foreach ($listevent as $event): ?>
        <?php if ($event['status'] == 1): // Cek jika status adalah active (1) ?>
            <!-- Carousel Item -->
            <div class="hidden duration-700 ease-in-out rounded bg-white" data-carousel-item>
                <div class="h-full flex flex-col sm:flex-row gap-2.5">
                    <figure class="w-96 h-96 sm:h-auto p-2 overflow-hidden flex justify-center items-center mx-auto sm:mx-0 aspect-square sm:aspect-auto">
                        <!-- <img 
                            src="<?php echo htmlspecialchars($event['poster']); ?>" 
                            alt="<?php echo $event['judul']; ?>" 
                            class="object-center my-auto"
                            onerror="this.src='https://via.placeholder.com/800x600';"
                        /> -->
                        <a href="index.php?modul=event&fitur=detail&eid=<?php echo $event['eid']; ?>">
                                    <img 
                                        src="<?php echo htmlspecialchars($event['poster']); ?>" 
                                        alt="<?php echo $event['judul']; ?>" 
                                        class="object-center my-auto"
                                    />
                                </a>
                    </figure>
                    <div class="flex-1 flex flex-col justify-center bg-white p-4 rounded-md">
                        <h2 class="text-lg font-semibold text-gray-900"><?php echo $event['judul']; ?></h2>
                        <p class="text-sm text-gray-700">
                            <?php 
                                echo strlen($event['isi']) > 100 
                                    ? htmlspecialchars(strip_tags(substr($event['isi'], 0, 100))) . '...' 
                                    : htmlspecialchars(strip_tags($event['isi'])); 
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>


    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
 
    <!-- More Information Section -->
    <section id="info" class="py-12 bg-gray-50">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-8">More Information</h2>
        <div class="fade-in" id="info-content">
            <p class="text-gray-700 mb-6">At Otaku Cafe, we pride ourselves on creating a welcoming community for fans of anime, manga, and all things otaku. Whether you're a long-time fan or just getting started, our cafe offers a space where you can connect with others who share your passion. We host regular events such as anime screenings, manga discussions, and themed meetups, allowing fans to interact and deepen their love for Japanese pop culture.</p>

            <p class="text-gray-700 mb-6">Our community is built on inclusivity and creativity, where everyone’s opinions are valued, and we encourage new ideas and perspectives. We provide a range of activities, from gaming tournaments and cosplay events to art contests and workshops, ensuring there's something for everyone. Otaku Cafe isn't just a place to hang out; it's a place to grow, learn, and make lasting friendships with like-minded individuals.</p>

            <p class="text-gray-700">We also support local artists and creators by providing a platform for them to showcase their work. Through collaborations, we offer unique opportunities for members to express themselves through various mediums like drawing, writing, and music. Whether you're looking to discover new anime or show off your own creations, Otaku Cafe is the place to be. Join us and become part of a vibrant community that celebrates all things otaku!</p>
        </div>
    </div>
</section>


    <!-- Footer -->
    <div class="bg-gray-800 text-white py-6">
        <?php include '/final-mission/view/includes/footer.php'; ?>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
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

            // Carousel Functionality
            let currentIndex = 0;
            const items = document.querySelectorAll('.carousel-item');
            const totalItems = items.length;

            function moveCarousel(direction) {
                currentIndex = (currentIndex + direction + totalItems) % totalItems;
                const offset = -currentIndex * 100;
                document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
            }

            // Fade-In Effect on Scroll
            const infoContent = document.getElementById('info-content');
            window.addEventListener('scroll', () => {
                const scrollPosition = window.scrollY + window.innerHeight;
                const infoPosition = infoContent.offsetTop;

                if (scrollPosition > infoPosition) {
                    infoContent.classList.add('visible');
                }
            });
        });
    </script>
</body>
</a>
</html>
