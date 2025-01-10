<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocafe | Admin - News</title>
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
            <!-- Button to Insert New News -->
            <div class="mb-4 text-right">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <a href="index.php?modul=news&fitur=input">New News</a>
                </button>
            </div>

            <!-- News Table -->
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">Id</th>
                            <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm">Title</th>
                            <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm">Image</th>
                            <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Content</th>
                            <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <!-- Dynamic Rows -->
                        <?php if (!empty($newd)): ?>
                            <?php foreach ($newd as $newz): ?>
                                <tr class="text-center">
                                    <td class="py-3 px-4 text-blue-600"><?php echo htmlspecialchars($newz['nid']); ?></td>
                                    <td class="py-3 px-4"><?php echo $newz['title']; ?></td>
                                    <td class="py-3 px-4">
                                        <?php if (!empty($newz['image'])): ?>
                                            <img src="<?php echo htmlspecialchars($newz['image']); ?>" alt="Image" class="h-16 mx-auto">
                                        <?php else: ?>
                                            <span class="text-gray-500">No Image</span>
                                        <?php endif; ?>
                                    </td>
                                   
                                    <td class="py-3 px-4">
                                        <?php echo strlen($newz['content']) > 50 ? htmlspecialchars(strip_tags(substr($newz['content'], 0, 50))) . '...' : htmlspecialchars(strip_tags($newz['content'])); ?>
                                    </td>
                                    <td class="py-3 px-4">
                                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">
                                            <a href="index.php?modul=news&fitur=edit&nid=<?php echo $newz['nid']; ?>">Update</a>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                            <a href="index.php?modul=news&fitur=delete&nid=<?php echo $newz['nid']; ?>">Delete</a>
                                        </button>
                                        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
                                            <a href="index.php?modul=news&fitur=detail&nid=<?php echo $newz['nid']; ?>">Detail</a>
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
