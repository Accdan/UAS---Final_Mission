<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocafe | Admin - Add Partner</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="./output.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Toggle Button -->
<button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar" aria-controls="separator-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
       <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<!-- Sidebar -->
<div class="fixed top-0 left-0 w-64 h-full bg-white border-r border-gray-200 -translate-x-full transition-transform sm:translate-x-0" id="separator-sidebar">
    <?php include '/final-mission/view/includes/side.php'; ?>
</div>

<!-- Main Content -->
<!-- <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            
        </div>
    </div>
</div> -->
<div class="flex-1 p-4">
                <div class="container mx-auto">
                    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                        <h2 class="text-2xl font-bold mb-6 text-gray-800">Input Partner</h2>
                        <form action="index.php?modul=partner&fitur=input" method="POST" enctype="multipart/form-data">
                            <!-- Nama Partner -->
                            <div class="mb-4">
                                <label for="pname" class="block text-gray-700 text-sm font-bold mb-2">Nama Partner:</label>
                                <input type="text" id="pname" name="pname" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Nama Partner" required>
                            </div>

                            <!-- Deskripsi Partner -->
                            <div class="mb-4">
                                <label for="pdesc" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi:</label>
                                <textarea id="pdesc" name="pdesc" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Deskripsi Partner" rows="4" required></textarea>
                            </div>

                            <!-- Foto Partner -->
                            <div class="mb-4">
                                <label for="ppict" class="block text-gray-700 text-sm font-bold mb-2">Partner Picture:</label>
                                <input type="file" id="ppict" name="ppict" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept="image/*" required>
                            </div>
                            <div class="mt-4">
                                <p>Preview:</p>
                                <img id="ppictPreview" src="" alt="Preview Gambar" 
                                    class="w-full h-auto max-w-xs rounded-lg border border-gray-300 object-contain" 
                                    style="display: none;">
                            </div>

          
                            <!-- Submit Button -->
                            <div class="flex items-center justify-between">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<!-- JavaScript -->
<script>
    // Sidebar toggle functionality
    const toggleButton = document.querySelector('[data-drawer-toggle]');
    const sidebar = document.querySelector('#separator-sidebar');

    toggleButton.addEventListener('click', (event) => {
        sidebar.classList.toggle('-translate-x-full');
        event.stopPropagation(); // Prevents closing sidebar on button click
    });

    document.addEventListener('click', (event) => {
        if (!sidebar.contains(event.target) && !toggleButton.contains(event.target)) {
            sidebar.classList.add('-translate-x-full');
        }
    });
    function previewImage() {
        const file = document.getElementById('ppict').files[0];
        const preview = document.getElementById('ppictPreview');
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block'; // Show the preview
            };
            
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none'; // Hide the preview if no image
        }
    }

    // Add event listener for file input change
    document.getElementById('ppict').addEventListener('change', previewImage);
</script>

</body>
</html>
