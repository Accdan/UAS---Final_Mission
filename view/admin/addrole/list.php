<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocafe | Admin - Role</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<!-- Main container -->
<div class="flex">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-gray-800 text-white min-h-screen fixed top-0 left-0">
        <?php include '/final-mission/view/includes/side.php'; ?>
    </aside>

    <!-- Main Content -->
    <div class="ml-64 flex-1 p-8">
        <div class="container mx-auto">
            <!-- Button to Insert New Role -->
            <div class="mb-4 text-right">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <a href="index.php?modul=role&fitur=input">Insert New Role</a>
                </button>
            </div>

            <!-- Role Table -->
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">Id</th>
                            <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm">Name</th>
                            <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm">Description</th>
                            <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Status</th>
                            <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <!-- Dynamic Rows -->
                        <?php if (!empty($roles)): ?>
                            <?php foreach ($roles as $rolex): ?>
                                <tr class="text-center">
                                    <td class="py-3 px-4 text-blue-600"><?php echo htmlspecialchars($rolex['id']); ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($rolex['name']); ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($rolex['description']); ?></td>
                                    <td class="py-3 px-4"><?php echo $rolex['status'] == 1 ? "active" : "inactive"; ?></td>
                                    <td class="py-3 px-4">
                                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">
                                            <a href="index.php?modul=role&fitur=edit&id=<?php echo $rolex['id']; ?>">Update</a>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                            <a href="index.php?modul=role&fitur=delete&id=<?php echo $rolex['id']; ?>">Delete</a>
                                        </button>
                                        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
                                            <a href="index.php?modul=role&fitur=detail&id=<?php echo $rolex['id']; ?>">Detail</a>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center py-4">No data available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
