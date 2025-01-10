<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocafe | Admin - User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<!-- Main container -->
<div class="flex">
    <!-- Sidebar -->
    <aside id="separator-sidebar" class="w-64 bg-gray-800 text-white min-h-screen fixed top-0 left-0">
        <?php include '/final-mission/view/includes/side.php'; ?>
    </aside>

    <!-- Main Content -->
    <div class="ml-64 flex-1 p-8">
        <div class="container mx-auto">
            <!-- Button to Insert New Member -->
            <div class="mb-4 text-right">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <a href="index.php?modul=user&fitur=reqinput">Insert New Member</a>
                </button>
            </div>

            <h2 class="text-xl font-bold text-gray-800 mb-4">Admin</h2>
            <!-- Admin Table -->
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">Uid</th>
                            <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Username</th>
                            <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Password</th>
                            <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <?php if (!empty($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <?php if ($user['id'] == 1): // Admin role ?>
                                    <tr class="text-center">
                                        <td class="py-3 px-4 text-blue-600"><?php echo htmlspecialchars($user['uid']); ?></td>
                                        <td class="py-3 px-4"><?php echo htmlspecialchars($user['uname']); ?></td>
                                        <!-- <td class="py-3 px-4"><?php echo htmlspecialchars($user['password']); ?></td> -->
                                        <td class="py-3 px-4">**********</td>
                                        <td class="py-3 px-4">
                                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">
                                                <a href="index.php?modul=user&fitur=edit&uid=<?php echo $user['uid']; ?>">Update</a>
                                            </button>
                                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                <a href="index.php?modul=user&fitur=delete&uid=<?php echo $user['uid']; ?>">Delete</a>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center py-4">No admin data available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <h2 class="text-xl font-bold text-gray-800 mb-4">Member List</h2>
            <!-- User Table -->
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">Uid</th>
                            <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Username</th>
                            <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Password</th>
                            <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <?php if (!empty($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <?php if ($user['id'] == 2): // User role ?>
                                    <tr class="text-center">
                                        <td class="py-3 px-4 text-blue-600"><?php echo htmlspecialchars($user['uid']); ?></td>
                                        <td class="py-3 px-4"><?php echo htmlspecialchars($user['uname']); ?></td>
                                        <!-- <td class="py-3 px-4"><?php echo htmlspecialchars($user['password']); ?></td> -->
                                        <td class="py-3 px-4">**********</td>
                                        <td class="py-3 px-4">
                                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">
                                                <a href="index.php?modul=user&fitur=edit&uid=<?php echo $user['uid']; ?>">Update</a>
                                            </button>
                                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                <a href="index.php?modul=user&fitur=delete&uid=<?php echo $user['uid']; ?>">Delete</a>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center py-4">No user data available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // const toggleButton = document.querySelector('[data-drawer-toggle]');
    // const sidebar = document.querySelector('#separator-sidebar');

    // function closeSidebar() {
    //     sidebar.classList.add('-translate-x-full');
    // }

    // toggleButton.addEventListener('click', (event) => {
    //     sidebar.classList.toggle('-translate-x-full');
    //     event.stopPropagation();
    // });

    // document.addEventListener('click', (event) => {
    //     if (!sidebar.contains(event.target) && !toggleButton.contains(event.target)) {
    //         closeSidebar();
    //     }
    // });
</script>
</body>
</html>
