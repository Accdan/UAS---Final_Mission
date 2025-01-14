<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocafe | Admin - Add Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <link href="./output.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Toggle Button -->
<button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar" aria-controls="separator-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
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
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div class="flex-1 p-4">
                <div class="container mx-auto">
                    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                        <h2 class="text-2xl font-bold mb-6 text-gray-800">Input Event</h2>
                        <form action="index.php?modul=event&fitur=input" method="POST" enctype="multipart/form-data">
                            <!-- Judul Event -->
                            <!-- <div class="mb-4">
                                <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul:</label>
                                <div id="jeditor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></div>
                                <textarea id="judulHidden" name="judul" class="hidden"></textarea>
                            </div> -->

                            <!-- Poster Event -->
                            <div class="mb-4">
                                <label for="poster" class="block text-gray-700 text-sm font-bold mb-2">Poster:</label>
                                <input type="file" id="poster" name="poster" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <div class="mt-4">
                                    <p class="text-sm text-gray-500">Preview:</p>
                                    <img id="posterPreview" src="" alt="Preview Gambar" class="w-full h-auto max-w-xs rounded-lg border border-gray-300 object-contain" style="display: none;">
                                </div>
                            </div>

                            <!-- Isi Event -->
                            <!-- Judul Event -->
                            <div class="mb-4">
                                <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul:</label>
                                <div id="judulEditor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></div>
                                <!-- Hidden Input to Store Judul -->
                                <textarea id="judulHidden" name="judul" class="hidden"></textarea>
                            </div>

                            <!-- Isi Event -->
                            <div class="mb-4">
                                <label for="isi" class="block text-gray-700 text-sm font-bold mb-2">Isi:</label>
                                <div id="isiEditor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></div>
                                <!-- Hidden Input to Store Isi -->
                                <textarea id="isiHidden" name="isi" class="hidden"></textarea>
                            </div>


                            <!-- Partner Event -->
                            <div class="mb-4">
                                <label for="pid" class="block text-gray-700 text-sm font-bold mb-2">Partner:</label>
                                <select id="pid" name="pid" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="">Pilih Partner</option>
                                    <?php foreach ($partnerd as $pard): ?>
                                        <option value="<?= $pard['pid'] ?>"><?= $pard['pname'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Status Event -->
                            <div class="mb-4">
                                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                                <select id="status" name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="">Pilih Status</option>
                                    <option value="1">active</option>
                                    <option value="0">inactive</option>
                                </select>
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
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    // CKEditor untuk Judul Event
let judulEditor;
ClassicEditor
    .create(document.querySelector('#judulEditor'), {
        toolbar: ['bold', 'italic', 'link']
    })
    .then(editor => {
        judulEditor = editor; // Menyimpan referensi editor judul
    })
    .catch(error => {
        console.error(error);
    });

// CKEditor untuk Isi Event
let isiEditor;
ClassicEditor
    .create(document.querySelector('#isiEditor'), {
        toolbar: [
            'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
            'insertTable', 'uploadImage', '|', 'undo', 'redo'
        ]
    })
    .then(editor => {
        isiEditor = editor; // Menyimpan referensi editor isi
    })
    .catch(error => {
        console.error(error);
    });

// Sinkronkan data CKEditor ke textarea tersembunyi saat form disubmit
const form = document.querySelector('form');
const judulHidden = document.querySelector('#judulHidden');
const isiHidden = document.querySelector('#isiHidden');

form.addEventListener('submit', () => {
    judulHidden.value = judulEditor.getData(); // Simpan data editor Judul ke textarea tersembunyi
    isiHidden.value = isiEditor.getData(); // Simpan data editor Isi ke textarea tersembunyi
});

    // Preview Poster Event
    const imageInput = document.getElementById('poster');
    const imagePreview = document.getElementById('posterPreview');

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