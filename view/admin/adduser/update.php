<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include '/final-mission/view/includes/side.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Form Update User -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Update User</h2>
                <form action="index.php?modul=user&fitur=update" method="POST">
                    <input type="hidden" id="uid" name="uid" value="<?php echo htmlspecialchars($user['uid']); ?>">

                    <!-- Username -->
                    <div class="mb-4">
                        <label for="uname" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                        <input type="text" id="uname" name="uname" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            required value="<?php echo htmlspecialchars($user['uname']); ?>">
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                        <input type="password" id="password" name="password" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            placeholder="Masukkan Password">
                    </div>

                    <!-- Select Role -->
                    <div class="mb-4">
                        <label for="id" class="block text-gray-700 text-sm font-bold mb-2">Select Role:</label>
                        <select id="id" name="id" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <?php
                            foreach ($roles as $role) {
                                // Select the current user's role
                                echo "<option value='{$role['id']}' " . ($role['id'] == $user['id'] ? 'selected' : '') . ">{$role['name']}</option>";
                            }
                            ?>
                        </select>
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

</body>
</html>
