<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update News</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include '/final-mission/view/includes/side.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Form Update News -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Update News</h2>
                <form action="index.php?modul=news&fitur=update" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="nid" name="nid" value="<?php echo htmlspecialchars($newd['nid']); ?>">

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                        <div id="title-editor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?php echo $newd['title']; ?></div>
                        <!-- Hidden Input to Store Title -->
                        <textarea id="title" name="title" class="hidden"></textarea>
                    </div>

                  
                    <!-- Image -->
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                        
                        <!-- Input file untuk image baru -->
                        <input type="file" id="image" name="image" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            onchange="previewImage()">

                        <!-- Preview Gambar Baru -->
                        <div class="mt-4">
                            <p>New Image:</p>
                            <img id="imagePreview" src="" alt="Preview Gambar" 
                                class="w-full h-auto max-w-xs rounded-lg border border-gray-300 object-contain" 
                                style="display: none;">
                        </div>

                        <!-- Menampilkan Gambar Lama -->
                        <?php if (!empty($newd['image'])): ?>
                            <div class="mt-4">
                                <p>Current Image:</p>
                                <img src="<?php echo htmlspecialchars($newd['image']); ?>" alt="Current Image" 
                                    class="w-full h-auto max-w-xs rounded-lg border border-gray-300 object-contain">
                                <input type="hidden" name="old_image" value="<?php echo htmlspecialchars($newd['image']); ?>"> 
                                <!-- Hidden input untuk image lama -->
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Content -->
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                        <div id="content-editor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?php echo $newd['content']; ?></div>
                        <!-- Hidden Input to Store Content -->
                        <textarea id="content" name="content" class="hidden"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    // Inisialisasi CKEditor untuk Title
    let titleEditor;
    ClassicEditor
        .create(document.querySelector('#title-editor'), { // Ubah ID menjadi title-editor
            toolbar: ['bold', 'italic', 'link']
        })
        .then(editor => {
            titleEditor = editor;  // Menyimpan referensi editor title
        })
        .catch(error => {
            console.error(error);
        });

    // Inisialisasi CKEditor untuk Content
    let contentEditor;
    ClassicEditor
        .create(document.querySelector('#content-editor'), { // Ubah ID menjadi content-editor
            toolbar: [
                'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
                'insertTable', 'uploadImage', '|', 'undo', 'redo'
            ]
        })
        .then(editor => {
            contentEditor = editor;  // Menyimpan referensi editor content
        })
        .catch(error => {
            console.error(error);
        });

    // Sinkronkan konten editor dengan input tersembunyi saat form disubmit
    const form = document.querySelector('form');
    const titleInput = document.querySelector('textarea[name="title"]');
    const contentInput = document.querySelector('textarea[name="content"]');

    form.addEventListener('submit', (event) => {
        // Ambil konten dari editor menggunakan metode getData()
        titleInput.value = titleEditor.getData();  // Menyimpan konten title ke textarea tersembunyi
        contentInput.value = contentEditor.getData();  // Menyimpan konten content ke textarea tersembunyi
    });
        function previewImage() {
        const file = document.getElementById('image').files[0];
        const preview = document.getElementById('imagePreview');
                                
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
