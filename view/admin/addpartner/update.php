<!-- <?php
// Debugging roles data (optional)
// echo '<pre>';
// var_dump($roles);
// echo '</pre>';
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Partner</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include '/final-mission/view/includes/side.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Form Update Partner -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Update Partner</h2>
                <form action="index.php?modul=partner&fitur=update" method="POST" enctype="multipart/form-data">
                    <!-- Hidden Field for Partner ID -->
                    <input type="hidden" id="pid" name="pid" value="<?php echo htmlspecialchars($partnerd['pid'] ?? ''); ?>">

                    <!-- Nama Partner -->
                    <div class="mb-4">
                        <label for="pname" class="block text-gray-700 text-sm font-bold mb-2">Nama Partner:</label>
                        <input type="text" id="pname" name="pname" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            required value="<?php echo htmlspecialchars($partnerd['pname'] ?? ''); ?>">
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="pdesc" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                        <input type="text" id="pdesc" name="pdesc" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            required value="<?php echo htmlspecialchars($partnerd['pdesc'] ?? ''); ?>">
                    </div>

                     <!-- Image -->
                        <div class="mb-4">
                            <label for="ppict" class="block text-gray-700 text-sm font-bold mb-2">Partner Picture:</label>

                            <!-- Input file untuk ppict baru -->
                            <input type="file" id="ppict" name="ppict" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                onchange="previewImage()">

                            <!-- Preview Gambar Baru -->
                            <div class="mt-4">
                                <p>New ppict:</p>
                                <img id="ppictPreview" src="" alt="Preview Gambar" 
                                    class="w-full h-auto max-w-xs rounded-lg border border-gray-300 object-contain" 
                                    style="display: none;">
                            </div>

                            <!-- Menampilkan Gambar Lama -->
                            <?php if (!empty($partnerd['ppict'])): ?>
                                <div class="mt-4">
                                    <p>Old ppict:</p>
                                    <img src="<?php echo htmlspecialchars($partnerd['ppict']); ?>" alt="Current ppict" 
                                        class="w-full h-auto max-w-xs rounded-lg border border-gray-300 object-contain">
                                    <input type="hidden" name="old_ppict" value="<?php echo htmlspecialchars($partnerd['ppict']); ?>"> 
                                    <!-- Hidden input untuk ppict lama -->
                                </div>
                            <?php endif; ?>
                        </div>

                    <!-- Tombol Submit -->
                    <div class="flex items-center justify-between">
                        <button type="submit" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
    function previewImage() {
        const file = document.getElementById('ppict').files[0];
        const preview = document.getElementById('ppictPreview');
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block'; // Menampilkan preview
            };
            
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none'; // Sembunyikan preview jika tidak ada gambar
        }
    }
</script>
</body>
</html>
