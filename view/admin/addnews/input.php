<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input News</title>
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
            <!-- Form Input News -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Input News</h2>
                <form action="index.php?modul=news&fitur=input" method="POST" enctype="multipart/form-data">
                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                        <div id="titleEditor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></div>
                        <!-- Hidden Input to Store Title -->
                        <textarea id="title" name="title" class="hidden"></textarea>
                    </div>

                    <!-- Image -->
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                        <input type="file" id="image" name="image" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <div class="mt-4">
                            <p class="text-sm text-gray-500">Preview:</p>
                            <img id="imagePreview" src="" alt="Image Preview" 
                                class="w-full h-auto max-w-xs rounded-lg border border-gray-300 object-contain" 
                                style="display: none;">
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                        <div id="contentEditor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></div>
                        <!-- Hidden Input to Store Content -->
                        <textarea id="content" name="content" class="hidden"></textarea>
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

    <script>
    // Inisialisasi CKEditor untuk Title
    let titleEditor;
    ClassicEditor
        .create(document.querySelector('#titleEditor'), {
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
        .create(document.querySelector('#contentEditor'), {
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
        titleInput.value = titleEditor.getData();  // Menyimpan konten title ke textarea tersembunyi
        contentInput.value = contentEditor.getData();  // Menyimpan konten content ke textarea tersembunyi
    });

    // Preview Gambar
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function (event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '';
            imagePreview.style.display = 'none';
        }
    });
    </script>
</body>
</html>
