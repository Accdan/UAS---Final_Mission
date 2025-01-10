<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Update Landing Page</h2>
                <form action="index.php?modul=profile&fitur=create" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="nid" name="nid" value="<?php echo htmlspecialchars($landing['aid']); ?>">

                    <div class="mb-4">
                        <label for="logo" class="block text-gray-700 text-sm font-bold mb-2">Logo:</label>
                        <input type="file" id="logo" name="logo" accept="image/*" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                    </div>

                    <!-- Image -->
                    <div class="mb-4">
                        <label for="jumbotron" class="block text-gray-700 text-sm font-bold mb-2">Jumbotron:</label>
                        <input type="file" id="jumbotron" name="jumbotron" accept="image/*" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                    </div>

                    

                    <!-- Submit Button -->
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
    // Initialize Quill Editor for Title
    var titleEditor = new Quill('#title-editor', {
        theme: 'snow',  // Tema Snow
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],  // Toolbar minimal untuk judul
            ]
        }
    });

    // Pre-fill Quill for Title
    titleEditor.root.innerHTML = <?php echo json_encode($newd['title']); ?>;

    // Initialize Quill Editor for Content
    var contentEditor = new Quill('#content-editor', {
        theme: 'snow',  // Tema Snow
        modules: {
            toolbar: [
                [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['bold', 'italic', 'underline'],
                ['link', 'image']
            ]
        }
    });

    // Pre-fill Quill for Content
    contentEditor.root.innerHTML = <?php echo json_encode($newd['content']); ?>;

    // Sync Quill Editors with Hidden Inputs
    const form = document.querySelector('form');
    const titleInput = document.querySelector('#title');
    const contentInput = document.querySelector('#content');

    form.addEventListener('submit', () => {
        titleInput.value = titleEditor.root.innerHTML; // Simpan konten Quill untuk judul
        contentInput.value = contentEditor.root.innerHTML; // Simpan konten Quill untuk isi
    });
    </script>

</body>
</html>
