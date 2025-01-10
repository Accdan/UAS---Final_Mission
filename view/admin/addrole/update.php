<!-- <?php
echo '<pre>';
var_dump($roles);
echo '</pre>';
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Role</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">


    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include '/final-mission/view/includes/side.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Form Update Barang -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Update Role</h2>
                <form action="index.php?modul=role&fitur=update" method="POST">
                    <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($roles['id']); ?>">

                    <!-- Nama Barang -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                        <input type="text" id="name" name="name" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            required value="<?php echo htmlspecialchars($roles['name']); ?>">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                        <input type="text" id="description" name="description" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            required value="<?php echo htmlspecialchars($roles['description']); ?>">
                    </div>


                    <!-- Status role -->
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status Role:</label>
                        <select id="status" name="status" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="1" <?php echo $roles['status'] == 1 ? 'selected' : ''; ?>>Ada</option>
                            <option value="0" <?php echo $roles['status'] == 0 ? 'selected' : ''; ?>>Tidak Ada</option>
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
            </div>
        </div>
    </div>

</body>
</html>