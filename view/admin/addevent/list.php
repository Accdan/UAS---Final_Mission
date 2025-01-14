<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocafe | Admin - Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .text-active {
            color: #28a745; /* Hijau */
            font-weight: bold; /* Opsional, membuat teks lebih tegas */
        }

        .text-inactive {
            color: #dc3545; /* Merah */
            font-weight: bold; /* Opsional, membuat teks lebih tegas */
        }
    </style>
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
            <!-- Button to Insert New Event -->
            <div class="mb-4 text-right">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <a href="index.php?modul=event&fitur=reqinput">Insert New Event</a>
                </button>
            </div>

            <!-- Event Table -->
<div class="bg-white shadow-md rounded my-6">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">ID</th>
                <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm">Title</th>
                <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm">Poster</th>
                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Content</th>
                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Partner</th>
                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Status</th>
                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            <?php if (!empty($evend)): ?>
                <?php foreach ($evend as $evenf): ?>
                    <tr class="text-center">
                        <!-- ID -->
                        <td class="py-3 px-4 text-blue-600"> <?php echo htmlspecialchars($evenf['eid']); ?> </td>
                        <!-- Title -->
                        <td class="py-3 px-4"> <?php echo htmlspecialchars(strip_tags(html_entity_decode($evenf['judul'])));  ?> </td>
                        <!-- Poster -->
                        <td class="py-3 px-4">
                            <?php if (!empty($evenf['poster'])): ?>
                                <img src="<?php echo htmlspecialchars($evenf['poster']); ?>" alt="Poster" class="h-16 mx-auto">
                            <?php else: ?>
                                <span class="text-gray-500">No Image</span>
                            <?php endif; ?>
                        </td>
                        <!-- Content -->
                        <td class="py-3 px-4">
                            <?php 
                            $decodedIsi = html_entity_decode(strip_tags($evenf['isi']));
                            echo strlen($decodedIsi) > 50 ? htmlspecialchars(substr($decodedIsi, 0, 50)) . '...' : htmlspecialchars($decodedIsi); 
                            ?>
                        </td>

                        <!-- Partner -->
                        <td class="py-3 px-4">
                            <?php
                            $partnerNames = [];
                            foreach ($partnerd as $pard) {
                                if ($pard['pid'] == $evenf['pid']) { 
                                    $partnerNames[] = htmlspecialchars(html_entity_decode($pard['pname']));
                                }
                            }
                            $partnerNames = array_slice($partnerNames, 0, 5);
                            echo implode(', ', $partnerNames);
                            ?>
                        </td>

                        <!-- Status -->
                        <td class="py-3 px-4">
                            <?php if ($evenf['status'] == 1): ?>
                                <span class="text-green-500 font-bold">✔ Active</span>
                            <?php else: ?>
                                <span class="text-red-500 font-bold">✖ Inactive</span>
                            <?php endif; ?>
                        </td>

                        <!-- Actions -->
                        <td class="py-3 px-4">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">
                                <a href="index.php?modul=event&fitur=edit&eid=<?php echo $evenf['eid']; ?>">Update</a>
                            </button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                <a href="index.php?modul=event&fitur=delete&eid=<?php echo $evenf['eid']; ?>">Delete</a>
                            </button>
                            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
                                <a href="index.php?modul=event&fitur=detail&eid=<?php echo $evenf['eid']; ?>">Detail</a>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center py-4">No data available.</td>
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
