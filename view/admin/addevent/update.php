<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include '/final-mission/view/includes/side.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Form Update Event -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Update Event</h2>
                <form action="index.php?modul=event&fitur=update" method="POST" enctype="multipart/form-data">
                    <!-- Hidden Field -->
                    <input type="hidden" id="eid" name="eid" value="<?php echo htmlspecialchars($evend['eid']); ?>">

                    <!-- Judul Event -->
                    <div class="mb-4">
                        <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul:</label>
                        <input type="text" id="judul" name="judul" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            required value="<?php echo htmlspecialchars($evend['judul']); ?>">
                    </div>

                    <!-- Poster Event -->
                <div class="mb-4">
                    <label for="poster" class="block text-gray-700 text-sm font-bold mb-2">Poster:</label>
                    
                    <!-- Input file untuk poster baru -->
                    <input type="file" id="poster" name="poster" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        onchange="previewPoster()">

                    <!-- Preview Poster Baru -->
                    <div class="mt-4">
                        <p>New Poster:</p>
                        <img id="posterPreview" src="" alt="Preview Gambar" 
                            class="w-full h-auto max-w-xs rounded-lg border border-gray-300 object-contain" 
                            style="display: none;">
                    </div>

                    <!-- Menampilkan Poster Lama -->
                    <?php if (!empty($evend['poster'])): ?>
                        <div class="mt-4">
                            <p>Current Poster:</p>
                            <img src="<?php echo htmlspecialchars($evend['poster']); ?>" alt="Current Poster" 
                                class="w-full h-auto max-w-xs rounded-lg border border-gray-300 object-contain">
                            <input type="hidden" name="old_poster" value="<?php echo htmlspecialchars($evend['poster']); ?>"> 
                            <!-- Hidden input untuk poster lama -->
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Isi Event -->
            <div class="mb-4">
                <label for="isi" class="block text-gray-700 text-sm font-bold mb-2">Isi:</label>
                <div id="editor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <?php echo htmlspecialchars($evend['isi']); ?>
                </div>
                <!-- Hidden Input to Hold Data -->
                <input type="hidden" id="isiHidden" name="isi">
            </div>

                    <!-- Partner Event -->
                    <div class="mb-4">
                        <label for="pid" class="block text-gray-700 text-sm font-bold mb-2">Partner:</label>
                        <select id="pid" name="pid" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="">Pilih Partner</option>
                            <?php
                            foreach ($partnerd as $pard) {
                                $selected = $evend['pid'] == $pard['pid'] ? 'selected' : '';
                                echo "<option value='{$pard['pid']}' {$selected}>{$pard['pname']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Status Event -->
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status Event:</label>
                        <select id="status" name="status" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="1" <?php echo $evend['status'] == 1 ? 'selected' : ''; ?>>active</option>
                            <option value="0" <?php echo $evend['status'] == 0 ? 'selected' : ''; ?>>inactive</option>
                        </select>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex items-center justify-between">
                        <button type="submit" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update
                        </button>
                    </div>
                </form>

                <!-- JavaScript -->
                <script>
                    let isiEditor;
                    ClassicEditor
                        .create(document.querySelector('#editor'), {
                            toolbar: [
                                'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
                                'insertTable', 'uploadImage', '|', 'undo', 'redo'
                            ]
                        })
                        .then(editor => {
                            isiEditor = editor;
                            // Set the initial content of the editor from PHP if available
                            editor.setData('<?php echo addslashes($evend["isi"]); ?>');
                        })
                        .catch(error => {
                            console.error(error);
                        });

                    // Handle form submission and send CKEditor content to hidden input field
                    const form = document.querySelector('form');
                    const isiHiddenInput = document.querySelector('#isiHidden');
                    form.addEventListener('submit', () => {
                        isiHiddenInput.value = isiEditor.getData();
                    });

                    // Fungsi untuk preview gambar baru jika dipilih
                    function previewImage() {
                        const file = document.getElementById('poster').files[0];
                        const preview = document.getElementById('posterPreview');
                        
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
